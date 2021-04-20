<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</p>

<p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	if ( wc_shipping_enabled() ) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	}
	printf(
		wp_kses( $dashboard_desc, $allowed_html ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
	?>
</p>
<div class="recent">
<?php

if ( is_user_logged_in() ){
  $order_statuses = array('wc-on-hold', 'wc-processing', 'wc-completed');
    $customer_user_id = get_current_user_id(); 

    $customer_orders = get_posts(array(
         'numberposts' => 1,
         'meta_key'    => '_customer_user',
         'meta_value'  => $customer_user_id,
         'post_type'   => 'shop_order',
         'post_status' => array('wc-pending', 'wc-processing', 'wc-completed') //array_keys(wc_get_order_statuses()),
    ));

    if ( !empty( $customer_orders ) ) {
    	?>
<?php
    $user_id = get_current_user_id(); // The current user ID

    // Get the WC_Customer instance Object for the current user
    $customer = new WC_Customer( $user_id );

    // Get the last WC_Order Object instance from current customer
    $last_order = $customer->get_last_order();

    $order_id     = $last_order->get_id(); // Get the order id
    $order_data   = $last_order->get_data(); // Get the order unprotected data in an array
    $order_status = $last_order->get_status(); // Get the order status
    $customer_orders = get_posts();



?>
<div class="last-order">
<div class="overlay"></div>
<div class="order-info">
<?php if(pll_current_language() == 'nl') { ?>  
<h2>jouw laatste bestelling</h2>
 <?php  } else if(pll_current_language() == 'en') { ?>
<h2>your last order</h2>
<?php }  ?>



        <ul>
        <?php foreach ( $last_order->get_items() as $item ) : ?>
            <li><p><?php echo $item->get_name(); ?></p></li>
        <?php endforeach; ?>
   </ul>
   <?php if(pll_current_language() == 'nl') { ?>  
        <a href="<?php echo wp_nonce_url( add_query_arg( 'order_again', $last_order->get_id()) , 'woocommerce-order_again' );   ?>" 
        class="default_btn">Weer bestellen</a>
 <?php  } else if(pll_current_language() == 'en') { ?>
        <a href="<?php echo wp_nonce_url( add_query_arg( 'order_again', $last_order->get_id()) , 'woocommerce-order_again' );   ?>" 
        class="default_btn">Order again</a>
<?php }  ?>

</div>
</div>
        
        <?php 
    }
    else {
//  add content if there is no orders
    }
}

?>
</div>




<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
