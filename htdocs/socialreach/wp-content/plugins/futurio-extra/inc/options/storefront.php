<?php
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	Kirki::add_field( 'futurio_extra', array(
		'type'				 => 'toggle',
		'settings'			 => 'header_cart_total',
		'label'				 => esc_attr__( 'Total field and cart text', 'futurio-extra' ),
		'section'			 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_section' : 'main_menu_icons',
		'default'			 => 1,
		'priority'			 => 10,
		'active_callback'	 => array(
			array(
				'setting'	 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_layout' : 'main_menu_sort',
				'operator'	 => 'in',
				'value'		 => 'woo_cart',
			),
		),
	) );

	Kirki::add_field( 'futurio_extra', array(
		'type'				 => 'text',
		'settings'			 => 'header_cart_text',
		'label'				 => __( 'Cart text', 'futurio-extra' ),
		'section'			 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_section' : 'main_menu_icons',
		'default'			 => __( 'Cart', 'futurio-extra' ),
		'priority'			 => 10,
		'transport'			 => 'postMessage',
		'js_vars'			 => array(
			array(
				'element'	 => '.amount-cart-total',
				'function'	 => 'html',
			),
		),
		'active_callback'	 => array(
			array(
				'setting'	 => 'header_cart_total',
				'operator'	 => '==',
				'value'		 => '1',
			),
			array(
				'setting'	 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_layout' : 'main_menu_sort',
				'operator'	 => 'in',
				'value'		 => 'woo_cart',
			),
		),
	) );

	Kirki::add_field( 'futurio_extra', array(
		'type'				 => 'toggle',
		'settings'			 => 'header_account_text',
		'label'				 => esc_attr__( 'Account text', 'futurio-extra' ),
		'section'			 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_section' : 'main_menu_icons',
		'default'			 => 1,
		'priority'			 => 10,
		'active_callback'	 => array(
			array(
				'setting'	 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_layout' : 'main_menu_sort',
				'operator'	 => 'in',
				'value'		 => 'woo_account',
			),
		),
	) );
	Kirki::add_field( 'futurio_extra', array(
		'type'				 => 'text',
		'settings'			 => 'header_account_title',
		'label'				 => __( 'Account heading', 'futurio-extra' ),
		'section'			 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_section' : 'main_menu_icons',
		'default'			 => __( 'Welcome', 'futurio-extra' ),
		'priority'			 => 10,
		'transport'			 => 'postMessage',
		'js_vars'			 => array(
			array(
				'element'	 => '.account-title',
				'function'	 => 'html',
			),
		),
		'active_callback'	 => array(
			array(
				'setting'	 => 'header_account_text',
				'operator'	 => '==',
				'value'		 => '1',
			),
			array(
				'setting'	 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_layout' : 'main_menu_sort',
				'operator'	 => 'in',
				'value'		 => 'woo_account',
			),
		),
	) );
	Kirki::add_field( 'futurio_extra', array(
		'type'				 => 'text',
		'settings'			 => 'header_account_subtitle',
		'label'				 => __( 'Account sub-heading', 'futurio-extra' ),
		'section'			 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_section' : 'main_menu_icons',
		'default'			 => __( 'Login/Register', 'futurio-extra' ),
		'priority'			 => 10,
		'transport'			 => 'postMessage',
		'js_vars'			 => array(
			array(
				'element'	 => '.account-subtitle',
				'function'	 => 'html',
			),
		),
		'active_callback'	 => array(
			array(
				'setting'	 => 'header_account_text',
				'operator'	 => '==',
				'value'		 => '1',
			),
			array(
				'setting'	 => get_theme_mod( 'title_heading', 'full' ) == 'full' ? 'header_layout' : 'main_menu_sort',
				'operator'	 => 'in',
				'value'		 => 'woo_account',
			),
		),
	) );

	Kirki::add_field( 'futurio_extra', array(
		'type'				 => 'toggle',
		'settings'			 => 'header_search_on_off',
		'label'				 => esc_attr__( 'Search field', 'futurio-extra' ),
		'section'			 => 'header_section',
		'default'			 => 1,
		'priority'			 => 11,
		'active_callback'	 => array(
			array(
				'setting'	 => 'title_heading',
				'operator'	 => '==',
				'value'		 => 'full',
			),
			array(
				'setting'	 => 'header_layout',
				'operator'	 => 'in',
				'value'		 => 'search',
			),
		),
	) );

	function futurio_extra_cart_text() {
		if ( get_theme_mod( 'header_cart_total', 1 ) == 1 ) {
			?>
			<div class="amount-cart hidden-xs hidden-sm">
				<div class="amount-cart-total"><?php esc_html_e( get_theme_mod( 'header_cart_text', 'Cart' ) ); ?></div>
				<div class="amount-cart-data"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div>
			</div> 
		<?php
		}
	}

	function futurio_extra_account_text() {
		if ( get_theme_mod( 'header_account_text', 1 ) == 1 ) {
			?>
			<div class="account-text hidden-xs hidden-sm">
				<div class="account-title"><?php esc_html_e( get_theme_mod( 'header_account_title', 'Welcome' ) ); ?></div>
				<div class="account-subtitle"><?php esc_html_e( get_theme_mod( 'header_account_subtitle', 'Login/Register' ) ); ?></div>
			</div> 
			<?php
		}
	}
	
	function futurio_extra_header_icons() {
        add_action( 'futurio_storefront_account', 'futurio_extra_account_text' );
        add_action( 'futurio_storefront_cart', 'futurio_extra_cart_text' );
    }
	add_action( 'after_setup_theme', 'futurio_extra_header_icons', 0 );

}

function futurio_extra_header_styling() {

	$icons				 = array();
	$icons[ 'heading' ]	 = esc_attr__( 'Heading & Logo', 'futurio-extra' );
	$icons[ 'search' ]	 = esc_attr__( 'Search & Header Widget Area', 'futurio-extra' );

	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if ( get_theme_mod( 'title_heading', 'full' ) == 'full' ) {
			$icons[ 'woo_cart' ]	 = esc_attr__( 'WooCommerce Cart', 'futurio-extra' );
			$icons[ 'woo_account' ]	 = esc_attr__( 'WooCommerce Account', 'futurio-extra' );
		}
	}

	return $icons;
}

Kirki::add_field( 'futurio_extra', array(
	'type'				 => 'sortable',
	'settings'			 => 'header_layout',
	'label'				 => __( 'Header Layout', 'futurio-extra' ),
	'description'		 => __( 'Custom color customizations are available in <a href="https://futuriowp.com/futurio-pro/#pro-features" target="_blank" rel="noopener">Futurio PRO</a>', 'futurio-extra' ),
	'section'			 => 'header_section',
	'priority'			 => 9,
	'default'			 => in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ? array( 'heading', 'search', 'woo_account', 'woo_cart' ) : array( 'heading', 'search' ),
	'choices'			 => futurio_extra_header_styling(),
	'active_callback'	 => array(
		array(
			'setting'	 => 'title_heading',
			'operator'	 => '==',
			'value'		 => 'full',
		),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'				 => 'slider',
	'settings'			 => 'header_search_widget_area_width',
	'label'				 => esc_attr__( 'Search & Widget area width', 'futurio-extra' ),
	'section'			 => 'header_section',
	'transport'			 => 'auto',
	'default'			 => 40,
	'priority'			 => 12,
	'choices'			 => array(
		'min'	 => 0,
		'max'	 => 100,
		'step'	 => 1,
	),
	'output'			 => array(
		array(
			'media_query'	 => '@media (min-width: 768px)',
			'element'		 => '.header-widget-area',
			'property'		 => 'width',
			'units'			 => '%',
		),
	),
	'active_callback'	 => array(
		array(
			'setting'	 => 'title_heading',
			'operator'	 => '==',
			'value'		 => 'full',
		),
		array(
			'setting'	 => 'header_layout',
			'operator'	 => 'in',
			'value'		 => 'search',
		),
	),
) );
