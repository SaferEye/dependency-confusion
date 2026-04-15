<?php
// These packages should NOT exist on packagist.org
// Attacker can register them and composer will fetch from public

// VULNERABLE: Internal packages (not on Packagist)
require_once 'vendor/autoload.php';

use Internal\Authentication\AuthManager;
use Company\Payment\GatewayProcessor;
use Private\Cache\RedisCluster;
use Internal\Logging\AuditLogger;
use Company\Secrets\VaultClient;

// Public packages
use Monolog\Logger;
use GuzzleHttp\Client;

class Application {
    private $auth;
    private $payment;
    private $cache;
    private $logger;
    
    public function __construct() {
        $this->auth = new AuthManager();
        $this->payment = new GatewayProcessor();
        $this->cache = new RedisCluster();
        $this->logger = new AuditLogger();
        
        $this->logger->info('Application initialized with internal packages');
    }
    
    public function process() {
        $this->auth->validate();
        $this->payment->charge(99.99);
        return $this->cache->get('user_data');
    }
}

$app = new Application();
$app->process();
?>
