rm -rf wp-cli-bundle
composer create-project wp-cli/wp-cli-bundle
cp make-custom-phar.php wp-cli-bundle/utils/make-custom-phar.php
cd wp-cli-bundle
composer require "angelocali/hello-command"
CLI_VERSION=$(head -n 1 vendor/wp-cli/wp-cli/VERSION)
php -dphar.readonly=0 utils/make-custom-phar.php wp-cli.phar --version=$CLI_VERSION