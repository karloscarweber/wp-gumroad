<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Function to have a normal Gumroad link
 *
 * @since 1.2.3
 *
 */
function gum_link( $args ) {
	$url = 'https://gum.co/' . $args['id'];
	$wanted = '';
	$button = '';

	if ($args['wanted'] == 'true') {
		$url = $url . '?wanted=true';
	}

	if( $args['button'] == 'true' ) {
		$button = 'gumroad-button';
	}

	return '<a href="#" target="_blank" onclick="window.open(\'' . $url . $wanted . '\', \'_blank\')" ' . 'class="' . $button . ' ' . esc_attr($args['class']) . '">' . esc_html($args['text']) . '</a>';
}

/**
 * Function to have a normal Gumroad link
 *
 * @since 1.2.3
 *
 */
function gum_overlay( $args ) {
	$url = 'https://gum.co/' . $args['id'];
	$wanted = '';
	$button = '';

	if ($args['wanted'] == 'true') {
		$url = $url . '?wanted=true';
	}

	if( $args['button'] == 'true' ) {
		$button = 'gumroad-button';
	}

	return '<a href="' . $url . $wanted . '" class="' . $button . ' ' . esc_attr($args['class']) . '">' . esc_html($args['text']) . '</a>';
}

/**
 * Function to display the Gumroad "embed" in a page
 *
 * @since 1.1.0
 *
 */
function gum_embed( $id ) {
	return sprintf( '<div class="gumroad-product-embed" data-gumroad-product-id="%s"></div>', esc_attr( $id ) );
}

/**
 * Function to load the correct JS based on the shortcode type
 * This function is only called from the shortcode function so that we know the JS is only being loaded on pages where it is needed
 *
 *
 * @since 1.1.0
 */
function gum_load_js( $type ) {
	if( $type == 'embed' ) {
		// Enqueue Gumroad 'embed' JS. Don't set a version.
		wp_enqueue_script( GUM_PLUGIN_SLUG . '-embed-script', 'https://gumroad.com/js/gumroad-embed.js', array(), null, false );
	} else if ( $type == 'overlay' ) {
		// Enqueue Gumroad 'overlay' JS. Don't set a version.
		wp_enqueue_script( GUM_PLUGIN_SLUG . '-overlay-script', 'https://gumroad.com/js/gumroad.js', array(), null, false );
	}
}
