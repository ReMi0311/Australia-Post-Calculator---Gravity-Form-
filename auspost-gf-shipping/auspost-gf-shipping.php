<?php
/*
Plugin Name: Australia Post Shipping for Gravity Forms
Description: Calculates international shipping via Australia Post API and updates Gravity Forms total.
Version: 1.0
Author: ChatGPT
*/

add_action('wp_enqueue_scripts', function () {
    // Only enqueue on pages with the form
    if (is_page()) {
        wp_enqueue_script('auspost-shipping-gf', plugin_dir_url(__FILE__) . 'js/auspost-shipping.js', ['jquery'], null, true);
        wp_localize_script('auspost-shipping-gf', 'AusPostGF', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'basePrice' => 34.99
        ]);
    }
});

add_action('wp_ajax_nopriv_get_auspost_shipping', 'get_auspost_shipping');
add_action('wp_ajax_get_auspost_shipping', 'get_auspost_shipping');

function get_auspost_shipping() {
    $country = sanitize_text_field($_GET['country'] ?? '');
    $weight = floatval($_GET['weight'] ?? 0.5);

    if (strtolower($country) === 'australia') {
        wp_send_json(['shipping_cost' => 0]);
    }

    $apiKey = '549519f4-3822-4252-b18c-6ec12b0e1a5b'; // Replace with your actual API key

    $endpoint = "https://digitalapi.auspost.com.au/postage/parcel/international/calculate.json?country_code=" . urlencode($country) . "&weight=" . $weight;

    $response = wp_remote_get($endpoint, [
        'headers' => [
            'AUTH-KEY' => $apiKey
        ]
    ]);

    if (is_wp_error($response)) {
        wp_send_json(['shipping_cost' => 0]);
    }

    $body = json_decode(wp_remote_retrieve_body($response), true);
    $cost = $body['postage_result']['total_cost'] ?? 0;

    wp_send_json(['shipping_cost' => $cost]);
}
