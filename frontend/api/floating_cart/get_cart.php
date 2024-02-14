<?php


$products = array();
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

    $product = wc_get_product( $cart_item['product_id'] );

    $products[] = array(
        "product_id" => $product->get_id(),
        "product_title" => $product->get_name(),
        "product_image" => wp_get_attachment_image_url($product->get_image_id()),
        "product_url" => get_permalink( $product->get_id() ),
        "product_cart_quantity" => $cart_item['quantity'],
        "product_unit_price" => WC()->cart->get_product_price( $cart_item['data'] ),
        "product_subtotal" => WC()->cart->get_product_subtotal( $cart_item['data'], $cart_item['quantity'] ),
    );
}

$result = array(
    "status" => 'true',
    "subtotal" => WC()->cart->get_cart_subtotal(),
    "discount" => wc_price(WC()->cart->get_discount_total()),
    "shipping" => wc_price(WC()->cart->get_shipping_total()),
    "total" => WC()->cart->get_total(),
    "products" => $products,
);


echo json_encode ($result, JSON_UNESCAPED_UNICODE);