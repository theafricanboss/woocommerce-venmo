=== Checkout with Venmo on Woocommerce ===
Contributors: theafricanboss
Donate Link: https://theafricanboss.com
Tags: venmo, paypal, finance, payments, money, transfer, receive, send, money transfer, usa, mobile money, cash, momo, woocommerce
Requires at least: 4.0
Tested up to: 5.9.2
Stable tag: trunk
Requires PHP: 5.0
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

The top finance app in the App Store now available on WordPress. Receive Venmo payments on your website with WooCommerce + Venmo

== Description ==

**Now compatible with Translation plugins (like Loco, WPML, etc) meaning you can translate the Checkout, Thank you page and Email notices**

> If using the PRO version, deactivate this plugin first.

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
- Search for ‘Checkout with Venmo on Woocommerce’
- Click on Install Now
- Activate the plugin through the “Plugins” menu in WordPress.

= Using cPanel or FTP =

- Download ‘Checkout with Venmo on Woocommerce’ from [The African Boss](https://theafricanboss.com/venmo)
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

= 3.0 Mar 15, 2021 =
- SMS for Woocommerce compatible
- Internalization of the plugin checkout, thankyou and email
- Better Venmo URL encoding
- Updated help links
- Updated Woocommerce and Wordpress compatibility

= 2.2 December 5, 2021 =
- Updated from woocommerce_before_thankyou to woocommerce_thankyou_payment-method-id for compatibility with thank you page customizer plugins
- Moved menu order to below woocommerce menu - position 56
- Fixed error bug that disallowed upgrade/downgrade due to global constants structure in free MOMO<PAYMENT>PRO_ while in paid, MOMO<PAYMENT>_PRO_
- Fixed admin_url functions with issues
- Added ! $sent_to_admin / $sent_to_admin = false to email instructions
- Replaced woocommerce_email_before_order_table hook by woocommerce_email_order_details
- Updated Woocommerce and Wordpress compatibility

= 2.1.1 September 9, 2021 =
- Updated width and height attributes for momo-img

= 2.1 September 7, 2021 =
- Added .momo-img class that overwrites theme CSS for the button and QR code
- Changed the wording and removed "shipping and delivery" to include digital woocommerce sellers
- Removed version date

= 2.0.1 August 30, 2021 =
- Fixed order order_id occurences

= 2.0 August 27, 2021 =

- Remove @ at the beginning in venmo username
- Sharing payment methods with free versions to keep data across
- Fixed 'if functions for on-hold and check payment methods' placement
- Improved deactivate free plugins when PRO activated
Smooth upgrade from free to PRO
- PRO invitation admin notice when using free plugin
- Fixed bootstrap CSS enqueued on menu pages
- Added .momo-*** class to checkout CSS to apply custom CSS to payment icons and QR codes
Removed content from assets/css/checkout that was forcing 35px size on some themes
Added important height to force 100px in size of QR code and buttons on checkout and thank you page
Added setup plugin link to wp_die when upgrading from free to PRO plugin
- Better settings links on plugins page
- Removed review notice asking for reviews
- Better installation instructions
- renamed PRO versions to [payment_name PRO]
- Added free and paid recommended menus in sidebar with colors
- Fixed menu buttons in PRO plugin

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
- Name change from 'MOMO Venmo' to 'Checkout with Venmo on Woocommerce'
- Updated links of assets in recommended and tutorials links

= 1.0 May 15, 2021 =

- Initial Release

<?php code();?>
