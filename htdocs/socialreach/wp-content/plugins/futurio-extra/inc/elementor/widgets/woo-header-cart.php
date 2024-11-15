<?php
if ( !class_exists( 'WooCommerce' ) ) {
	return;
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class Futurio_Extra_Woo_Header_Cart extends Widget_Base {

	public function get_name() {
		return 'woo-header-cart';
	}

	public function get_title() {
		return __( 'WooCommerce Header Cart', 'futurio-extra' );
	}

	public function get_icon() {
		return 'eicon-cart-light';
	}

	public function get_categories() {
		return [ 'woocommerce' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
		'section_style_text', [
			'label'	 => __( 'Colors', 'futurio-extra' ),
			'tab'	 => Controls_Manager::TAB_STYLE,
		]
		);

		$this->add_control(
		'icon_color', [
			'label'		 => __( 'Icon Color', 'futurio-extra' ),
			'type'		 => Controls_Manager::COLOR,
			'selectors'	 => [
				'{{WRAPPER}} .header-cart a.cart-contents i.fa' => 'color: {{VALUE}}',
			],
		]
		);

		$this->add_control(
		'counter_bg_color', [
			'label'		 => __( 'Counter background', 'futurio-extra' ),
			'type'		 => Controls_Manager::COLOR,
			'selectors'	 => [
				'{{WRAPPER}} .cart-contents span.count' => 'background-color: {{VALUE}}',
			],
		]
		);

		$this->add_control(
		'counter_color', [
			'label'		 => __( 'Counter number color', 'futurio-extra' ),
			'type'		 => Controls_Manager::COLOR,
			'selectors'	 => [
				'{{WRAPPER}} .cart-contents span.count' => 'color: {{VALUE}}',
			],
		]
		);

		$this->add_responsive_control(
		'alignment', [
			'label'			 => __( 'Alignment', 'futurio-extra' ),
			'type'			 => Controls_Manager::CHOOSE,
			'label_block'	 => false,
			'options'		 => [
				'left'	 => [
					'title'	 => __( 'Left', 'futurio-extra' ),
					'icon'	 => 'fa fa-align-left',
				],
				'center' => [
					'title'	 => __( 'Center', 'futurio-extra' ),
					'icon'	 => 'fa fa-align-center',
				],
				'right'	 => [
					'title'	 => __( 'Right', 'futurio-extra' ),
					'icon'	 => 'fa fa-align-right',
				],
			],
			'default'		 => 'center',
			'separator'		 => 'before',
			'selectors'		 => [
				'{{WRAPPER}} .elementor-menu-cart' => 'text-align: {{VALUE}}',
			],
		]
		);

		$this->end_controls_section();
	}

	protected function render() {

		if ( class_exists( 'WooCommerce' ) ) {
			?>
			<div class="elementor-menu-cart" >
				<div class="header-cart">
					<div class="header-cart-block">
						<div class="header-cart-inner">
							<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'futurio-extra' ); ?>">
								<i class="fa fa-<?php echo esc_html( get_theme_mod( 'header_cart_icon', 'shopping-bag' ) ) ?>"><span class="count"><?php echo is_object( WC()->cart ) ? wp_kses_data( WC()->cart->get_cart_contents_count() ) : ''; ?></span></i>
							</a>
							<ul class="site-header-cart menu list-unstyled text-center hidden-xs">
								<li>
									<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>	
			<?php
		}
	}

	protected function content_template() {
		
	}

}
