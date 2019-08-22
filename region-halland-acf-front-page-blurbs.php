<?php

	/**
	 * @package Region Halland ACF Front Page Blurbs
	 */
	/*
	Plugin Name: Region Halland ACF Front Page Blurbs
	Description: Front-page-plugin för ACF-blurbar på sajtens front-page
	Version: 1.1.0
	Author: Roland Hydén
	License: GPL-3.0
	Text Domain: regionhalland
	*/

	// Anropa funktion om ACF är installerad & aktiverad
	add_action('acf/init', 'my_acf_add_front_page_blurbs_field_groups');

	// Lägg till formulär så att det går att skapa länkar
	function my_acf_add_front_page_blurbs_field_groups() {

		if (function_exists('acf_add_local_field_group')) {
		    acf_add_local_field_group(array(
		    'key' => 'group_1000252',
		    'title' => __('Startsida', 'halland'),
		    'fields' => array(
		        0 => array(
		            'key' => 'field_1000253',
		            'label' => __('Puffar', 'halland'),
		            'name' => 'name_1000254',
		            'type' => 'repeater',
		            'instructions' => __('Klicka på "Lägg till rad" för att lägga till en länk. Maximalt 4 stycken.', 'halland'),
		            'required' => 0,
		            'conditional_logic' => 0,
		            'wrapper' => array(
		                'width' => '',
		                'class' => '',
		                'id' => '',
		            ),
		            'collapsed' => '',
		            'min' => 0,
		            'max' => 4,
		            'layout' => 'block',
		            'button_label' => '',
		            'sub_fields' => array(
		                0 => array(
		                    'key' => 'field_1000255',
		                    'label' => __('Länk', 'regionhalland'),
		                    'name' => 'name_1000256',
		                    'type' => 'link',
		                    'instructions' => __('Länka till valfri sida eller webbplats.', 'regionhalland'),
		                    'required' => 0,
		                    'conditional_logic' => 0,
		                    'wrapper' => array(
		                        'width' => '',
		                        'class' => '',
		                        'id' => '',
		                    ),
		                    'return_format' => 'array',
		                ),
		                1 => array(
		                    'key' => 'field_1000257',
						    'label' => 'Text',
						    'name' => 'name_1000258',
						    'type' => 'textarea',
						    'instructions' => 'Kort text (max 200 tecken)',
						    'required' => 0,
						    'conditional_logic' => 0,
						    'wrapper' => [
						        'width' => '',
						        'class' => '',
						        'id' => '',
						    ],
						    'default_value' => '',
						    'placeholder' => '',
						    'maxlength' => '200',
						    'rows' => '2',
						    'new_lines' => '',
		                ),
				        2 => array(
				        	'key' => 'field_1000259',
						    'label' => 'Illustrativ bild',
						    'name' => 'name_1000260',
						    'type' => 'image',
						    'instructions' => '',
						    'required' => 0,
						    'conditional_logic' => 0,
						    'wrapper' => [
						        'width' => '',
						        'class' => '',
						        'id' => '',
						    ],
						    'return_format' => 'array',
						    'preview_size' => 'thumbnail',
						    'library' => 'all',
						    'min_width' => '',
						    'min_height' => '',
						    'min_size' => '',
						    'max_width' => '',
						    'max_height' => '',
						    'max_size' => '',
						    'mime_types' => '',
				        ),
		            ),
		        ),
		    ),
		    'location' => array(
		        0 => array(
		            0 => array(
		                'param' => 'page_type',
		                'operator' => '==',
		                'value' => 'front_page',
		            ),
		        ),
		    ),
		    'menu_order' => 0,
		    'position' => 'normal',
		    'style' => 'default',
		    'label_placement' => 'top',
		    'instruction_placement' => 'label',
		    'hide_on_screen' => '',
		    'active' => 1,
		    'description' => 'Används för att skapa innehåll specifikt för startsidan.',
		));
		}

	}

	// Returnera inlagda länkar
	function get_region_halland_acf_front_page_blurbs() {
		
		// Hämta id för front-page
		$myFrontPageID = get_option('page_on_front');
		
		// Hämta alla inlagda länkar
		$myBlurbs = get_field('name_1000254', $myFrontPageID);

		// Skapa array med länkar
        $myData = array();
        
        // Loopa igenom allt 
        foreach ($myBlurbs as $blurbs) {
	        
        	// Länkar
	        $strLinkUrl	= $blurbs['name_1000256']['url'];
	        $strLinkTitle = $blurbs['name_1000256']['title'];
	        $strLinkTarget = $blurbs['name_1000256']['target'];
	        
	        // Text
	        $strText = $blurbs['name_1000258'];
	        
	        // Bild
	        $strImageUrl = $blurbs['name_1000260']['url'];
	        $strImageAlt = $blurbs['name_1000260']['alt'];
	        $strImageWidth = $blurbs['name_1000260']['width'];
	        $strImageHeight = $blurbs['name_1000260']['height'];
	        
	        // Pusha tillbaka till arrayen $myData
	        array_push($myData, array(
	           'link_url' => $strLinkUrl,
	           'link_title' => $strLinkTitle,
	           'link_target' => $strLinkTarget,
	           'text_content' => $strText,
	           'image_url' => $strImageUrl,
	           'image_alt' => $strImageAlt,
	           'image_width' => $strImageWidth,
	           'image_height' => $strImageHeight
	        ));
        }
        
        // Returnera länkar
		return $myData;
	}

	// Metod som anropas när pluginen aktiveras
	function region_halland_acf_front_page_blurbs_activate() {
		// Ingenting just nu...
	}

	// Metod som anropas när pluginen av-aktiveras
	function region_halland_acf_front_page_blurbs_deactivate() {
		// Ingenting just nu...
	}

	// Aktivera pluginen och anropa metod
	register_activation_hook( __FILE__, 'region_halland_acf_front_page_blurbs_activate');

	// Av-aktivera pluginen och anropa metod
	register_deactivation_hook( __FILE__, 'region_halland_acf_front_page_blurbs_deactivate');

?>