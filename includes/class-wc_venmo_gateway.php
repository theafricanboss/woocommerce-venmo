<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists ( 'WC_Payment_Gateway' ) ) {

	class wc_venmo_gateway extends WC_Payment_Gateway {

		public function __construct() {

			$this->id = 'venmo'; // payment gateway plugin ID
			$this->icon = MOMOVENMO_PLUGIN_DIR_URL . 'assets/images/venmo_35.png'; // URL of the icon that will be displayed on checkout page near your gateway name
			$this->has_fields = true; // in case you need a custom form
			$this->method_title = 'Venmo';
			$this->method_description = 'Easily receive Venmo payments'; // will be displayed on the options page

			$this->init_settings();
			$this->enabled = $this->get_option( 'enabled' );
			$this->title = $this->get_option( 'checkout_title' );
			$this->ReceiverVENMONo = $this->get_option( 'ReceiverVENMONo' );
			$this->ReceiverVenmo = $this->get_option( 'ReceiverVenmo' );
			$this->venmo_note = $this->get_option( 'venmo_note' );
			$this->ReceiverVENMONoOwner = $this->get_option( 'ReceiverVENMONoOwner' );
			$this->ReceiverVenmoOwner = $this->get_option( 'ReceiverVenmoOwner' );
			$this->ReceiverVENMOEmail = $this->get_option( 'ReceiverVENMOEmail' );
			$this->checkout_description = $this->get_option( 'checkout_description' );
			$this->venmo_notice = $this->get_option( 'venmo_notice' );
			$this->store_instructions = $this->get_option( 'store_instructions' );
			$this->display_venmo = $this->get_option( 'display_venmo' );
			$this->display_venmo_logo_button = $this->get_option( 'display_venmo_logo_button' );
			$this->toggleSupport = $this->get_option( 'toggleSupport' );
			$this->toggleTutorial = $this->get_option( 'toggleTutorial' );
			$this->toggleCredits = $this->get_option( 'toggleCredits' );

			if ( isset( $this->ReceiverVenmo ) ) { $test = '<a href="https://venmo.com/'. esc_attr( wp_kses_post( $this->ReceiverVenmo ) ). '?txn=pay&amount=1&note=checkout at '. get_site_url(). '" target="_blank">Test</a>'; } else { $test = ''; }

			$this->form_fields = array(
				'enabled' => array(
					'title'       => 'Enable VENMO ' . $test,
					'label'       => 'Check to Enable / Uncheck to Disable',
					'type'        => 'checkbox',
					'default'     => 'no'
				),
				'checkout_title' => array(
					'title'       => 'Checkout Title',
					'type'        => 'text',
					'description' => 'This is the title which the user sees on the checkout page.',
					'default'     => 'Venmo',
					'placeholder' => 'Venmo',
				),
				'ReceiverVENMONo' => array(
					'title'       => 'Receiver Venmo No',
					'type'        => 'text',
					'description' => 'This is the phone number associated with your store Venmo account or your receiving Venmo account. Customers will send money to this number',
					'placeholder' => "+1234567890",
				),
				'ReceiverVenmo' => array(
					'title'       => 'Receiver Venmo username ' . $test,
					'type'        => 'text',
					'description' => 'Remove @ at the beginning in venmo username. This is the Venmo username associated with your store Venmo account. Customers will send money to this Venmo account',
					'placeholder' => 'username',
				),
				'venmo_note'    => array(
					'title'       => 'Venmo Transaction Note with Order Number prepopulated <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank"><sup style="color:red">PRO</sup></a>',
					'type'        => 'text',
					'description' => 'Transaction Note or Purchasing reason that will be transferred into the Venmo app for the order <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank">APPLY CHANGES WITH PRO</a>',
					'default'     => 'checkout at '. get_site_url(),
					'placeholder' => 'checkout at '. get_site_url(),
					'css'     => 'width:80%; pointer-events: none;',
					'class'     => 'disabled',
				),
				'ReceiverVenmoOwner' => array(
					'title'       => "Receiver Venmo Owner's Name",
					'type'        => 'text',
					'description' => 'This is the name associated with your store Venmo account. Customers will send money to this Venmo account name',
					'placeholder' => 'Jane D',
				),
				'ReceiverVENMOEmail' => array(
					'title'       => "Receiver Venmo Owner's Email",
					'type'        => 'text',
					'description' => 'This is the email associated with your store Venmo account or your receiving Venmo account. Customers will send money to this email',
					'default'     => "@gmail.com",
					'placeholder' => "email@website.com",
				),
				'checkout_description' => array(
					'title'       => 'Checkout Page Notice <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank"><sup style="color:red">PRO</sup></a>',
					'type'        => 'textarea',
					'description' => 'This is the description which the user sees during checkout. <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank">APPLY CHANGES WITH PRO</a>',
					'default'     => 'Send money to the venmo username or click the Venmo button below',
					'css'     => 'width:80%; pointer-events: none;',
					'class'     => 'disabled',
				),
				'venmo_notice'    => array(
					'title'       => 'Thank You Notice <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank"><sup style="color:red">PRO</sup></a>',
					'type'        => 'textarea',
					'description' => 'Notice that will be added to the thank you page before store instructions if any. <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank">APPLY CHANGES WITH PRO</a>',
					'default'     => "<p>We are checking our systems to confirm that we received. If you haven't sent the money already, please make sure to do so now.</p>" .
					'<p>Once confirmed, we will proceed with the shipping and delivery options you chose.</p>' .
					'<p>Thank you for doing business with us! You will be updated regarding your order details soon.</p>',
					'css'     => 'width:80%; pointer-events: none;',
					'class'     => 'disabled',
				),
				'store_instructions'    => array(
					'title'       => 'Store Instructions <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank"><sup style="color:red">PRO</sup></a>',
					'type'        => 'textarea',
					'description' => 'Store Instructions that will be added to the thank you page and emails. <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank">APPLY CHANGES WITH PRO</a>',
					'default'     => "Please send the total amount requested to our store if you haven't yet",
					'css'     => 'width:80%; pointer-events: none;',
					'class'     => 'disabled',
				),
				'display_venmo' => array(
					'title'       => 'Customers place order first before getting Venmo info <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank"><sup style="color:red">PRO</sup></a>',
					'label'       => 'Uncheck to remove Venmo info before placing order / Check to show Venmo info first',
					'type'        => 'checkbox',
					'description' => 'Disable to remove BOTH the Venmo image and QR code from your payment method on checkout. It will still be displayed on the thank you page, email notifications, and customer notes <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank">APPLY CHANGES WITH PRO</a>',
					'default'     => 'yes',
					'class'     => 'disabled',
				),
				'display_venmo_logo_button' => array(
					'title'       => 'Show ONLY the QR code in the payment method on checkout <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank"><sup style="color:red">PRO</sup></a>',
					'label'       => 'Check to show the Venmo logo button / Uncheck to remove the Venmo logo button',
					'type'        => 'checkbox',
					'description' => 'Disable to remove the big Venmo image button in the payment method on checkout <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank">APPLY CHANGES WITH PRO</a>',
					'default'     => 'no',
					'class'     => 'disabled',
				),
				'toggleSupport' => array(
					'title'       => 'Enable Support message <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank"><sup style="color:red">PRO</sup></a>',
					'label'       => 'Check to Enable / Uncheck to Disable',
					'type'        => 'checkbox',
					'description' => 'Help your customers checkout with ease by letting them know how to contact you <a style="text-decoration:none" href="https://theafricanboss.com/venmo/" target="_blank">APPLY CHANGES WITH PRO</a>',
					'default'     => 'yes',
					'class'     => 'disabled',
				),
				'toggleTutorial' => array(
					'title'       => 'Enable Tutorial to display 1min video link',
					'label'       => 'Check to Enable / Uncheck to Disable',
					'type'        => 'checkbox',
					'description' => 'Help your customers checkout with ease by showing this tutorial link',
					'default'     => 'no',
				),
				'toggleCredits' => array(
					'title'       => 'Enable Credits to display Powered by The African Boss',
					'label'       => 'Check to Enable / Uncheck to Disable',
					'type'        => 'checkbox',
					'description' => 'Help us spread the word about this plugin by sharing that we made this plugin',
					'default'     => 'no',
				),
			);

			// Gateways can support subscriptions, refunds, saved payment methods
			$this->supports = array('products');

			// This action hook saves the settings
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );

			// We need custom JavaScript to obtain a token
			add_action( 'wp_enqueue_scripts', array( $this, 'payment_scripts' ) );

			// Thank you page
			add_action( 'woocommerce_before_thankyou', array( $this, 'thankyou_page' ) );

			// Customer Emails
			add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );

		}

		//Checkout page
		public function payment_fields () {
			require_once MOMOVENMO_PLUGIN_DIR . 'includes/pages/checkout.php';
		}

		//Payment Custom JS and CSS
		public function payment_scripts() {
			require_once MOMOVENMO_PLUGIN_DIR . 'includes/functions/payment_scripts.php';
		}

		//Thank you page
		public function thankyou_page( $order_id ) {
			require_once MOMOVENMO_PLUGIN_DIR . 'includes/pages/thankyou.php';
		}

		//Add content to the WC emails
		public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
			if ( 'on-hold' === $order->get_status() && 'venmo' === $order->get_payment_method() ) {
				require_once MOMOVENMO_PLUGIN_DIR . 'includes/notifications/email.php';
			}
		}

		//Process Order
		public function process_payment( $order_id ) {

			if( ! is_wp_error($order) ) {

				require_once MOMOVENMO_PLUGIN_DIR . 'includes/notifications/note.php';

				// Mark as on-hold (we're awaiting the payment).
				$order->update_status( apply_filters( 'woocommerce_venmo_process_payment_order_status', 'on-hold', $order ), __( 'Checking for payment', 'woocommerce' ) );

				// reduce inventory
				$order->reduce_order_stock();

				// Empty cart
				$woocommerce->cart->empty_cart();

				// Redirect to the thank you page
				return array( 'result' => 'success', 'redirect' => $this->get_return_url( $order ) );

			} else {
				wc_add_notice(  'Connection error.', 'error' );
				return;
			}

		}

		//Webhook
		public function webhook() {
			require_once MOMOVENMO_PLUGIN_DIR . 'includes/functions/webhook.php';
		}

	}

} else {
	deactivate_plugins( MOMOVENMO_PLUGIN_BASENAME );
	require_once MOMOVENMO_PLUGIN_DIR . 'includes/notifications/notices.php';
}
?>