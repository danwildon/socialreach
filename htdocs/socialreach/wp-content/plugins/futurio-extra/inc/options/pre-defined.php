<?php

function futurio_extra_default_opt( $def = '' ) {
		$woo = false;
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			$woo = true;
		}
		if ( futurio_extra_theme( 'futurio-storefront' ) == true ) { // default for Futurio Storefront theme
			if ( $def == 'title_heading' ) { 
				return ($woo == true) ? 'full' : 'boxed';
			}
		} else { // default for Futurio theme
			if ( $def == 'title_heading' ) { 
				return 'boxed';
			}
		}
}
