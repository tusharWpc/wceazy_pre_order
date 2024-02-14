<?php




class TCPDF_STATIC {


	private static $tcpdf_version = '6.5.0';


	public static $alias_tot_pages = '{:ptp:}';


	public static $alias_num_page = '{:pnp:}';


	public static $alias_group_tot_pages = '{:ptg:}';


	public static $alias_group_num_page = '{:png:}';


	public static $alias_right_shift = '{rsc:';


	public static $enc_padding = "\x28\xBF\x4E\x5E\x4E\x75\x8A\x41\x64\x00\x4E\x56\xFF\xFA\x01\x08\x2E\x2E\x00\xB6\xD0\x68\x3E\x80\x2F\x0C\xA9\xFE\x64\x53\x69\x7A";


	public static $byterange_string = '/ByteRange[0 ********** ********** **********]';


	public static $pageboxes = array('MediaBox', 'CropBox', 'BleedBox', 'TrimBox', 'ArtBox');

	// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


	public static function getTCPDFVersion() {
		return self::$tcpdf_version;
	}


	public static function getTCPDFProducer() {
		return "\x54\x43\x50\x44\x46\x20".self::getTCPDFVersion()."\x20\x28\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x74\x63\x70\x64\x66\x2e\x6f\x72\x67\x29";
	}


	public static function set_mqr($mqr) {
		if (!defined('PHP_VERSION_ID')) {
			$version = PHP_VERSION;
			define('PHP_VERSION_ID', (($version[0] * 10000) + ($version[2] * 100) + $version[4]));
		}
		if (PHP_VERSION_ID < 50300) {
			@set_magic_quotes_runtime($mqr);
		}
	}


	public static function get_mqr() {
		if (!defined('PHP_VERSION_ID')) {
			$version = PHP_VERSION;
			define('PHP_VERSION_ID', (($version[0] * 10000) + ($version[2] * 100) + $version[4]));
		}
		if (PHP_VERSION_ID < 50300) {
			return @get_magic_quotes_runtime();
		}
		return 0;
	}


	public static function isValidURL($url) {
		$headers = @get_headers($url);
		if ($headers === false) {
			return false;
		}
    	return (strpos($headers[0], '200') !== false);
	}


	public static function removeSHY($txt='', $unicode=true) {
		$txt = preg_replace('/([\\xc2]{1}[\\xad]{1})/', '', $txt);
		if (!$unicode) {
			$txt = preg_replace('/([\\xad]{1})/', '', $txt);
		}
		return $txt;
	}



	public static function getBorderMode($brd, $position='start', $opencell=true) {
		if ((!$opencell) OR empty($brd)) {
			return $brd;
		}
		if ($brd == 1) {
			$brd = 'LTRB';
		}
		if (is_string($brd)) {
			// convert string to array
			$slen = strlen($brd);
			$newbrd = array();
			for ($i = 0; $i < $slen; ++$i) {
				$newbrd[$brd[$i]] = array('cap' => 'square', 'join' => 'miter');
			}
			$brd = $newbrd;
		}
		foreach ($brd as $border => $style) {
			switch ($position) {
				case 'start': {
					if (strpos($border, 'B') !== false) {
						// remove bottom line
						$newkey = str_replace('B', '', $border);
						if (strlen($newkey) > 0) {
							$brd[$newkey] = $style;
						}
						unset($brd[$border]);
					}
					break;
				}
				case 'middle': {
					if (strpos($border, 'B') !== false) {
						// remove bottom line
						$newkey = str_replace('B', '', $border);
						if (strlen($newkey) > 0) {
							$brd[$newkey] = $style;
						}
						unset($brd[$border]);
						$border = $newkey;
					}
					if (strpos($border, 'T') !== false) {
						// remove bottom line
						$newkey = str_replace('T', '', $border);
						if (strlen($newkey) > 0) {
							$brd[$newkey] = $style;
						}
						unset($brd[$border]);
					}
					break;
				}
				case 'end': {
					if (strpos($border, 'T') !== false) {
						// remove bottom line
						$newkey = str_replace('T', '', $border);
						if (strlen($newkey) > 0) {
							$brd[$newkey] = $style;
						}
						unset($brd[$border]);
					}
					break;
				}
			}
		}
		return $brd;
	}


	public static function empty_string($str) {
		return (is_null($str) OR (is_string($str) AND (strlen($str) == 0)));
	}


	public static function getObjFilename($type='tmp', $file_id='') {
		return tempnam(K_PATH_CACHE, '__tcpdf_'.$file_id.'_'.$type.'_'.md5(TCPDF_STATIC::getRandomSeed()).'_');
	}


	public static function _escape($s) {
		// the chr(13) substitution fixes the Bugs item #1421290.
		return strtr($s, array(')' => '\\)', '(' => '\\(', '\\' => '\\\\', chr(13) => '\r'));
	}


	public static function _escapeXML($str) {
		$replaceTable = array("\0" => '', '&' => '&amp;', '<' => '&lt;', '>' => '&gt;');
		$str = strtr($str, $replaceTable);
		return $str;
	}


	public static function objclone($object) {
		if (($object instanceof Imagick) AND (version_compare(phpversion('imagick'), '3.0.1') !== 1)) {
			// on the versions after 3.0.1 the clone() method was deprecated in favour of clone keyword
			return @$object->clone();
		}
		return @clone($object);
	}


	public static function sendOutputData($data, $length) {
		if (!isset($_SERVER['HTTP_ACCEPT_ENCODING']) OR empty($_SERVER['HTTP_ACCEPT_ENCODING'])) {
			// the content length may vary if the server is using compression
			header('Content-Length: '.$length);
		}
		echo $data;
	}


	public static function replacePageNumAliases($page, $replace, $diff=0) {
		foreach ($replace as $rep) {
			foreach ($rep[3] as $a) {
				if (strpos($page, $a) !== false) {
					$page = str_replace($a, $rep[0], $page);
					$diff += ($rep[2] - $rep[1]);
				}
			}
		}
		return array($page, $diff);
	}


	public static function getTimestamp($date) {
		if (($date[0] == 'D') AND ($date[1] == ':')) {
			// remove date prefix if present
			$date = substr($date, 2);
		}
		return strtotime($date);
	}


	public static function getFormattedDate($time) {
		return substr_replace(date('YmdHisO', intval($time)), '\'', (0 - 2), 0).'\'';
	}


	public static function getRandomSeed($seed='') {
		$rnd = uniqid(rand().microtime(true), true);
		if (function_exists('posix_getpid')) {
			$rnd .= posix_getpid();
		}
		if (function_exists('openssl_random_pseudo_bytes') AND (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN')) {
			// this is not used on windows systems because it is very slow for a know bug
			$rnd .= openssl_random_pseudo_bytes(512);
		} else {
			for ($i = 0; $i < 23; ++$i) {
				$rnd .= uniqid('', true);
			}
		}
		return $rnd.$seed.__FILE__.serialize($_SERVER).microtime(true);
	}


	public static function _md5_16($str) {
		return pack('H*', md5($str));
	}


	public static function _AES($key, $text) {
		// padding (RFC 2898, PKCS #5: Password-Based Cryptography Specification Version 2.0)
		$padding = 16 - (strlen($text) % 16);
		$text .= str_repeat(chr($padding), $padding);
		if (extension_loaded('openssl')) {
			$algo = 'aes-256-cbc';
			if (strlen($key) == 16) {
				$algo = 'aes-128-cbc';
			}
			$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($algo));
			$text = openssl_encrypt($text, $algo, $key, OPENSSL_RAW_DATA, $iv);
			return $iv.substr($text, 0, -16);
		}
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND);
		$text = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $text, MCRYPT_MODE_CBC, $iv);
		$text = $iv.$text;
		return $text;
	}


	public static function _AESnopad($key, $text) {
		if (extension_loaded('openssl')) {
			$algo = 'aes-256-cbc';
			if (strlen($key) == 16) {
				$algo = 'aes-128-cbc';
			}
			$iv = str_repeat("\x00", openssl_cipher_iv_length($algo));
			$text = openssl_encrypt($text, $algo, $key, OPENSSL_RAW_DATA, $iv);
			return substr($text, 0, -16);
		}
		$iv = str_repeat("\x00", mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
		$text = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $text, MCRYPT_MODE_CBC, $iv);
		return $text;
	}


	public static function _RC4($key, $text, &$last_enc_key, &$last_enc_key_c) {
		if (function_exists('mcrypt_encrypt') AND ($out = @mcrypt_encrypt(MCRYPT_ARCFOUR, $key, $text, MCRYPT_MODE_STREAM, ''))) {
			// try to use mcrypt function if exist
			return $out;
		}
		if ($last_enc_key != $key) {
			$k = str_repeat($key, (int) ((256 / strlen($key)) + 1));
			$rc4 = range(0, 255);
			$j = 0;
			for ($i = 0; $i < 256; ++$i) {
				$t = $rc4[$i];
				$j = ($j + $t + ord($k[$i])) % 256;
				$rc4[$i] = $rc4[$j];
				$rc4[$j] = $t;
			}
			$last_enc_key = $key;
			$last_enc_key_c = $rc4;
		} else {
			$rc4 = $last_enc_key_c;
		}
		$len = strlen($text);
		$a = 0;
		$b = 0;
		$out = '';
		for ($i = 0; $i < $len; ++$i) {
			$a = ($a + 1) % 256;
			$t = $rc4[$a];
			$b = ($b + $t) % 256;
			$rc4[$a] = $rc4[$b];
			$rc4[$b] = $t;
			$k = $rc4[($rc4[$a] + $rc4[$b]) % 256];
			$out .= chr(ord($text[$i]) ^ $k);
		}
		return $out;
	}


	public static function getUserPermissionCode($permissions, $mode=0) {
		$options = array(
			'owner' => 2, // bit 2 -- inverted logic: cleared by default
			'print' => 4, // bit 3
			'modify' => 8, // bit 4
			'copy' => 16, // bit 5
			'annot-forms' => 32, // bit 6
			'fill-forms' => 256, // bit 9
			'extract' => 512, // bit 10
			'assemble' => 1024,// bit 11
			'print-high' => 2048 // bit 12
			);
		$protection = 2147422012; // 32 bit: (01111111 11111111 00001111 00111100)
		foreach ($permissions as $permission) {
			if (isset($options[$permission])) {
				if (($mode > 0) OR ($options[$permission] <= 32)) {
					// set only valid permissions
					if ($options[$permission] == 2) {
						// the logic for bit 2 is inverted (cleared by default)
						$protection += $options[$permission];
					} else {
						$protection -= $options[$permission];
					}
				}
			}
		}
		return $protection;
	}


	public static function convertHexStringToString($bs) {
		$string = ''; // string to be returned
		$bslength = strlen($bs);
		if (($bslength % 2) != 0) {
			// padding
			$bs .= '0';
			++$bslength;
		}
		for ($i = 0; $i < $bslength; $i += 2) {
			$string .= chr(hexdec($bs[$i].$bs[($i + 1)]));
		}
		return $string;
	}


	public static function convertStringToHexString($s) {
		$bs = '';
		$chars = preg_split('//', $s, -1, PREG_SPLIT_NO_EMPTY);
		foreach ($chars as $c) {
			$bs .= sprintf('%02s', dechex(ord($c)));
		}
		return $bs;
	}


	public static function getEncPermissionsString($protection) {
		$binprot = sprintf('%032b', $protection);
		$str = chr(bindec(substr($binprot, 24, 8)));
		$str .= chr(bindec(substr($binprot, 16, 8)));
		$str .= chr(bindec(substr($binprot, 8, 8)));
		$str .= chr(bindec(substr($binprot, 0, 8)));
		return $str;
	}


	public static function encodeNameObject($name) {
		$escname = '';
		$length = strlen($name);
		for ($i = 0; $i < $length; ++$i) {
			$chr = $name[$i];
			if (preg_match('/[0-9a-zA-Z#_=-]/', $chr) == 1) {
				$escname .= $chr;
			} else {
				$escname .= sprintf('#%02X', ord($chr));
			}
		}
		return $escname;
	}


	public static function getAnnotOptFromJSProp($prop, &$spot_colors, $rtl=false) {
		if (isset($prop['aopt']) AND is_array($prop['aopt'])) {
			// the annotation options are already defined
			return $prop['aopt'];
		}
		$opt = array(); // value to be returned
		// alignment: Controls how the text is laid out within the text field.
		if (isset($prop['alignment'])) {
			switch ($prop['alignment']) {
				case 'left': {
					$opt['q'] = 0;
					break;
				}
				case 'center': {
					$opt['q'] = 1;
					break;
				}
				case 'right': {
					$opt['q'] = 2;
					break;
				}
				default: {
					$opt['q'] = ($rtl)?2:0;
					break;
				}
			}
		}
		// lineWidth: Specifies the thickness of the border when stroking the perimeter of a field's rectangle.
		if (isset($prop['lineWidth'])) {
			$linewidth = intval($prop['lineWidth']);
		} else {
			$linewidth = 1;
		}
		// borderStyle: The border style for a field.
		if (isset($prop['borderStyle'])) {
			switch ($prop['borderStyle']) {
				case 'border.d':
				case 'dashed': {
					$opt['border'] = array(0, 0, $linewidth, array(3, 2));
					$opt['bs'] = array('w'=>$linewidth, 's'=>'D', 'd'=>array(3, 2));
					break;
				}
				case 'border.b':
				case 'beveled': {
					$opt['border'] = array(0, 0, $linewidth);
					$opt['bs'] = array('w'=>$linewidth, 's'=>'B');
					break;
				}
				case 'border.i':
				case 'inset': {
					$opt['border'] = array(0, 0, $linewidth);
					$opt['bs'] = array('w'=>$linewidth, 's'=>'I');
					break;
				}
				case 'border.u':
				case 'underline': {
					$opt['border'] = array(0, 0, $linewidth);
					$opt['bs'] = array('w'=>$linewidth, 's'=>'U');
					break;
				}
				case 'border.s':
				case 'solid': {
					$opt['border'] = array(0, 0, $linewidth);
					$opt['bs'] = array('w'=>$linewidth, 's'=>'S');
					break;
				}
				default: {
					break;
				}
			}
		}
		if (isset($prop['border']) AND is_array($prop['border'])) {
			$opt['border'] = $prop['border'];
		}
		if (!isset($opt['mk'])) {
			$opt['mk'] = array();
		}
		if (!isset($opt['mk']['if'])) {
			$opt['mk']['if'] = array();
		}
		$opt['mk']['if']['a'] = array(0.5, 0.5);
		// buttonAlignX: Controls how space is distributed from the left of the button face with respect to the icon.
		if (isset($prop['buttonAlignX'])) {
			$opt['mk']['if']['a'][0] = $prop['buttonAlignX'];
		}
		// buttonAlignY: Controls how unused space is distributed from the bottom of the button face with respect to the icon.
		if (isset($prop['buttonAlignY'])) {
			$opt['mk']['if']['a'][1] = $prop['buttonAlignY'];
		}
		// buttonFitBounds: If true, the extent to which the icon may be scaled is set to the bounds of the button field.
		if (isset($prop['buttonFitBounds']) AND ($prop['buttonFitBounds'] == 'true')) {
			$opt['mk']['if']['fb'] = true;
		}
		// buttonScaleHow: Controls how the icon is scaled (if necessary) to fit inside the button face.
		if (isset($prop['buttonScaleHow'])) {
			switch ($prop['buttonScaleHow']) {
				case 'scaleHow.proportional': {
					$opt['mk']['if']['s'] = 'P';
					break;
				}
				case 'scaleHow.anamorphic': {
					$opt['mk']['if']['s'] = 'A';
					break;
				}
			}
		}
		// buttonScaleWhen: Controls when an icon is scaled to fit inside the button face.
		if (isset($prop['buttonScaleWhen'])) {
			switch ($prop['buttonScaleWhen']) {
				case 'scaleWhen.always': {
					$opt['mk']['if']['sw'] = 'A';
					break;
				}
				case 'scaleWhen.never': {
					$opt['mk']['if']['sw'] = 'N';
					break;
				}
				case 'scaleWhen.tooBig': {
					$opt['mk']['if']['sw'] = 'B';
					break;
				}
				case 'scaleWhen.tooSmall': {
					$opt['mk']['if']['sw'] = 'S';
					break;
				}
			}
		}
		// buttonPosition: Controls how the text and the icon of the button are positioned with respect to each other within the button face.
		if (isset($prop['buttonPosition'])) {
			switch ($prop['buttonPosition']) {
				case 0:
				case 'position.textOnly': {
					$opt['mk']['tp'] = 0;
					break;
				}
				case 1:
				case 'position.iconOnly': {
					$opt['mk']['tp'] = 1;
					break;
				}
				case 2:
				case 'position.iconTextV': {
					$opt['mk']['tp'] = 2;
					break;
				}
				case 3:
				case 'position.textIconV': {
					$opt['mk']['tp'] = 3;
					break;
				}
				case 4:
				case 'position.iconTextH': {
					$opt['mk']['tp'] = 4;
					break;
				}
				case 5:
				case 'position.textIconH': {
					$opt['mk']['tp'] = 5;
					break;
				}
				case 6:
				case 'position.overlay': {
					$opt['mk']['tp'] = 6;
					break;
				}
			}
		}
		// fillColor: Specifies the background color for a field.
		if (isset($prop['fillColor'])) {
			if (is_array($prop['fillColor'])) {
				$opt['mk']['bg'] = $prop['fillColor'];
			} else {
				$opt['mk']['bg'] = TCPDF_COLORS::convertHTMLColorToDec($prop['fillColor'], $spot_colors);
			}
		}
		// strokeColor: Specifies the stroke color for a field that is used to stroke the rectangle of the field with a line as large as the line width.
		if (isset($prop['strokeColor'])) {
			if (is_array($prop['strokeColor'])) {
				$opt['mk']['bc'] = $prop['strokeColor'];
			} else {
				$opt['mk']['bc'] = TCPDF_COLORS::convertHTMLColorToDec($prop['strokeColor'], $spot_colors);
			}
		}
		// rotation: The rotation of a widget in counterclockwise increments.
		if (isset($prop['rotation'])) {
			$opt['mk']['r'] = $prop['rotation'];
		}
		// charLimit: Limits the number of characters that a user can type into a text field.
		if (isset($prop['charLimit'])) {
			$opt['maxlen'] = intval($prop['charLimit']);
		}
		if (!isset($ff)) {
			$ff = 0; // default value
		}
		// readonly: The read-only characteristic of a field. If a field is read-only, the user can see the field but cannot change it.
		if (isset($prop['readonly']) AND ($prop['readonly'] == 'true')) {
			$ff += 1 << 0;
		}
		// required: Specifies whether a field requires a value.
		if (isset($prop['required']) AND ($prop['required'] == 'true')) {
			$ff += 1 << 1;
		}
		// multiline: Controls how text is wrapped within the field.
		if (isset($prop['multiline']) AND ($prop['multiline'] == 'true')) {
			$ff += 1 << 12;
		}
		// password: Specifies whether the field should display asterisks when data is entered in the field.
		if (isset($prop['password']) AND ($prop['password'] == 'true')) {
			$ff += 1 << 13;
		}
		// NoToggleToOff: If set, exactly one radio button shall be selected at all times; selecting the currently selected button has no effect.
		if (isset($prop['NoToggleToOff']) AND ($prop['NoToggleToOff'] == 'true')) {
			$ff += 1 << 14;
		}
		// Radio: If set, the field is a set of radio buttons.
		if (isset($prop['Radio']) AND ($prop['Radio'] == 'true')) {
			$ff += 1 << 15;
		}
		// Pushbutton: If set, the field is a pushbutton that does not retain a permanent value.
		if (isset($prop['Pushbutton']) AND ($prop['Pushbutton'] == 'true')) {
			$ff += 1 << 16;
		}
		// Combo: If set, the field is a combo box; if clear, the field is a list box.
		if (isset($prop['Combo']) AND ($prop['Combo'] == 'true')) {
			$ff += 1 << 17;
		}
		// editable: Controls whether a combo box is editable.
		if (isset($prop['editable']) AND ($prop['editable'] == 'true')) {
			$ff += 1 << 18;
		}
		// Sort: If set, the field's option items shall be sorted alphabetically.
		if (isset($prop['Sort']) AND ($prop['Sort'] == 'true')) {
			$ff += 1 << 19;
		}
		// fileSelect: If true, sets the file-select flag in the Options tab of the text field (Field is Used for File Selection).
		if (isset($prop['fileSelect']) AND ($prop['fileSelect'] == 'true')) {
			$ff += 1 << 20;
		}
		// multipleSelection: If true, indicates that a list box allows a multiple selection of items.
		if (isset($prop['multipleSelection']) AND ($prop['multipleSelection'] == 'true')) {
			$ff += 1 << 21;
		}
		// doNotSpellCheck: If true, spell checking is not performed on this editable text field.
		if (isset($prop['doNotSpellCheck']) AND ($prop['doNotSpellCheck'] == 'true')) {
			$ff += 1 << 22;
		}
		// doNotScroll: If true, the text field does not scroll and the user, therefore, is limited by the rectangular region designed for the field.
		if (isset($prop['doNotScroll']) AND ($prop['doNotScroll'] == 'true')) {
			$ff += 1 << 23;
		}
		// comb: If set to true, the field background is drawn as series of boxes (one for each character in the value of the field) and each character of the content is drawn within those boxes. The number of boxes drawn is determined from the charLimit property. It applies only to text fields. The setter will also raise if any of the following field properties are also set multiline, password, and fileSelect. A side-effect of setting this property is that the doNotScroll property is also set.
		if (isset($prop['comb']) AND ($prop['comb'] == 'true')) {
			$ff += 1 << 24;
		}
		// radiosInUnison: If false, even if a group of radio buttons have the same name and export value, they behave in a mutually exclusive fashion, like HTML radio buttons.
		if (isset($prop['radiosInUnison']) AND ($prop['radiosInUnison'] == 'true')) {
			$ff += 1 << 25;
		}
		// richText: If true, the field allows rich text formatting.
		if (isset($prop['richText']) AND ($prop['richText'] == 'true')) {
			$ff += 1 << 25;
		}
		// commitOnSelChange: Controls whether a field value is committed after a selection change.
		if (isset($prop['commitOnSelChange']) AND ($prop['commitOnSelChange'] == 'true')) {
			$ff += 1 << 26;
		}
		$opt['ff'] = $ff;
		// defaultValue: The default value of a field - that is, the value that the field is set to when the form is reset.
		if (isset($prop['defaultValue'])) {
			$opt['dv'] = $prop['defaultValue'];
		}
		$f = 4; // default value for annotation flags
		// readonly: The read-only characteristic of a field. If a field is read-only, the user can see the field but cannot change it.
		if (isset($prop['readonly']) AND ($prop['readonly'] == 'true')) {
			$f += 1 << 6;
		}
		// display: Controls whether the field is hidden or visible on screen and in print.
		if (isset($prop['display'])) {
			if ($prop['display'] == 'display.visible') {
				//
			} elseif ($prop['display'] == 'display.hidden') {
				$f += 1 << 1;
			} elseif ($prop['display'] == 'display.noPrint') {
				$f -= 1 << 2;
			} elseif ($prop['display'] == 'display.noView') {
				$f += 1 << 5;
			}
		}
		$opt['f'] = $f;
		// currentValueIndices: Reads and writes single or multiple values of a list box or combo box.
		if (isset($prop['currentValueIndices']) AND is_array($prop['currentValueIndices'])) {
			$opt['i'] = $prop['currentValueIndices'];
		}
		// value: The value of the field data that the user has entered.
		if (isset($prop['value'])) {
			if (is_array($prop['value'])) {
				$opt['opt'] = array();
				foreach ($prop['value'] AS $key => $optval) {
					// exportValues: An array of strings representing the export values for the field.
					if (isset($prop['exportValues'][$key])) {
						$opt['opt'][$key] = array($prop['exportValues'][$key], $prop['value'][$key]);
					} else {
						$opt['opt'][$key] = $prop['value'][$key];
					}
				}
			} else {
				$opt['v'] = $prop['value'];
			}
		}
		// richValue: This property specifies the text contents and formatting of a rich text field.
		if (isset($prop['richValue'])) {
			$opt['rv'] = $prop['richValue'];
		}
		// submitName: If nonempty, used during form submission instead of name. Only applicable if submitting in HTML format (that is, URL-encoded).
		if (isset($prop['submitName'])) {
			$opt['tm'] = $prop['submitName'];
		}
		// name: Fully qualified field name.
		if (isset($prop['name'])) {
			$opt['t'] = $prop['name'];
		}
		// userName: The user name (short description string) of the field.
		if (isset($prop['userName'])) {
			$opt['tu'] = $prop['userName'];
		}
		// highlight: Defines how a button reacts when a user clicks it.
		if (isset($prop['highlight'])) {
			switch ($prop['highlight']) {
				case 'none':
				case 'highlight.n': {
					$opt['h'] = 'N';
					break;
				}
				case 'invert':
				case 'highlight.i': {
					$opt['h'] = 'i';
					break;
				}
				case 'push':
				case 'highlight.p': {
					$opt['h'] = 'P';
					break;
				}
				case 'outline':
				case 'highlight.o': {
					$opt['h'] = 'O';
					break;
				}
			}
		}
		// Unsupported options:
		// - calcOrderIndex: Changes the calculation order of fields in the document.
		// - delay: Delays the redrawing of a field's appearance.
		// - defaultStyle: This property defines the default style attributes for the form field.
		// - style: Allows the user to set the glyph style of a check box or radio button.
		// - textColor, textFont, textSize
		return $opt;
	}


	public static function formatPageNumber($num) {
		return number_format((float)$num, 0, '', '.');
	}


	public static function formatTOCPageNumber($num) {
		return number_format((float)$num, 0, '', '.');
	}


	public static function extractCSSproperties($cssdata) {
		if (empty($cssdata)) {
			return array();
		}
		// remove comments
		$cssdata = preg_replace('/\/\*[^\*]*\*\//', '', $cssdata);
		// remove newlines and multiple spaces
		$cssdata = preg_replace('/[\s]+/', ' ', $cssdata);
		// remove some spaces
		$cssdata = preg_replace('/[\s]*([;:\{\}]{1})[\s]*/', '\\1', $cssdata);
		// remove empty blocks
		$cssdata = preg_replace('/([^\}\{]+)\{\}/', '', $cssdata);
		// replace media type parenthesis
		$cssdata = preg_replace('/@media[\s]+([^\{]*)\{/i', '@media \\1§', $cssdata);
		$cssdata = preg_replace('/\}\}/si', '}§', $cssdata);
		// trim string
		$cssdata = trim($cssdata);
		// find media blocks (all, braille, embossed, handheld, print, projection, screen, speech, tty, tv)
		$cssblocks = array();
		$matches = array();
		if (preg_match_all('/@media[\s]+([^\§]*)§([^§]*)§/i', $cssdata, $matches) > 0) {
			foreach ($matches[1] as $key => $type) {
				$cssblocks[$type] = $matches[2][$key];
			}
			// remove media blocks
			$cssdata = preg_replace('/@media[\s]+([^\§]*)§([^§]*)§/i', '', $cssdata);
		}
		// keep 'all' and 'print' media, other media types are discarded
		if (isset($cssblocks['all']) AND !empty($cssblocks['all'])) {
			$cssdata .= $cssblocks['all'];
		}
		if (isset($cssblocks['print']) AND !empty($cssblocks['print'])) {
			$cssdata .= $cssblocks['print'];
		}
		// reset css blocks array
		$cssblocks = array();
		$matches = array();
		// explode css data string into array
		if (substr($cssdata, -1) == '}') {
			// remove last parethesis
			$cssdata = substr($cssdata, 0, -1);
		}
		$matches = explode('}', $cssdata);
		foreach ($matches as $key => $block) {
			// index 0 contains the CSS selector, index 1 contains CSS properties
			$cssblocks[$key] = explode('{', $block);
			if (!isset($cssblocks[$key][1])) {
				// remove empty definitions
				unset($cssblocks[$key]);
			}
		}
		// split groups of selectors (comma-separated list of selectors)
		foreach ($cssblocks as $key => $block) {
			if (strpos($block[0], ',') > 0) {
				$selectors = explode(',', $block[0]);
				foreach ($selectors as $sel) {
					$cssblocks[] = array(0 => trim($sel), 1 => $block[1]);
				}
				unset($cssblocks[$key]);
			}
		}
		// covert array to selector => properties
		$cssdata = array();
		foreach ($cssblocks as $block) {
			$selector = $block[0];
			// calculate selector's specificity
			$matches = array();
			$a = 0; // the declaration is not from is a 'style' attribute
			$b = intval(preg_match_all('/[\#]/', $selector, $matches)); // number of ID attributes
			$c = intval(preg_match_all('/[\[\.]/', $selector, $matches)); // number of other attributes
			$c += intval(preg_match_all('/[\:]link|visited|hover|active|focus|target|lang|enabled|disabled|checked|indeterminate|root|nth|first|last|only|empty|contains|not/i', $selector, $matches)); // number of pseudo-classes
			$d = intval(preg_match_all('/[\>\+\~\s]{1}[a-zA-Z0-9]+/', ' '.$selector, $matches)); // number of element names
			$d += intval(preg_match_all('/[\:][\:]/', $selector, $matches)); // number of pseudo-elements
			$specificity = $a.$b.$c.$d;
			// add specificity to the beginning of the selector
			$cssdata[$specificity.' '.$selector] = $block[1];
		}
		// sort selectors alphabetically to account for specificity
		ksort($cssdata, SORT_STRING);
		// return array
		return $cssdata;
	}


	public static function fixHTMLCode($html, $default_css, $tagvs, $tidy_options, &$tagvspaces) {
		// configure parameters for HTML Tidy
		if (TCPDF_STATIC::empty_string($tidy_options)) {
			$tidy_options = array (
				'clean' => 1,
				'drop-empty-paras' => 0,
				'drop-proprietary-attributes' => 1,
				'fix-backslash' => 1,
				'hide-comments' => 1,
				'join-styles' => 1,
				'lower-literals' => 1,
				'merge-divs' => 1,
				'merge-spans' => 1,
				'output-xhtml' => 1,
				'word-2000' => 1,
				'wrap' => 0,
				'output-bom' => 0,
				//'char-encoding' => 'utf8',
				//'input-encoding' => 'utf8',
				//'output-encoding' => 'utf8'
			);
		}
		// clean up the HTML code
		$tidy = tidy_parse_string($html, $tidy_options);
		// fix the HTML
		$tidy->cleanRepair();
		// get the CSS part
		$tidy_head = tidy_get_head($tidy);
		$css = $tidy_head->value;
		$css = preg_replace('/<style([^>]+)>/ims', '<style>', $css);
		$css = preg_replace('/<\/style>(.*)<style>/ims', "\n", $css);
		$css = str_replace('', '', $css);
		$css = str_replace('', '', $css);
		preg_match('/<style>(.*)<\/style>/ims', $css, $matches);
		if (isset($matches[1])) {
			$css = strtolower($matches[1]);
		} else {
			$css = '';
		}
		// include default css
		$css = '<style>'.$default_css.$css.'</style>';
		// get the body part
		$tidy_body = tidy_get_body($tidy);
		$html = $tidy_body->value;
		// fix some self-closing tags
		$html = str_replace('<br>', '<br />', $html);
		// remove some empty tag blocks
		$html = preg_replace('/<div([^\>]*)><\/div>/', '', $html);
		$html = preg_replace('/<p([^\>]*)><\/p>/', '', $html);
		if (!TCPDF_STATIC::empty_string($tagvs)) {
			// set vertical space for some XHTML tags
			$tagvspaces = $tagvs;
		}
		// return the cleaned XHTML code + CSS
		return $css.$html;
	}


	public static function isValidCSSSelectorForTag($dom, $key, $selector) {
		$valid = false; // value to be returned
		$tag = $dom[$key]['value'];
		$class = array();
		if (isset($dom[$key]['attribute']['class']) AND !empty($dom[$key]['attribute']['class'])) {
			$class = explode(' ', strtolower($dom[$key]['attribute']['class']));
		}
		$id = '';
		if (isset($dom[$key]['attribute']['id']) AND !empty($dom[$key]['attribute']['id'])) {
			$id = strtolower($dom[$key]['attribute']['id']);
		}
		$selector = preg_replace('/([\>\+\~\s]{1})([\.]{1})([^\>\+\~\s]*)/si', '\\1*.\\3', $selector);
		$matches = array();
		if (preg_match_all('/([\>\+\~\s]{1})([a-zA-Z0-9\*]+)([^\>\+\~\s]*)/si', $selector, $matches, PREG_PATTERN_ORDER | PREG_OFFSET_CAPTURE) > 0) {
			$parentop = array_pop($matches[1]);
			$operator = $parentop[0];
			$offset = $parentop[1];
			$lasttag = array_pop($matches[2]);
			$lasttag = strtolower(trim($lasttag[0]));
			if (($lasttag == '*') OR ($lasttag == $tag)) {
				// the last element on selector is our tag or 'any tag'
				$attrib = array_pop($matches[3]);
				$attrib = strtolower(trim($attrib[0]));
				if (!empty($attrib)) {
					// check if matches class, id, attribute, pseudo-class or pseudo-element
					switch ($attrib[0]) {
						case '.': { // class
							if (in_array(substr($attrib, 1), $class)) {
								$valid = true;
							}
							break;
						}
						case '#': { // ID
							if (substr($attrib, 1) == $id) {
								$valid = true;
							}
							break;
						}
						case '[': { // attribute
							$attrmatch = array();
							if (preg_match('/\[([a-zA-Z0-9]*)[\s]*([\~\^\$\*\|\=]*)[\s]*["]?([^"\]]*)["]?\]/i', $attrib, $attrmatch) > 0) {
								$att = strtolower($attrmatch[1]);
								$val = $attrmatch[3];
								if (isset($dom[$key]['attribute'][$att])) {
									switch ($attrmatch[2]) {
										case '=': {
											if ($dom[$key]['attribute'][$att] == $val) {
												$valid = true;
											}
											break;
										}
										case '~=': {
											if (in_array($val, explode(' ', $dom[$key]['attribute'][$att]))) {
												$valid = true;
											}
											break;
										}
										case '^=': {
											if ($val == substr($dom[$key]['attribute'][$att], 0, strlen($val))) {
												$valid = true;
											}
											break;
										}
										case '$=': {
											if ($val == substr($dom[$key]['attribute'][$att], -strlen($val))) {
												$valid = true;
											}
											break;
										}
										case '*=': {
											if (strpos($dom[$key]['attribute'][$att], $val) !== false) {
												$valid = true;
											}
											break;
										}
										case '|=': {
											if ($dom[$key]['attribute'][$att] == $val) {
												$valid = true;
											} elseif (preg_match('/'.$val.'[\-]{1}/i', $dom[$key]['attribute'][$att]) > 0) {
												$valid = true;
											}
											break;
										}
										default: {
											$valid = true;
										}
									}
								}
							}
							break;
						}
						case ':': { // pseudo-class or pseudo-element
							if ($attrib[1] == ':') { // pseudo-element
								// pseudo-elements are not supported!
								// (::first-line, ::first-letter, ::before, ::after)
							} else { // pseudo-class
								// pseudo-classes are not supported!
								// (:root, :nth-child(n), :nth-last-child(n), :nth-of-type(n), :nth-last-of-type(n), :first-child, :last-child, :first-of-type, :last-of-type, :only-child, :only-of-type, :empty, :link, :visited, :active, :hover, :focus, :target, :lang(fr), :enabled, :disabled, :checked)
							}
							break;
						}
					} // end of switch
				} else {
					$valid = true;
				}
				if ($valid AND ($offset > 0)) {
					$valid = false;
					// check remaining selector part
					$selector = substr($selector, 0, $offset);
					switch ($operator) {
						case ' ': { // descendant of an element
							while ($dom[$key]['parent'] > 0) {
								if (self::isValidCSSSelectorForTag($dom, $dom[$key]['parent'], $selector)) {
									$valid = true;
									break;
								} else {
									$key = $dom[$key]['parent'];
								}
							}
							break;
						}
						case '>': { // child of an element
							$valid = self::isValidCSSSelectorForTag($dom, $dom[$key]['parent'], $selector);
							break;
						}
						case '+': { // immediately preceded by an element
							for ($i = ($key - 1); $i > $dom[$key]['parent']; --$i) {
								if ($dom[$i]['tag'] AND $dom[$i]['opening']) {
									$valid = self::isValidCSSSelectorForTag($dom, $i, $selector);
									break;
								}
							}
							break;
						}
						case '~': { // preceded by an element
							for ($i = ($key - 1); $i > $dom[$key]['parent']; --$i) {
								if ($dom[$i]['tag'] AND $dom[$i]['opening']) {
									if (self::isValidCSSSelectorForTag($dom, $i, $selector)) {
										break;
									}
								}
							}
							break;
						}
					}
				}
			}
		}
		return $valid;
	}


	public static function getCSSdataArray($dom, $key, $css) {
		$cssarray = array(); // style to be returned
		// get parent CSS selectors
		$selectors = array();
		if (isset($dom[($dom[$key]['parent'])]['csssel'])) {
			$selectors = $dom[($dom[$key]['parent'])]['csssel'];
		}
		// get all styles that apply
		foreach($css as $selector => $style) {
			$pos = strpos($selector, ' ');
			// get specificity
			$specificity = substr($selector, 0, $pos);
			// remove specificity
			$selector = substr($selector, $pos);
			// check if this selector apply to current tag
			if (self::isValidCSSSelectorForTag($dom, $key, $selector)) {
				if (!in_array($selector, $selectors)) {
					// add style if not already added on parent selector
					$cssarray[] = array('k' => $selector, 's' => $specificity, 'c' => $style);
					$selectors[] = $selector;
				}
			}
		}
		if (isset($dom[$key]['attribute']['style'])) {
			// attach inline style (latest properties have high priority)
			$cssarray[] = array('k' => '', 's' => '1000', 'c' => $dom[$key]['attribute']['style']);
		}
		// order the css array to account for specificity
		$cssordered = array();
		foreach ($cssarray as $key => $val) {
			$skey = sprintf('%04d', $key);
			$cssordered[$val['s'].'_'.$skey] = $val;
		}
		// sort selectors alphabetically to account for specificity
		ksort($cssordered, SORT_STRING);
		return array($selectors, $cssordered);
	}


	public static function getTagStyleFromCSSarray($css) {
		$tagstyle = ''; // value to be returned
		foreach ($css as $style) {
			// split single css commands
			$csscmds = explode(';', $style['c']);
			foreach ($csscmds as $cmd) {
				if (!empty($cmd)) {
					$pos = strpos($cmd, ':');
					if ($pos !== false) {
						$cmd = substr($cmd, 0, ($pos + 1));
						if (strpos($tagstyle, $cmd) !== false) {
							// remove duplicate commands (last commands have high priority)
							$tagstyle = preg_replace('/'.$cmd.'[^;]+/i', '', $tagstyle);
						}
					}
				}
			}
			$tagstyle .= ';'.$style['c'];
		}
		// remove multiple semicolons
		$tagstyle = preg_replace('/[;]+/', ';', $tagstyle);
		return $tagstyle;
	}


	public static function intToRoman($number) {
		$roman = '';
		if ($number >= 4000) {
			// do not represent numbers above 4000 in Roman numerals
			return strval($number);
		}
		while ($number >= 1000) {
			$roman .= 'M';
			$number -= 1000;
		}
		while ($number >= 900) {
			$roman .= 'CM';
			$number -= 900;
		}
		while ($number >= 500) {
			$roman .= 'D';
			$number -= 500;
		}
		while ($number >= 400) {
			$roman .= 'CD';
			$number -= 400;
		}
		while ($number >= 100) {
			$roman .= 'C';
			$number -= 100;
		}
		while ($number >= 90) {
			$roman .= 'XC';
			$number -= 90;
		}
		while ($number >= 50) {
			$roman .= 'L';
			$number -= 50;
		}
		while ($number >= 40) {
			$roman .= 'XL';
			$number -= 40;
		}
		while ($number >= 10) {
			$roman .= 'X';
			$number -= 10;
		}
		while ($number >= 9) {
			$roman .= 'IX';
			$number -= 9;
		}
		while ($number >= 5) {
			$roman .= 'V';
			$number -= 5;
		}
		while ($number >= 4) {
			$roman .= 'IV';
			$number -= 4;
		}
		while ($number >= 1) {
			$roman .= 'I';
			--$number;
		}
		return $roman;
	}


	public static function revstrpos($haystack, $needle, $offset = 0) {
		$length = strlen($haystack);
		$offset = ($offset > 0)?($length - $offset):abs($offset);
		$pos = strpos(strrev($haystack), strrev($needle), $offset);
		return ($pos === false)?false:($length - $pos - strlen($needle));
	}


	public static function getHyphenPatternsFromTEX($file) {
		// TEX patterns are available at:
		// http://www.ctan.org/tex-archive/language/hyph-utf8/tex/generic/hyph-utf8/patterns/
		$data = file_get_contents($file);
		$patterns = array();
		// remove comments
		$data = preg_replace('/\%[^\n]*/', '', $data);
		// extract the patterns part
		preg_match('/\\\\patterns\{([^\}]*)\}/i', $data, $matches);
		$data = trim(substr($matches[0], 10, -1));
		// extract each pattern
		$patterns_array = preg_split('/[\s]+/', $data);
		// create new language array of patterns
		$patterns = array();
		foreach($patterns_array as $val) {
			if (!TCPDF_STATIC::empty_string($val)) {
				$val = trim($val);
				$val = str_replace('\'', '\\\'', $val);
				$key = preg_replace('/[0-9]+/', '', $val);
				$patterns[$key] = $val;
			}
		}
		return $patterns;
	}


	public static function getPathPaintOperator($style, $default='S') {
		$op = '';
		switch($style) {
			case 'S':
			case 'D': {
				$op = 'S';
				break;
			}
			case 's':
			case 'd': {
				$op = 's';
				break;
			}
			case 'f':
			case 'F': {
				$op = 'f';
				break;
			}
			case 'f*':
			case 'F*': {
				$op = 'f*';
				break;
			}
			case 'B':
			case 'FD':
			case 'DF': {
				$op = 'B';
				break;
			}
			case 'B*':
			case 'F*D':
			case 'DF*': {
				$op = 'B*';
				break;
			}
			case 'b':
			case 'fd':
			case 'df': {
				$op = 'b';
				break;
			}
			case 'b*':
			case 'f*d':
			case 'df*': {
				$op = 'b*';
				break;
			}
			case 'CNZ': {
				$op = 'W n';
				break;
			}
			case 'CEO': {
				$op = 'W* n';
				break;
			}
			case 'n': {
				$op = 'n';
				break;
			}
			default: {
				if (!empty($default)) {
					$op = self::getPathPaintOperator($default, '');
				} else {
					$op = '';
				}
			}
		}
		return $op;
	}


	public static function getTransformationMatrixProduct($ta, $tb) {
		$tm = array();
		$tm[0] = ($ta[0] * $tb[0]) + ($ta[2] * $tb[1]);
		$tm[1] = ($ta[1] * $tb[0]) + ($ta[3] * $tb[1]);
		$tm[2] = ($ta[0] * $tb[2]) + ($ta[2] * $tb[3]);
		$tm[3] = ($ta[1] * $tb[2]) + ($ta[3] * $tb[3]);
		$tm[4] = ($ta[0] * $tb[4]) + ($ta[2] * $tb[5]) + $ta[4];
		$tm[5] = ($ta[1] * $tb[4]) + ($ta[3] * $tb[5]) + $ta[5];
		return $tm;
	}


	public static function getSVGTransformMatrix($attribute) {
		// identity matrix
		$tm = array(1, 0, 0, 1, 0, 0);
		$transform = array();
		if (preg_match_all('/(matrix|translate|scale|rotate|skewX|skewY)[\s]*\(([^\)]+)\)/si', $attribute, $transform, PREG_SET_ORDER) > 0) {
			foreach ($transform as $key => $data) {
				if (!empty($data[2])) {
					$a = 1;
					$b = 0;
					$c = 0;
					$d = 1;
					$e = 0;
					$f = 0;
					$regs = array();
					switch ($data[1]) {
						case 'matrix': {
							if (preg_match('/([a-z0-9\-\.]+)[\,\s]+([a-z0-9\-\.]+)[\,\s]+([a-z0-9\-\.]+)[\,\s]+([a-z0-9\-\.]+)[\,\s]+([a-z0-9\-\.]+)[\,\s]+([a-z0-9\-\.]+)/si', $data[2], $regs)) {
								$a = $regs[1];
								$b = $regs[2];
								$c = $regs[3];
								$d = $regs[4];
								$e = $regs[5];
								$f = $regs[6];
							}
							break;
						}
						case 'translate': {
							if (preg_match('/([a-z0-9\-\.]+)[\,\s]+([a-z0-9\-\.]+)/si', $data[2], $regs)) {
								$e = $regs[1];
								$f = $regs[2];
							} elseif (preg_match('/([a-z0-9\-\.]+)/si', $data[2], $regs)) {
								$e = $regs[1];
							}
							break;
						}
						case 'scale': {
							if (preg_match('/([a-z0-9\-\.]+)[\,\s]+([a-z0-9\-\.]+)/si', $data[2], $regs)) {
								$a = $regs[1];
								$d = $regs[2];
							} elseif (preg_match('/([a-z0-9\-\.]+)/si', $data[2], $regs)) {
								$a = $regs[1];
								$d = $a;
							}
							break;
						}
						case 'rotate': {
							if (preg_match('/([0-9\-\.]+)[\,\s]+([a-z0-9\-\.]+)[\,\s]+([a-z0-9\-\.]+)/si', $data[2], $regs)) {
								$ang = deg2rad($regs[1]);
								$x = $regs[2];
								$y = $regs[3];
								$a = cos($ang);
								$b = sin($ang);
								$c = -$b;
								$d = $a;
								$e = ($x * (1 - $a)) - ($y * $c);
								$f = ($y * (1 - $d)) - ($x * $b);
							} elseif (preg_match('/([0-9\-\.]+)/si', $data[2], $regs)) {
								$ang = deg2rad($regs[1]);
								$a = cos($ang);
								$b = sin($ang);
								$c = -$b;
								$d = $a;
								$e = 0;
								$f = 0;
							}
							break;
						}
						case 'skewX': {
							if (preg_match('/([0-9\-\.]+)/si', $data[2], $regs)) {
								$c = tan(deg2rad($regs[1]));
							}
							break;
						}
						case 'skewY': {
							if (preg_match('/([0-9\-\.]+)/si', $data[2], $regs)) {
								$b = tan(deg2rad($regs[1]));
							}
							break;
						}
					}
					$tm = self::getTransformationMatrixProduct($tm, array($a, $b, $c, $d, $e, $f));
				}
			}
		}
		return $tm;
	}


	public static function getVectorsAngle($x1, $y1, $x2, $y2) {
		$dprod = ($x1 * $x2) + ($y1 * $y2);
		$dist1 = sqrt(($x1 * $x1) + ($y1 * $y1));
		$dist2 = sqrt(($x2 * $x2) + ($y2 * $y2));
		$angle = acos($dprod / ($dist1 * $dist2));
		if (is_nan($angle)) {
			$angle = M_PI;
		}
		if ((($x1 * $y2) - ($x2 * $y1)) < 0) {
			$angle *= -1;
		}
		return $angle;
	}


	public static function pregSplit($pattern, $modifiers, $subject, $limit=NULL, $flags=NULL) {
		// PHP 8.1 deprecates nulls for $limit and $flags
		$limit = $limit === null ? -1 : $limit;
		$flags = $flags === null ? 0 : $flags;
		// the bug only happens on PHP 5.2 when using the u modifier
		if ((strpos($modifiers, 'u') === FALSE) OR (count(preg_split('//u', "\n\t", -1, PREG_SPLIT_NO_EMPTY)) == 2)) {
			return preg_split($pattern.$modifiers, $subject, $limit, $flags);
		}
		// preg_split is bugged - try alternative solution
		$ret = array();
		while (($nl = strpos($subject, "\n")) !== FALSE) {
			$ret = array_merge($ret, preg_split($pattern.$modifiers, substr($subject, 0, $nl), $limit, $flags));
			$ret[] = "\n";
			$subject = substr($subject, ($nl + 1));
		}
		if (strlen($subject) > 0) {
			$ret = array_merge($ret, preg_split($pattern.$modifiers, $subject, $limit, $flags));
		}
		return $ret;
	}


	public static function fopenLocal($filename, $mode) {
		if (strpos($filename, '://') === false) {
			$filename = 'file://'.$filename;
		} elseif (stream_is_local($filename) !== true) {
			return false;
		}
		return fopen($filename, $mode);
	}


	public static function url_exists($url) {
		$crs = curl_init();
		// encode query params in URL to get right response form the server
		$url = self::encodeUrlQuery($url);
		curl_setopt($crs, CURLOPT_URL, $url);
		curl_setopt($crs, CURLOPT_NOBODY, true);
		curl_setopt($crs, CURLOPT_FAILONERROR, true);
		if ((ini_get('open_basedir') == '') && (!ini_get('safe_mode'))) {
			curl_setopt($crs, CURLOPT_FOLLOWLOCATION, true);
		}
		curl_setopt($crs, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($crs, CURLOPT_TIMEOUT, 30);
		curl_setopt($crs, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($crs, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($crs, CURLOPT_USERAGENT, 'tc-lib-file');
		curl_setopt($crs, CURLOPT_MAXREDIRS, 5);
		if (defined('CURLOPT_PROTOCOLS')) {
		    curl_setopt($crs, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS | CURLPROTO_HTTP |  CURLPROTO_FTP | CURLPROTO_FTPS);
		}
		curl_exec($crs);
		$code = curl_getinfo($crs, CURLINFO_HTTP_CODE);
		curl_close($crs);
		return ($code == 200);
	}


	public static function encodeUrlQuery($url) {
		$urlData = parse_url($url);
		if (isset($urlData['query']) && $urlData['query']) {
			$urlQueryData = array();
			parse_str(urldecode($urlData['query']), $urlQueryData);
			$port = isset($urlData['port']) ? ':'.$urlData['port'] : '';
			$updatedUrl = $urlData['scheme'].'://'.$urlData['host'].$port.$urlData['path'].'?'.http_build_query($urlQueryData);
		} else {
			$updatedUrl = $url;
		}
		return $updatedUrl;
	}


	public static function file_exists($filename) {
		if (preg_match('|^https?://|', $filename) == 1) {
			return self::url_exists($filename);
		}
		if (strpos($filename, '://')) {
			return false; // only support http and https wrappers for security reasons
		}
		return @file_exists($filename);
	}


	public static function fileGetContents($file) {
		$alt = array($file);
		//
		if ((strlen($file) > 1)
		    && ($file[0] === '/')
		    && ($file[1] !== '/')
		    && !empty($_SERVER['DOCUMENT_ROOT'])
		    && ($_SERVER['DOCUMENT_ROOT'] !== '/')
		) {
		    $findroot = strpos($file, $_SERVER['DOCUMENT_ROOT']);
		    if (($findroot === false) || ($findroot > 1)) {
			$alt[] = htmlspecialchars_decode(urldecode($_SERVER['DOCUMENT_ROOT'].$file));
		    }
		}
		//
		$protocol = 'http';
		if (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) != 'off')) {
		    $protocol .= 's';
		}
		//
		$url = $file;
		if (preg_match('%^//%', $url) && !empty($_SERVER['HTTP_HOST'])) {
			$url = $protocol.':'.str_replace(' ', '%20', $url);
		}
		$url = htmlspecialchars_decode($url);
		$alt[] = $url;
		//
		if (preg_match('%^(https?)://%', $url)
		    && empty($_SERVER['HTTP_HOST'])
		    && empty($_SERVER['DOCUMENT_ROOT'])
		) {
			$urldata = parse_url($url);
			if (empty($urldata['query'])) {
				$host = $protocol.'://'.$_SERVER['HTTP_HOST'];
				if (strpos($url, $host) === 0) {
				    // convert URL to full server path
				    $tmp = str_replace($host, $_SERVER['DOCUMENT_ROOT'], $url);
				    $alt[] = htmlspecialchars_decode(urldecode($tmp));
				}
			}
		}
		//
		if (isset($_SERVER['SCRIPT_URI'])
		    && !preg_match('%^(https?|ftp)://%', $file)
		    && !preg_match('%^//%', $file)
		) {
		    $urldata = @parse_url($_SERVER['SCRIPT_URI']);
		    $alt[] = $urldata['scheme'].'://'.$urldata['host'].(($file[0] == '/') ? '' : '/').$file;
		}
		//
		$alt = array_unique($alt);
		foreach ($alt as $path) {
			if (!self::file_exists($path)) {
				continue;
			}
			$ret = @file_get_contents($path);
			if ( $ret != false ) {
			    return $ret;
			}
			// try to use CURL for URLs
			if (!ini_get('allow_url_fopen')
				&& function_exists('curl_init')
				&& preg_match('%^(https?|ftp)://%', $path)
			) {
				// try to get remote file data using cURL
				$crs = curl_init();
				curl_setopt($crs, CURLOPT_URL, $path);
				curl_setopt($crs, CURLOPT_BINARYTRANSFER, true);
				curl_setopt($crs, CURLOPT_FAILONERROR, true);
				curl_setopt($crs, CURLOPT_RETURNTRANSFER, true);
				if ((ini_get('open_basedir') == '') && (!ini_get('safe_mode'))) {
				    curl_setopt($crs, CURLOPT_FOLLOWLOCATION, true);
				}
				curl_setopt($crs, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($crs, CURLOPT_TIMEOUT, 30);
				curl_setopt($crs, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($crs, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($crs, CURLOPT_USERAGENT, 'tc-lib-file');
				curl_setopt($crs, CURLOPT_MAXREDIRS, 5);
				if (defined('CURLOPT_PROTOCOLS')) {
				    curl_setopt($crs, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS | CURLPROTO_HTTP |  CURLPROTO_FTP | CURLPROTO_FTPS);
				}
				$ret = curl_exec($crs);
				curl_close($crs);
				if ($ret !== false) {
					return $ret;
				}
			}
		}
		return false;
	}


	public static function _getULONG($str, $offset) {
		$v = unpack('Ni', substr($str, $offset, 4));
		return $v['i'];
	}


	public static function _getUSHORT($str, $offset) {
		$v = unpack('ni', substr($str, $offset, 2));
		return $v['i'];
	}


	public static function _getSHORT($str, $offset) {
		$v = unpack('si', substr($str, $offset, 2));
		return $v['i'];
	}


	public static function _getFWORD($str, $offset) {
		$v = self::_getUSHORT($str, $offset);
		if ($v > 0x7fff) {
			$v -= 0x10000;
		}
		return $v;
	}


	public static function _getUFWORD($str, $offset) {
		$v = self::_getUSHORT($str, $offset);
		return $v;
	}


	public static function _getFIXED($str, $offset) {
		// mantissa
		$m = self::_getFWORD($str, $offset);
		// fraction
		$f = self::_getUSHORT($str, ($offset + 2));
		$v = floatval(''.$m.'.'.$f.'');
		return $v;
	}


	public static function _getBYTE($str, $offset) {
		$v = unpack('Ci', substr($str, $offset, 1));
		return $v['i'];
	}

	public static function rfread($handle, $length) {
		$data = fread($handle, $length);
		if ($data === false) {
			return false;
		}
		$rest = ($length - strlen($data));
		if (($rest > 0) && !feof($handle)) {
			$data .= self::rfread($handle, $rest);
		}
		return $data;
	}


	public static function _freadint($f) {
		$a = unpack('Ni', fread($f, 4));
		return $a['i'];
	}


	public static $page_formats = array(
		// ISO 216 A Series + 2 SIS 014711 extensions
		'A0'                     => array( 2383.937,  3370.394), // = (  841 x 1189 ) mm  = ( 33.11 x 46.81 ) in
		'A1'                     => array( 1683.780,  2383.937), // = (  594 x 841  ) mm  = ( 23.39 x 33.11 ) in
		'A2'                     => array( 1190.551,  1683.780), // = (  420 x 594  ) mm  = ( 16.54 x 23.39 ) in
		'A3'                     => array(  841.890,  1190.551), // = (  297 x 420  ) mm  = ( 11.69 x 16.54 ) in
		'A4'                     => array(  595.276,   841.890), // = (  210 x 297  ) mm  = (  8.27 x 11.69 ) in
		'A5'                     => array(  419.528,   595.276), // = (  148 x 210  ) mm  = (  5.83 x 8.27  ) in
		'A6'                     => array(  297.638,   419.528), // = (  105 x 148  ) mm  = (  4.13 x 5.83  ) in
		'A7'                     => array(  209.764,   297.638), // = (   74 x 105  ) mm  = (  2.91 x 4.13  ) in
		'A8'                     => array(  147.402,   209.764), // = (   52 x 74   ) mm  = (  2.05 x 2.91  ) in
		'A9'                     => array(  104.882,   147.402), // = (   37 x 52   ) mm  = (  1.46 x 2.05  ) in
		'A10'                    => array(   73.701,   104.882), // = (   26 x 37   ) mm  = (  1.02 x 1.46  ) in
		'A11'                    => array(   51.024,    73.701), // = (   18 x 26   ) mm  = (  0.71 x 1.02  ) in
		'A12'                    => array(   36.850,    51.024), // = (   13 x 18   ) mm  = (  0.51 x 0.71  ) in
	);



	public static function getPageSizeFromFormat($format) {
		if (isset(self::$page_formats[$format])) {
			return self::$page_formats[$format];
		}
		return self::$page_formats['A4'];
	}


	public static function setPageBoxes($page, $type, $llx, $lly, $urx, $ury, $points, $k, $pagedim=array()) {
		if (!isset($pagedim[$page])) {
			// initialize array
			$pagedim[$page] = array();
		}
		if (!in_array($type, self::$pageboxes)) {
			return;
		}
		if ($points) {
			$k = 1;
		}
		$pagedim[$page][$type]['llx'] = ($llx * $k);
		$pagedim[$page][$type]['lly'] = ($lly * $k);
		$pagedim[$page][$type]['urx'] = ($urx * $k);
		$pagedim[$page][$type]['ury'] = ($ury * $k);
		return $pagedim;
	}


	public static function swapPageBoxCoordinates($page, $pagedim) {
		foreach (self::$pageboxes as $type) {
			// swap X and Y coordinates
			if (isset($pagedim[$page][$type])) {
				$tmp = $pagedim[$page][$type]['llx'];
				$pagedim[$page][$type]['llx'] = $pagedim[$page][$type]['lly'];
				$pagedim[$page][$type]['lly'] = $tmp;
				$tmp = $pagedim[$page][$type]['urx'];
				$pagedim[$page][$type]['urx'] = $pagedim[$page][$type]['ury'];
				$pagedim[$page][$type]['ury'] = $tmp;
			}
		}
		return $pagedim;
	}


	public static function getPageLayoutMode($layout='SinglePage') {
		switch ($layout) {
			case 'default':
			case 'single':
			case 'SinglePage': {
				$layout_mode = 'SinglePage';
				break;
			}
			case 'continuous':
			case 'OneColumn': {
				$layout_mode = 'OneColumn';
				break;
			}
			case 'two':
			case 'TwoColumnLeft': {
				$layout_mode = 'TwoColumnLeft';
				break;
			}
			case 'TwoColumnRight': {
				$layout_mode = 'TwoColumnRight';
				break;
			}
			case 'TwoPageLeft': {
				$layout_mode = 'TwoPageLeft';
				break;
			}
			case 'TwoPageRight': {
				$layout_mode = 'TwoPageRight';
				break;
			}
			default: {
				$layout_mode = 'SinglePage';
			}
		}
		return $layout_mode;
	}


	public static function getPageMode($mode='UseNone') {
		switch ($mode) {
			case 'UseNone': {
				$page_mode = 'UseNone';
				break;
			}
			case 'UseOutlines': {
				$page_mode = 'UseOutlines';
				break;
			}
			case 'UseThumbs': {
				$page_mode = 'UseThumbs';
				break;
			}
			case 'FullScreen': {
				$page_mode = 'FullScreen';
				break;
			}
			case 'UseOC': {
				$page_mode = 'UseOC';
				break;
			}
			case '': {
				$page_mode = 'UseAttachments';
				break;
			}
			default: {
				$page_mode = 'UseNone';
			}
		}
		return $page_mode;
	}


} // END OF TCPDF_STATIC CLASS

//============================================================+
// END OF FILE
//============================================================+
