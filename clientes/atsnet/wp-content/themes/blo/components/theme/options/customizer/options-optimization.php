<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: Optimization
 */


$options = [
    'optimization_setting' => [
        'title' => esc_html__('Optimization settings', 'blo'),

        'options' => [
            'dashicons_off' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Load Dashicons', 'vinkmag' ),
                'value'           => 'no',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__('Yes', 'vinkmag'),
                ],
                'right-choice'	 => [
                'value'	 => 'no',
                'label'	 => esc_html__('No', 'vinkmag'),
                ],
            ],
            'elementor_icons_off' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Load Elementor Icons', 'vinkmag' ),
                'value'           => 'no',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__('Yes', 'vinkmag'),
                ],
                'right-choice'	 => [
                'value'	 => 'no',
                'label'	 => esc_html__('No', 'vinkmag'),
                ],
            ],
            'wp_block_library_off' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Load Wp Block Library', 'vinkmag' ),
                'value'           => 'no',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__('Yes', 'vinkmag'),
                ],
                'right-choice'	 => [
                'value'	 => 'no',
                'label'	 => esc_html__('No', 'vinkmag'),
                ],
            ],
            'fontawesome_off' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Load FontAwesome', 'vinkmag' ),
                'value'           => 'no',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__('Yes', 'vinkmag'),
                ],
                'right-choice'	 => [
                'value'	 => 'no',
                'label'	 => esc_html__('No', 'vinkmag'),
                ],
            ],
            'woocommerce_css' => [
                'type'			   => 'switch',
                'label'			   => esc_html__( 'Load Woocommerce CSS', 'vinkmag' ),
                'value'           => 'no',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__('Yes', 'vinkmag'),
                ],
                'right-choice'	 => [
                'value'	 => 'no',
                'label'	 => esc_html__('No', 'vinkmag'),
                ],
            ],
        ],
    ],
];