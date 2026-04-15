<?php
// composer.json would have: monolog/monolog, guzzlehttp/guzzle, laravel/framework, symfony/console, doctrine/orm, unused/package, another/unused
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use GuzzleHttp\Client;
// use Illuminate\Http\Request; // NOT USED
// use Symfony\Component\Console\Application; // NOT USED
// use Doctrine\ORM\EntityManager; // NOT USED

$log = new Logger('app');
$log->pushHandler(new StreamHandler('app.log', Logger::INFO));

$client = new Client();
$response = $client->get('https://jsonplaceholder.typicode.com/posts/1');

$log->info('API Response', ['status' => $response->getStatusCode()]);
echo json_encode(json_decode($response->getBody()), JSON_PRETTY_PRINT);
?>
