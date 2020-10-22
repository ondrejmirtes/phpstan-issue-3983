<?php
/**
 * SitePress Template functions
 *
 * @package wpml-core
 */

/**
 * Wrapper for `parse_url` using `wp_parse_url`
 *
 * @param     $url
 * @param int $component
 *
 * @return array|string|int|null
 */
function wpml_parse_url( $url, $component = -1 ) {
	$ret = null;

	$component_map = array(
		PHP_URL_SCHEME   => 'scheme',
		PHP_URL_HOST     => 'host',
		PHP_URL_PORT     => 'port',
		PHP_URL_USER     => 'user',
		PHP_URL_PASS     => 'pass',
		PHP_URL_PATH     => 'path',
		PHP_URL_QUERY    => 'query',
		PHP_URL_FRAGMENT => 'fragment',
	);

	if ( $component === -1 ) {
		$ret = wp_parse_url( $url );
	} else if ( isset( $component_map[ $component ] ) ) {
		$key    = $component_map[ $component ];
		$parsed = wp_parse_url( $url );
		$ret    = isset( $parsed[ $key ] ) ? $parsed[ $key ] : null;
	}

	return $ret;
}
