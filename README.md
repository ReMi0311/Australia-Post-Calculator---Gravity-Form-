=== Australia Post Shipping for Gravity Forms ===
Contributors: chatgpt
Tags: gravity forms, australia post, shipping, live rates, international shipping, woocommerce alternative
Requires at least: 5.0
Tested up to: 6.5
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds real-time international shipping rate calculation via the Australia Post API to your Gravity Forms. Free shipping within Australia, live cost for overseas orders, and a transparent display of postage fees.

== Description ==

This plugin integrates the Australia Post Postage Assessment Calculator with Gravity Forms to dynamically calculate international shipping rates based on the selected country. It's ideal for online stores using Gravity Forms instead of WooCommerce, especially for pre-order or single-product sales.

**Features:**
- Free shipping automatically applied for Australian addresses
- Live international postage calculation using Australia Post API
- Displays shipping cost separately above the total
- AJAX-powered—no page reloads
- Works with Gravity Forms product and total fields

== Installation ==

1. Upload the plugin ZIP via **Plugins > Add New > Upload Plugin**.
2. Activate the plugin.
3. Ensure your form includes:
   - A Gravity Forms Address field with international format.
   - A Product field and a Total field.
4. The plugin will automatically calculate shipping based on the country selected.

== Frequently Asked Questions ==

= Do I need an Australia Post API key? =
Yes, you must [register here](https://developers.auspost.com.au/apis) to get a free API key.

= Can I customize the base product price or weight? =
Yes. You can edit these values in the plugin's JavaScript or PHP file if needed.

== Changelog ==

= 1.0 =
* Initial release with separate shipping fee display and live API integration.

