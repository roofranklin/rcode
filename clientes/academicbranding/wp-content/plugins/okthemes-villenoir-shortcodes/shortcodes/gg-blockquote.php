<?php
if ( ! class_exists( 'WPBakeryShortCode_gg_blockquote' ) ) {
	
	class WPBakeryShortCode_gg_blockquote extends WPBakeryShortCode {

		public function __construct() {  
			add_shortcode('blockquote', array($this, 'gg_blockquote'));  
		}

		public function gg_blockquote( $atts, $content = null ) { 

			$output = $quote = $quote_color_style = $author_color_style = $quote_color = '';
			extract(shortcode_atts(array(
					'quote'       => '',
					'quote_color' => '',
                    'author'       => '',
                    'author_color' => '',
					'css'         => ''
			), $atts));

			if ($quote_color != '') {
				$quote_color_style = 'style="color: '.$quote_color.';"';
			}
            if ($author_color != '') {
                $author_color_style = 'style="color: '.$author_color.';"';
            }

			$output .= "\n\t".'<blockquote '.$quote_color_style.' class="gg-vc-quote ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '">';
			$output .= "\n\t".$quote;
            if ($author) {
                $output .= "\n\t".'<cite>'.$author.'</cite>';    
            }
			$output .= "\n\t".'</blockquote>';

			return $output;
		}
		
	}// END class WPBakeryShortCode_gg_blockquote

	$WPBakeryShortCode_gg_blockquote = new WPBakeryShortCode_gg_blockquote();

}// END if ( ! class_exists( 'WPBakeryShortCode_gg_blockquote' ) ) {


if ( function_exists( 'vc_map' ) ) {

	vc_map( array(
        "name"              => esc_html__("Blockquote", "okthemes-villenoir-shortcodes"),
        "description"       => esc_html__('Display a blockquote.', 'okthemes-villenoir-shortcodes'),
        "base"              => "blockquote",
        "icon"              => "gg_vc_icon",
        'admin_enqueue_css' => array(VILLENOIR_SHORTCODES_DIR . '/shortcodes/css/styles.css'),
        'admin_enqueue_js'  => array(VILLENOIR_SHORTCODES_DIR . '/shortcodes/js/custom-vc.js'),
        "category"          => esc_html__('Villenoir', 'okthemes-villenoir-shortcodes'),
		"params" => array(
			array(
                "type"        => "textarea",
                "heading"     => esc_html__("Quote", "okthemes-villenoir-shortcodes"),
                "param_name"  => "quote",
                "admin_label" => true,
			),
			array(
                "type"       => "colorpicker",
                "heading"    => esc_html__("Quote color", "okthemes-villenoir-shortcodes"),
                "param_name" => "quote_color"
			),
            array(
                "type"        => "textfield",
                "heading"     => esc_html__("Author", "okthemes-villenoir-shortcodes"),
                "param_name"  => "author",
                "admin_label" => true,
            ),
            array(
                "type"        => "colorpicker",
                "heading"     => esc_html__("Author color", "okthemes-villenoir-shortcodes"),
                "param_name"  => "author_color",
            ),
			array(
                'type'       => 'css_editor',
                'heading'    => __( 'CSS box', 'okthemes-villenoir-shortcodes' ),
                'param_name' => 'css',
                'group'      => __( 'Design Options', 'okthemes-villenoir-shortcodes' ),
			)
		 ),
	) );
}

?>