<?php
/**
 * Page about
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

?>
<div class="wrap about-wrap">
	<h1><?php esc_html_e( 'Welcome at Pronamic iDEAL', 'pronamic_ideal' ); ?></h1>

	<div class="about-text">
		<?php esc_html_e( 'Thanks for installing Pronamic iDEAL. Version 3.7.0 is more powerful, stable and secure than ever before. We hope you enjoy using it.', 'pronamic_ideal' ); ?>
	</div>

	<div class="wp-badge pronamic-pay-badge">Versie: 3.7.0</div>

	<h2 class="nav-tab-wrapper">
		<?php

		$tabs = array(
			'new'             => __( 'What is new', 'pronamic_ideal' ),
			'getting-started' => __( 'Getting started', 'pronamic_ideal' ),
		);

		$current_tab = filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_STRING );
		$current_tab = empty( $current_tab ) ? key( $tabs ) : $current_tab;

		foreach ( $tabs as $tab => $title ) {
			$classes = array( 'nav-tab' );

			if ( $current_tab === $tab ) {
				$classes[] = 'nav-tab-active';
			}

			$url = add_query_arg( 'tab', $tab );

			printf(
				'<a class="nav-tab %s" href="%s">%s</a>',
				esc_attr( implode( ' ', $classes ) ),
				esc_attr( $url ),
				$title
			);
		}

		?>
	</h2>

	<?php

	$file = plugin_dir_path( Pronamic_WP_Pay_Plugin::$file ) . 'admin/tab-' . $current_tab . '.php';

	if ( is_readable( $file ) ) {
		include $file;
	}

	?>

	<div class="return-to-dashboard">
		<a href="http://wp-pay.dev/wp-admin/">Ga naar Dashboard → Home</a>
	</div>
</div>
