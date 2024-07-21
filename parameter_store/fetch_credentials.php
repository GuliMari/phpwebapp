<?php
require 'vendor/autoload.php';

use Aws\Ssm\SsmClient;

function getParameter($name) {
    $client = new SsmClient([
        'version' => 'latest',
        'region'  => 'your-region' // e.g., 'us-west-2'
    ]);

    $result = $client->getParameter([
        'Name' => $name,
        'WithDecryption' => true
    ]);

    return $result['Parameter']['Value'];
}

$db_host = getParameter('/myapp/DB_HOST');
$db_username = getParameter('/myapp/DB_USERNAME');
$db_password = getParameter('/myapp/DB_PASSWORD');
$db_name = getParameter('/myapp/DB_NAME');
?>
