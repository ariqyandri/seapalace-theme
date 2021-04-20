<?php

// /  Main js
function wpb_adding_scripts() {
wp_register_script('main_scripts', get_template_directory_uri() . '/js/main.js', array('jquery'),'', true);
wp_register_script('animations', get_template_directory_uri() . '/js/animation.js', array('jquery'),'', true);
wp_enqueue_script('main_scripts');

}
// Linking home page scripts
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );  

// home scripts

function home_scripts() {

    if(basename(get_page_template()) == 'home.php'){

      
      wp_enqueue_script('animations');
    }

}

add_action('wp_enqueue_scripts', 'home_scripts');





// remove bloat
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_filter('the_content', 'wpautop');
// 

// theme menu support
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'mobile-menu' => __( 'Mobile Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
     )
   );
 }
 add_action( 'init', 'register_my_menus' );
// 

add_theme_support( 'post-thumbnails' );
// 

// / cart icon


add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
  ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <li><a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
      <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        </a></li>
        <?php
          
    return ob_get_clean();
 
}


add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
  <?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?></a>
    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}

remove_action( 
  'woocommerce_before_shop_loop_item',
  'woocommerce_template_loop_product_link_open',
  10
);
remove_action(
  'woocommerce_after_shop_loop_item',
  'woocommerce_template_loop_product_link_close',
  5
);

add_filter( 'wc_add_to_cart_message_html', '__return_false' );
// 

//

if(pll_current_language() == 'nl'){add_action('woocommerce_before_order_notes', 'wps_add_select_checkout_field_nl');}
else if(pll_current_language() == 'en'){add_action('woocommerce_before_order_notes', 'wps_add_select_checkout_field_en');}

function wps_add_select_checkout_field_nl( $checkout ) {


  woocommerce_form_field( 'daypart', array(
      'type'          => 'select',
      'class'         => array( 'wps-drop' ),
      'label'         => __( 'Aantal chopsticks' ),
      'options'       => array(
        'blank'   => __( 'Kies aantal Chopsticks', 'wps' ),
          'Geen' => __( 'Geen', 'wps' ),
          '1 paar' => __( '1 Paar', 'wps' ),
          '2 paar' => __( '2 Paar', 'wps' )
      )
 ),

  $checkout->get_value( 'daypart' ));
}
function wps_add_select_checkout_field_en( $checkout ) {


  woocommerce_form_field( 'daypart', array(
      'type'          => 'select',
      'class'         => array( 'wps-drop' ),
      'label'         => __( 'Amount of chopsticks' ),
      'options'       => array(
        'blank'   => __( 'Choose amount of chopsticks', 'wps' ),
          'Geen' => __( 'None', 'wps' ),
          '1 paar' => __( '1 Pair', 'wps' ),
          '2 paar' => __( '2 Pairs', 'wps' )
      )
 ),

  $checkout->get_value( 'daypart' ));
}
//

//* Process the checkout
 add_action('woocommerce_checkout_process', 'wps_select_checkout_field_process');
 function wps_select_checkout_field_process() {
    global $woocommerce;

    // Check if set, if its not set add an error.
    if ($_POST['daypart'] == "blank")
     wc_add_notice( '<strong>Kies aantal chopsticks voor deze besteling</strong>', 'error' );

 }

 //* Update the order meta with field value
 add_action('woocommerce_checkout_update_order_meta', 'wps_select_checkout_field_update_order_meta');
 function wps_select_checkout_field_update_order_meta( $order_id ) {

   if ($_POST['daypart']) update_post_meta( $order_id, 'daypart', esc_attr($_POST['daypart']));

 }


add_action( 'woocommerce_admin_order_data_after_billing_address', 'wps_select_checkout_field_display_admin_order_meta', 10, 1 );
function wps_select_checkout_field_display_admin_order_meta($order){

  echo '<p><strong>'.__('Aantal chopsticks').':</strong> ' . get_post_meta( $order->id, 'daypart', true ) . '</p>';

}

//* Add selection field value to emails
add_filter('woocommerce_email_order_meta_keys', 'wps_select_order_meta_keys');
function wps_select_order_meta_keys( $keys ) {

  $keys['Daypart:'] = 'daypart';
  return $keys;
  
}


/**
 Remove all possible fields
 **/
function wc_remove_checkout_fields( $fields ) {

    // Billing fields
    // unset( $fields['billing']['billing_country'] );


    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'wc_remove_checkout_fields' );
// 




function my_render_wc_login_form( $atts ) { 
  if ( ! is_user_logged_in() ) {  
    if ( function_exists( 'woocommerce_login_form' ) && 
        function_exists( 'woocommerce_output_all_notices' ) ) {
      //render the WooCommerce login form   
      ob_start();
      woocommerce_output_all_notices();
      woocommerce_login_form();
      return ob_get_clean();
    } else { 
      //render the WordPress login form
      return wp_login_form( array( 'echo' => false ));
    }
  } else {
   wp_redirect( site_url( '/my-account' ) );
       exit;
  }
}
add_shortcode( 'my_wc_login_form', 'my_render_wc_login_form' );

//  Adds redirect to home on logout




add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){

  wp_redirect( home_url() );
  exit();

}


// REMOVES download from my acount
function custom_my_account_menu_items( $items ) {
    unset($items['downloads']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );
// 





 // Enable available jQuery datepicker script in Wordpress
add_action( 'wp_enqueue_scripts', 'enabling_date_picker' );
function enabling_date_picker() {

    // Only on front-end and checkout page
    if( is_admin() || ! is_checkout() ) return;

    // Load available datepicker jQuery-ui plugin script
    wp_enqueue_script( 'jquery-ui-datepicker' );
}

// Add and display custom checkout fields + jQuery script
add_filter( 'woocommerce_checkout_fields' , 'brown_remove_billing_postcode_checkout' );
function brown_remove_billing_postcode_checkout( $fields ) {
    // Your Settings
    $start_hour = 11.5; // start time (in hours)
    $end_hour = 22; // end time (in hours)
    $offset =  1; // One hour before slot time (can be a float number like 1.5)
  date_default_timezone_set ('Europe/London'); // The timezone

    // Initializing variables
    $hour = 3600; // 1 hour in seconds
    $day = $hour * 24; // 1 day in seconds
    $now = strtotime("now");// Now time
    $real_now = $now + ($offset * $hour); // Now time + offset
    $today_date = date("Y-m-d"); // today date
    $tomorrow_date = date("Y-m-d", strtotime("+1 day")); // tomorow date
    $today_time = strtotime($today_date); // Today time at 00:00 in seconds
    $tomorrow_time = strtotime($tomorrow_date); // Tomorrow time at 00:00 in seconds

    $start_time = $today_time + ( $start_hour * $hour ); // Start datetime in seconds

    $end_time = $today_time + ( $end_hour * $hour ); // End datetime in seconds
    $today_slots = $default_slots = $option_days = array();

    // Add Delivery day field (with jquery-ui datepicker enabled)
    $fields['billing']['billing_delivery_day'] = array(
        'label'         => __('Delivery Day', 'woocommerce'),
        'placeholder'   => _x('Date for your delivery', 'placeholder', 'woocommerce'),
        'required'      => true,
        'id'            => 'datepicker', // Enable jQuery datepicker for this field
        'class'         => array('form-row-first'),
        'clear'         => false,
        'autocomplete'  => false,
        'type'          => 'text'
    );



  // Add Delivery hour slots (Dutch and English)
  if(pll_current_language() == 'nl'){    
    $fields['billing']['billing_delivery_hour'] = array(
    'label'        => __('Levertijd', 'woocommerce'),
    'required'     => true,
    'class'        => array('form-row-first'),
    'clear'        => false,
    'autocomplete' => false,
    'type'         => 'select',
    'options'      => array( '' => __('Kies de levertijd') ),
  );}
  else if(pll_current_language() == 'en'){    
    $fields['billing']['billing_delivery_hour'] = array(
    'label'        => __('Delivery Time', 'woocommerce'),
    'required'     => true,
    'class'        => array('form-row-first'),
    'clear'        => false,
    'autocomplete' => false,
    'type'         => 'select',
    'options'      => array( '' => __('Choose delivery time') ),
  );}

    // Making the delivery hour slots <option> arrays for Javascript
    for($i = $start_time; $i <= $end_time; $i += 1800 ){ // 1800 seconds is half an hour
        $key     = date('H:i', $i);
        $value   = date('h:ia', $i);

        // Today available hour slots array
        if($real_now < $i)
            $today_slots[$key] = $value;

        // Default hour slots array
        $default_slots[$key] = $value;
    }

    // The correct start date and time (today or tomorow) for Javascript
    $date = $real_now < $end_time ? $today_date : $tomorrow_date;
    $dtime = $real_now < $end_time ? date("Y-m-d\TH:i:s", $today_time) : date("Y-m-d\TH:i:s", $tomorrow_time);

    ?>
    <script>
        jQuery(function($){
            var offsetDate = 15, // Number of days enabled in the datepicker (optional and disabled in the datepicker code)
                startingDate = new Date('<?php echo $dtime; ?>'), // Starting day (dynamic)
                endingDate = new Date('<?php echo $dtime; ?>'), // End date (calculated below)
                todaySlots = <?php echo json_encode($today_slots); ?>,
                defaultSlots = <?php echo json_encode($default_slots); ?>,
                sDay = 'input[name ="billing_delivery_day"]',
                sHour = 'select[name ="billing_delivery_hour"]',
                defaultOption = $(sHour+' > option').text(),
                todaySlotsLength = Object.keys(todaySlots).length;

            // ------ 1). Dates and Date picker ------ //

            // // Set the default field start date
            $(sDay).val('<?php echo $date; ?>');
            $('#datepicker_field').addClass('woocommerce-validated');

            // // Max date calculation (optional and diasabeld in the datepicker code)
            endingDate.setDate(startingDate.getDate()+offsetDate);

            // // Jquery-ui datepicker
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                minDate: startingDate,
                maxDate: endingDate, // optional, can be enabled.
                setDate: startingDate,
            });



            // ------ 2). HOUR slots select field (dynamic <option>) ------ //

            // Build the <option> html html in the select field dynamically
            function dynamic_select_options_buid( slotsType ){
                $.each( slotsType, function( index, value ){
                    $(sHour).append('<option value="'+index+'">'+value+'</option>');
                });
            }
            // Replace and Build the <option> html in the select field dynamically
            function dynamic_select_options_replace( slotsType ){
                $(sHour+' > option').remove();
                $(sHour).append('<option value="">'+defaultOption+'</option>');
                dynamic_select_options_buid( slotsType );
            }
            
            console.log(defaultOption);
            console.log(todaySlotsLength);
            if(todaySlotsLength != 0 && todaySlotsLength < 21 ){
                // Loaded at start
                dynamic_select_options_buid( todaySlots );

                // Live date selection event
                $(sDay).change( function(){
                    console.log('day changed: '+$(this).val());
                    if( $(this).val() != '<?php echo $date; ?>' )
                        dynamic_select_options_replace( defaultSlots );
                    else
                        dynamic_select_options_replace( todaySlots );
                })
            } else {
                dynamic_select_options_buid( defaultSlots );
            }
        });
    </script>
    <?php
    return $fields;
}
   ?>

<?php 






 //* Update the order to include delivery time
 add_action('woocommerce_checkout_update_order_meta', 'wps_deliverytime');
 function wps_deliverytime( $order_id ) {

   if ($_POST['billing_delivery_hour']) update_post_meta( $order_id, 'billing_delivery_hour', esc_attr($_POST['billing_delivery_hour']));

 }


add_action( 'woocommerce_admin_order_data_after_billing_address', 'wps_deliverytime_admin', 10, 1 );
function wps_deliverytime_admin($order){

  echo '<p><strong>'.__('Bezorgtijd').':</strong> ' . get_post_meta( $order->id, 'billing_delivery_hour', true ) . '</p>'
  ;

}


 //* Update the order to include delivery time
 add_action('woocommerce_checkout_update_order_meta', 'wps_deliveryday');
 function wps_deliveryday( $order_id ) {

   if ($_POST['billing_delivery_day']) update_post_meta( $order_id, 'billing_delivery_day', esc_attr($_POST['billing_delivery_day']));

 }


add_action( 'woocommerce_admin_order_data_after_billing_address', 'wps_deliveryday_admin', 10, 1 );
function wps_deliveryday_admin($order){

    echo '<p><strong>'.__('Bezorgdatum').':</strong> ' . get_post_meta( $order->id, 'billing_delivery_day', true ) . '</p>';

}


// Min order amount

add_action( 'woocommerce_checkout_process', 'required_min_cart_subtotal_amount' );
add_action( 'woocommerce_before_cart' , 'required_min_cart_subtotal_amount' );
// add_action( 'woocommerce_check_cart_items', 'required_min_cart_subtotal_amount' );
function required_min_cart_subtotal_amount() {
    // $zone = WC_Shipping_Zones::get_zone_by ( 'zone_name', "1" . 'zone_name', "2" . 'zone_name' , "3" );

    // Only run it in  Cart or Checkout pages
    if( is_cart() || ( is_checkout() && ! is_wc_endpoint_url() ) ) {
        // Get cart shipping packages
        $shipping_packages =  WC()->cart->get_shipping_packages();

        // Get the WC_Shipping_Zones instance object for the first package
        $shipping_zone = wc_get_shipping_zone( reset( $shipping_packages ) );
        $zone_id   = $shipping_zone->get_id(); // Get the zone ID
        $zone_name = $shipping_zone->get_zone_name(); // Get the zone name
        $shipping_method_id = 'local_pickup'; // The targeted shipping method Id (exception)
        $chosen_methods = (array) WC()->session->get( 'chosen_shipping_methods' ); 


  // Only when a shipping method has been chosen
    if ( ! empty($chosen_methods) ) {
        $chosen_method  = explode(':', reset($chosen_methods)); // Get the chosen shipping method Id (array)
        $chosen_method_id = reset($chosen_method); // Get the chosen shipping method Id
    }

    // If "Local pickup" shipping method is chosen, exit (no minimun is required)
    if ( isset($chosen_method_id) && $chosen_method_id === $shipping_method_id ) {
        return; // exit
    }


        // Total (before taxes and shipping charges)
        $total = WC()->cart->subtotal;

         // HERE Set minimum cart total amount (for Zone 1,2,3 and for other zones)
       // $min_total = $zone_name == ״1״ ? 99.99 : 200.0;
$min_total = 25;
if  ($zone_id == "1") $min_total = 25;
if ($zone_id == "2") $min_total = 35;
if ($zone_id == "3") $min_total = 45;
if ($zone_id == "4") $min_total = 40;
if ($zone_id == "5") $min_total = 50;
if ($zone_id == "6") $min_total = 60;
if ($zone_id == "7") $min_total = 75;
if ($zone_id == "8") $min_total = 65;
if ($zone_id == "9") $min_total = 80;

        // Add an error notice is cart total is less than the minimum required
   if( $total <= $min_total  ) {
            // Display an error message
 wc_add_notice(   sprintf(
                __("minimum order is - %s voor jouw locatie "),
                wc_price( $min_total)
            )  , 'error' );
        }
    }
}



/**
 * Add order again button in my orders actions.
 *
 * @param  array $actions
 * @param  WC_Order $order
 * @return array
 */
function cs_add_order_again_to_my_orders_actions( $actions, $order ) {
  if ( $order->has_status( 'completed' ) ) {
    $actions['order-again'] = array(
      'url'  => wp_nonce_url( add_query_arg( 'order_again', $order->get_id()) , 'woocommerce-order_again' ),
      'name' => __( 'Order Again', 'woocommerce' )
    );
  }

  return $actions;
}

add_filter( 'woocommerce_my_account_my_orders_actions', 'cs_add_order_again_to_my_orders_actions', 50, 2 );


// Edit My Account Save redirects
function action_woocommerce_customer_save_address( $user_id ) { 
  wp_safe_redirect(wc_get_endpoint_url( 'edit-address' )); 
  exit;
}; 
add_action( 'woocommerce_customer_save_address', 'action_woocommerce_customer_save_address', 99, 2 ); 

function action_woocommerce_customer_save_account_details( $user_id ) { 
  wp_safe_redirect(wc_get_endpoint_url( 'edit-account' )); 
  exit;
}; 
add_action( 'woocommerce_save_account_details', 'action_woocommerce_customer_save_account_details', 99, 2 ); 
//

?>
