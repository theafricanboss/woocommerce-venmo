=== Checkout with Venmo ===
Contributors: theafricanboss
Donate Link: https://theafricanboss.com
Tags: venmo, paypal, finance, payments, money, transfer, receive, send, money transfer, usa, mobile money, cash, momo, woocommerce
Requires at least: 4.0
Tested up to: 5.8
Stable tag: trunk
Requires PHP: 5.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

The top finance app in the App Store now available on WordPress. Receive Venmo payments on your website with WooCommerce + Venmo

== Description ==

**Checkout with Venmo - Mobile Money Payments WooCommerce Extension**

Venmo - Mobile Money Payments Woocommerce Extension

For more details about this woocommerce extension, **please visit [The African Boss](https://theafricanboss.com/venmo)**

See available screenshots or the store example of [Gura Stores](https://gurastores.com/test/) for visual details.

= PRO or customized version =

Please reach out to theafricanboss@gmail.com for a custom version of this plugin.

Visit [The African Boss](https://theafricanboss.com/venmo) for more details

= Demo =

An example of the plugin in use is the following store:

[Gura Stores](https://gurastores.com/test/)

This plugin displays a Venmo link

See the screenshots or the store example of [Gura Stores](https://gurastores.com/test/) for visual details.

== Installation ==

= From Dashboard ( WordPress admin ) =

- Go to Plugins -> Add New
- Search for ‘Checkout with Venmo’
- Click on Install Now
- Activate the plugin through the “Plugins” menu in WordPress.

= Using cPanel or FTP =

- Download ‘Checkout with Venmo’ from [The African Boss](https://theafricanboss.com/venmo)
- Unzip wc-venmo.zip’ file and
- Upload wc-venmo folder to the “/wp-content/plugins/” directory.
- Activate the plugin through the “Plugins” menu in WordPress.

= After Plugin Activation =

Find and click Venmo in your admin dashboard left sidebar to access Venmo settings

**or**

Go to Woocommerce-> Settings-> Payments screen to configure the plugin

Also _you can visit_ the [plugin page](https://theafricanboss.com/venmo) for further setup instructions.

== Frequently Asked Questions ==

= Does this Venmo plugin integrate with the payment APIs? =

This plugin is a quick and easy way to display to your customers your Venmo username and to link them to it.
Unfortunately, this plugin doesn't integrate a full Venmo end-to-end payment. It only displays your Venmo username to the customer and redirects them to it so that the off site Venmo transaction can take place.

Please check screenshots for more details on what is reported.

== Screenshots ==

1. This is what the customer visiting your website will see at the checkout page
2. This is what you will submit when setting up the plugin and this information will be displayed to your customers
3. This is what the customer visiting your website will see on the thank you page after placing the order
4. This is where the Venmo link bring the customer with a prefilled order id and URL

== Changelog ==

= 1.3 August 27, 2021 =

- Remove @ at the beginning in venmo username

= 1.2 August 1, 2021 =

- Added the Venmo note that defaults to 'checkout at your_site.com'
- Updated Venmo note occurences in email, checkout page, and thank you page
- Added test button to settings page to see what customers see when they click the button or run the QR code
- Updated checkout icon
- Added settings links to plugins page
- Added setup plugin link to wp_die when upgrading from free to PRO plugin
- Fixed menu buttons in PRO plugin
- Send email with payment info if order is on-hold
- Fixed bootstrap CSS enqueued on menu pages
- Removed content from assets/css/checkout that was forcing 35px size on some themes
- Added height, max-height, width, max-width to force 100px in size of QR code and buttons on checkout and thank you page
- Added .paym_link class to assets/css/checkout to remove any underline from themes on the QR code or button

= 1.1 June 15, 2021 =

- Added wp_die to deactivate plugin when the PRO version is active
- Emails will be sent with the note from now on only if the order is still on-hold
- Name change from 'MOMO Venmo' to 'Checkout with Venmo'
- Updated links of assets in recommended and tutorials links

= 1.0 May 15, 2021 =

- Initial Release

<?php code();?>
