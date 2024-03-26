<?php

/**
 * Starter Register Demos
 */
if ( !function_exists( 'sydney_atss_demos_list') ) {
	function sydney_atss_demos_list() {

		$customizer_file = 'customizer.dat'; 
		
		$is_pro = defined( 'SYDNEY_PRO_VERSION' ) ? true : false;
		
		if ( $is_pro ) {
			$customizer_file = 'customizer-pro.dat';
		}

		$plugins = array();

		if ( ! function_exists( 'wpcf_init' ) ) {
			$plugins[] = array(
				'name'     => 'Sydney Toolbox',
				'slug'     => 'sydney-toolbox',
				'path'     => 'sydney-toolbox/sydney-toolbox.php',
				'required' => false,
			);
		}

		$demos = array(
			'main-pro' => array(
				'name'       => esc_html__( 'Agency', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business', 'portfolio' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-main/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/main-pro/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'color_scheme' => array( '#1D3F3A', '#56716C', '#102226', '#102226', '#737C8C', '#00102E', '#EFF9F5', '#dbdbdb', '#ffffff' ),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/main-pro/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/main-pro/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/main-pro/' . $customizer_file
					),
				),
			),
			'main-free' => array(
				'name'       => esc_html__( 'Agency (free)', 'sydney' ),
				'type'       => 'free',
				'categories' => array( 'business', 'portfolio' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sydney-main/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/main-free/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'color_scheme' => array( '#ffd00a', '#FBDC56', '#142E2C', '#00102E', '#737C8C', '#00102E', '#F4F5F7', '#dbdbdb', '#ffffff' ),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/main-free/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/main-free/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/main-free/' . $customizer_file
					)
				),
			),						
			'fashion'     => array(
				'name'       => esc_html__( 'Fashion Shop', 'sydney' ),
				'type'       => 'free',
				'categories' => array( 'ecommerce' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sydney-fashion/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/fashion/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WooCommerce',
							'slug'     => 'woocommerce',
							'path'     => 'woocommerce/woocommerce.php',
							'required' => true,
						),
						array(
							'name'     => 'Merchant',
							'slug'     => 'merchant',
							'path'     => 'merchant/merchant.php',
							'required' => false,
						),
					),
					$plugins
				),
				'color_scheme' => array( '#ab000d', '#6C0008', '#00102E', '#00102E', '#737C8C', '#EDEDED', '#F7F7F7', '#dbdbdb', '#ffffff' ),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/fashion/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/fashion/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/fashion/' . $customizer_file
					),
				),
			),
			'plumber'     => array(
				'name'       => esc_html__( 'Plumber', 'sydney' ),
				'type'       => 'free',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-plumber/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/plumber/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(		
						'content'    => 'https://athemes.com/themes-demo-content/sydney/plumber/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/plumber/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/plumber/' . $customizer_file
					),
				),
			),
			'photography'     => array(
				'name'       => esc_html__( 'Photography', 'sydney' ),
				'type'       => 'free',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sydney-photography/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/photography/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/photography/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/photography/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/photography/' . $customizer_file
					),
				),
			),	
			'crypto'   => array(
				'name'       => esc_html__( 'Cryptocurrency', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-crypto/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/crypto/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/crypto/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/crypto/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/crypto/customizer.dat'
					),
				),
			),
			'saas'   => array(
				'name'       => esc_html__( 'SaaS (requires Elementor Containers)', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-saas/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/saas/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/saas/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/saas/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/saas/customizer.dat',
					),
				),
			),
			'charity'   => array(
				'name'       => esc_html__( 'Charity (requires Elementor Containers)', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-charity/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/charity/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array( 
						'content'    => 'https://athemes.com/themes-demo-content/sydney/charity/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/charity/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/charity/customizer.dat',
					),
				),
			),
			'hotel'   => array(
				'name'       => esc_html__( 'Hotel', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-hotel/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/hotel/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array( 
						'content'    => 'https://athemes.com/themes-demo-content/sydney/hotel/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/hotel/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/hotel/customizer.dat',
					),
				),
			),
			'wedding-planner'   => array(
				'name'       => esc_html__( 'Wedding Planner', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-wedding-planner/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/wedding-planner/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array( 
						'content'    => 'https://athemes.com/themes-demo-content/sydney/wedding-planner/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/wedding-planner/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/wedding-planner/customizer.dat',
					),
				),
			),
			'news'   => array(
				'name'       => esc_html__( 'News (requires Elementor Containers)', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'blog', 'magazine' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-news/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/news/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array( 
						'content'    => 'https://athemes.com/themes-demo-content/sydney/news/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/news/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/news/customizer.dat',
					),
				),
			),
			'construction'   => array(
				'name'       => esc_html__( 'Construction', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/construction/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/construction/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/construction/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/construction/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/construction/customizer.dat',
					),
				),
			),
			'cafe'   => array(
				'name'       => esc_html__( 'Cafe', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/cafe/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/cafe/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WooCommerce',
							'slug'     => 'woocommerce',
							'path'     => 'woocommerce/woocommerce.php',
							'required' => true,
						),
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array( 
						'content'    => 'https://athemes.com/themes-demo-content/sydney/cafe/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/cafe/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/cafe/customizer.dat',
					)
				),
			),	
			'original'   => array(
				'name'       => esc_html__( 'Original', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business', 'portfolio' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sydney-pro/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/original/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WooCommerce',
							'slug'     => 'woocommerce',
							'path'     => 'woocommerce/woocommerce.php',
							'required' => false,
						),
						array(
							'name'     => 'Smart Slider',
							'slug'     => 'smart-slider-3',
							'path'     => 'smart-slider-3/smart-slider-3.php',
							'required' => false,
						),		
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						),
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/original/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/original/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/original/customizer.dat',
					)
				),
			),			
			'finance'    => array(
				'name'       => esc_html__( 'Finance', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-finance/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/finance/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/finance/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/finance/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/finance/customizer.dat',
					)
				),
			),
			'gardening'    => array(
				'name'       => esc_html__( 'Gardening', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/gardening/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/gardening/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array( 
						'content'    => 'https://athemes.com/themes-demo-content/sydney/gardening/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/gardening/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/gardening/customizer.dat',
					),
				),
			),
			'leads'    => array(
				'name'       => esc_html__( 'Lead Generation', 'sydney' ),
				'type'       => 'free',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sydney-leads/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/leads/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						),
						array(
							'name'     => 'Hubspot',
							'slug'     => 'leadin',
							'path'     => 'leadin/leadin.php',
							'required' => false
						)					
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array( 
						'content'    => 'https://athemes.com/themes-demo-content/sydney/leads/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/leads/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/leads/customizer.dat',
					),
				),
			),	
			'learndash-lms'    => array(
				'name'       => esc_html__( 'eLearning (LearnDash)', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sydney-lms-learndash/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/lms/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						),									
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array( 
						'content'    => 'https://athemes.com/themes-demo-content/sydney/learndash-lms/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/learndash-lms/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/learndash-lms/customizer.dat',
					),
				),
			),	
			'tutor-lms'    => array(
				'name'       => esc_html__( 'eLearning (Tutor)', 'sydney' ),
				'type'       => 'free',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sydney-lms/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/lms/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						),
						array(
							'name'     => 'Tutor',
							'slug'     => 'tutor',
							'path'     => 'tutor/tutor.php',
							'required' => false
						),
						array(
							'name'     => 'Tutor Elementor Addons',
							'slug'     => 'tutor-lms-elementor-addons',
							'path'     => 'tutor-lms-elementor-addons/tutor-lms-elementor-addons.php',
							'required' => false
						)										
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array( 
						'content'    => 'https://athemes.com/themes-demo-content/sydney/lms/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/lms/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/lms/customizer.dat',
					),
				),
			),				
			'blogpro'   => array(
				'name'       => esc_html__( 'Blog', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'blog' ),
				'builders'   => array(
					'gutenberg',
				),
				'preview'    => 'https://demo.athemes.com/sp-blog/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/blogpro/thumb.jpg',
				'import'     => array(
					'gutenberg'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/blogpro/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/blogpro/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/blogpro/customizer.dat',
					),
				),
			),
			'podcast'    => array(
				'name'       => esc_html__( 'Podcast', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/podcast/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/podcast/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/podcast/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/podcast/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/podcast/customizer.dat',
					),
				),
			),
			'restaurant' => array(
				'name'       => esc_html__( 'Restaurant (requires Elementor Containers)', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business', 'ecommerce' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp--restaurant/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/restaurant/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor' => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/restaurant/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/restaurant/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/restaurant/customizer.dat',
					),
				),
			),
			'yoga'       => array(
				'name'       => esc_html__( 'Yoga', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-yoga/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/yoga/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor' => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/yoga/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/yoga/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/yoga/customizer.dat',
					),
				),
			),
			'business'   => array(
				'name'       => esc_html__( 'Business', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-business/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/business/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor' => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/business/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/business/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/business/customizer.dat',
					),
				),
			),
			'coworking'  => array(
				'name'       => esc_html__( 'Coworking', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'business' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp--coworking/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/coworking-new/thumb.jpg',
				'import'     => array(
					'elementor' => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/coworking-new/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/coworking-new/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/coworking-new/customizer.dat',
					),
				),
			),
			'wedding'    => array(
				'name'       => esc_html__( 'Wedding', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'event'),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-wedding/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/wedding/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor' => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/wedding/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/wedding/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/wedding/customizer.dat',
					),
				),
			),
			'resume'     => array(
				'name'       => esc_html__( 'Resume', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'portfolio' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/sp-resume/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/resume/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/resume/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/resume/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/resume/customizer.dat',
					),
				),
			),	
			'author'       => array(
				'name'       => esc_html__( 'Author', 'sydney' ),
				'type'       => 'pro',
				'categories' => array( 'portfolio', 'ecommerce' ),
				'builders'   => array(
					'elementor',
				),
				'preview'    => 'https://demo.athemes.com/author/',
				'thumbnail'  => 'https://athemes.com/themes-demo-content/sydney/author/thumb.jpg',
				'plugins'    => array_merge(
					array(
						array(
							'name'     => 'WooCommerce',
							'slug'     => 'woocommerce',
							'path'     => 'woocommerce/woocommerce.php',
							'required' => false,
						),
						array(
							'name'     => 'WPForms',
							'slug'     => 'wpforms-lite',
							'path'     => 'wpforms-lite/wpforms.php',
							'required' => false
						)
					),
					$plugins
				),
				'import'     => array(
					'elementor'    => array(
						'content'    => 'https://athemes.com/themes-demo-content/sydney/author/content.xml',
						'widgets'    => 'https://athemes.com/themes-demo-content/sydney/author/widgets.wie',
						'customizer' => 'https://athemes.com/themes-demo-content/sydney/author/customizer.dat',
					),
				),
			),			
		);

		//Move the main free demo to the first position if the pro version is not active.
		if ( ! defined( 'SYDNEY_PRO_VERSION' ) ) {
			$free_demo = $demos['main-free'];
			unset( $demos['main-free'] );
			$demos = array_merge( array( 'main-free' => $free_demo ), $demos );
		}

		return $demos;
	}
}
add_filter( 'atss_register_demos_list', 'sydney_atss_demos_list' );

/**
 * Define actions that happen before import
 */
function sydney_atss_setup_before_import( $demo_id ) {

	$all_modules = get_option( 'sydney-modules' );
	$all_modules = ( is_array( $all_modules ) ) ? $all_modules : (array) $all_modules;

	//Enable demo-specific modules
	if ( 'news' === $demo_id ) {
		update_option( 'sydney-modules', array_merge( $all_modules, array( 'ext-blog' => true, 'templates' => true, 'page-headers' => true ) ) );
	} elseif ( 'restaurant' === $demo_id ) {
		update_option( 'sydney-modules', array_merge( $all_modules, array( 'templates' => true ) ) );
	} elseif ( 'charity' === $demo_id ) {
		update_option( 'sydney-modules', array_merge( $all_modules, array( 'templates' => true ) ) );
	} elseif ( 'saas' === $demo_id ) {
		update_option( 'sydney-modules', array_merge( $all_modules, array( 'templates' => true ) ) );
	}
}
add_action( 'atss_import_start', 'sydney_atss_setup_before_import' );

/**
 * Define actions that happen after import
 */
function sydney_atss_setup_after_import( $demo_id ) {

	// Assign the menu.
	$main_menu = get_term_by( 'name', 'Menu 1', 'nav_menu' );
	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary' => $main_menu->term_id,
		)
	);

	if ( 'blogpro' === $demo_id ) {
		$all_modules = get_option( 'sydney-modules' );
		$all_modules = ( is_array( $all_modules ) ) ? $all_modules : (array) $all_modules;

		update_option( 'sydney-modules', array_merge( $all_modules, array( 'ext-blog' => true, 'breadcrumbs' => true ) ) );

		$main_menu = get_term_by( 'name', 'Main', 'nav_menu' );
		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary' => $main_menu->term_id,
			)
		);
	}	

	if ( 'hotel' === $demo_id ) {
		$all_modules = get_option( 'sydney-modules' );
		$all_modules = ( is_array( $all_modules ) ) ? $all_modules : (array) $all_modules;

		update_option( 'sydney-modules', array_merge( $all_modules, array( 'templates' => true ) ) );

		$template_builder_data = array(
			array(
				'id'                => 'global',
				'footer'            => '192',
				'footer_builder'    => 'elementor',
			)		
		);
		
		update_option('sydney_template_builder_data', $template_builder_data);
	}

	if ( 'fashion' === $demo_id ) {
		$merchant_modules = get_option( 'merchant-modules' );
		$merchant_modules = ( is_array( $merchant_modules ) ) ? $merchant_modules : (array) $merchant_modules;

		update_option( 'merchant-modules', array_merge( $merchant_modules, array( 'quick-view' => true, 'inactive-tab-message' => true ) ) );
	}

	// Asign the static front page and the blog page.
	$front_page = ATSS_Core_Helpers::atss_get_page_by_title( 'My front page' ) != NULL ? ATSS_Core_Helpers::atss_get_page_by_title( 'My front page' ) : ATSS_Core_Helpers::atss_get_page_by_title( 'Home' );
	$blog_page  = ATSS_Core_Helpers::atss_get_page_by_title( 'My blog page' ) != NULL ? ATSS_Core_Helpers::atss_get_page_by_title( 'My blog page' ) : ATSS_Core_Helpers::atss_get_page_by_title( 'Blog' );

	if ( !empty( $front_page ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page->ID );
	}
	if ( !empty( $blog_page ) ) {
		update_option( 'page_for_posts', $blog_page->ID );
	}

	// Assign the Front Page template.
	update_post_meta( $front_page->ID, '_wp_page_template', 'page-templates/page_front-page.php' );

	if ( class_exists( 'SmartSlider3', false ) ) {
		SmartSlider3::import( get_template_directory() . '/demo-content/demo-slider.ss3' );
	}

	// Assign woocommerce pages in some demos
	if( class_exists( 'Woocommerce' ) ) {
		switch ( $demo_id ) {
			case 'author':
				$shop_page = ATSS_Core_Helpers::atss_get_page_by_title( 'Books' );
				update_option( 'woocommerce_shop_page_id', $shop_page->ID );

				break;
			
		}
	}

	atss()->current_starter( 'sydney', $demo_id );
	
	//Custom import settings
	$custom_import_settings = get_transient('atss_custom_import_settings');
	
	$custom_colors = $custom_import_settings['color_scheme'];
	
	$i = 1;
	foreach ($custom_colors as $custom_color) {
		set_theme_mod('global_color_' . $i, $custom_color);

		$i++;
	}
	
	if (isset($custom_import_settings['custom_logo']) && '' !== $custom_import_settings['custom_logo'] ) {
		set_theme_mod('site_logo', $custom_import_settings['custom_logo']);
	}

	if (isset($custom_import_settings['custom_favicon']) && '' !== $custom_import_settings['custom_favicon'] ) {
		update_option('site_icon', attachment_url_to_postid( $custom_import_settings['custom_favicon'] ) );
	}	
	

}
add_action( 'atss_finish_import', 'sydney_atss_setup_after_import' );

/*
* Color scheme tooltips
*/
function sydney_atss_color_scheme_tooltips() {
	$tooltips = array(
		'global_color_1' => esc_html__( 'Global color 1: primary color, used for accents, buttons, etc.', 'athemes-starter-sites' ),
		'global_color_2' => esc_html__( 'Global color 2: hover color', 'athemes-starter-sites' ),
		'global_color_3' => esc_html__( 'Global color 3: body text color', 'athemes-starter-sites' ),
		'global_color_4' => esc_html__( 'Global color 4: general headings color', 'athemes-starter-sites' ),
		'global_color_5' => esc_html__( 'Global color 5: used for smaller text, like post meta', 'athemes-starter-sites' ),
		'global_color_6' => esc_html__( 'Global color 6: dark backgrounds, like the header & footer', 'athemes-starter-sites' ),
		'global_color_7' => esc_html__( 'Global color 7: light backgrounds', 'athemes-starter-sites' ),
		'global_color_8' => esc_html__( 'Global color 8: border color', 'athemes-starter-sites' ),
		'global_color_9' => esc_html__( 'Global color 9: site background color', 'athemes-starter-sites' ),
	);

	return $tooltips;
}
add_filter( 'atss_register_customize_tooltips', 'sydney_atss_color_scheme_tooltips' );