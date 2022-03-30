<?php

require 'make-phar.php';

use Symfony\Component\Finder\Finder;

$finder = new Finder();
$finder
	->files()
	->ignoreVCS( true )
	->name( '/\.*.php8?/' )
	->in( WP_CLI_VENDOR_DIR . '/angelocali' )
	->notName( 'behat-tags.php' )
	->notPath( '#(?:[^/]+-command|php-cli-tools)/vendor/#' ) // For running locally, in case have composer installed or symlinked them.
	->exclude( 'config' )
	->exclude( 'debug' )
	->exclude( 'dependency-injection' )
	->exclude( 'event-dispatcher' )
	->exclude( 'translation' )
	->exclude( 'yaml' )
	->exclude( 'examples' )
	->exclude( 'features' )
	->exclude( 'test' )
	->exclude( 'tests' )
	->exclude( 'Test' )
	->exclude( 'Tests' );

foreach ( $finder as $file ) {
	add_file( $phar, $file );
}

if ( ! BE_QUIET ) {
	echo "Added Custom Commands\n";
}