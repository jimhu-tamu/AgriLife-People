<?php

class ALP_Assets {

	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

	}

	public function register_styles() {

		wp_register_style(
			'people_stylesheet',
			PEOPLE_PLUGIN_DIR_URL . '/css/style.css',
			array(),
			'',
			'all'
		);

	}

	public function enqueue_styles() {

		wp_enqueue_style( 'people_stylesheet' );

	}

}