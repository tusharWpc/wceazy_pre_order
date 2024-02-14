<?php



// include the TCPDF class
require_once(dirname(__FILE__).'/tcpdf.php');
// include PDF parser class
require_once(dirname(__FILE__).'/tcpdf_parser.php');


class TCPDF_IMPORT extends TCPDF {


	public function importPDF($filename) {
		// load document
		$rawdata = file_get_contents($filename);
		if ($rawdata === false) {
			$this->Error('Unable to get the content of the file: '.$filename);
		}
		// configuration parameters for parser
		$cfg = array(
			'die_for_errors' => false,
			'ignore_filter_decoding_errors' => true,
			'ignore_missing_filter_decoders' => true,
		);
		try {
			// parse PDF data
			$pdf = new TCPDF_PARSER($rawdata, $cfg);
		} catch (Exception $e) {
			die($e->getMessage());
		}
		// get the parsed data
		$data = $pdf->getParsedData();
		// release some memory
		unset($rawdata);

		// ...


		print_r($data); // DEBUG


		unset($pdf);
	}

} // END OF CLASS

//============================================================+
// END OF FILE
//============================================================+
