<?php
require 'vendor/autoload.php'; // Ensure you have the GeoIP2 library installed via Composer

use GeoIp2\Database\Reader;

// Load the GeoIP2 database
$reader = new Reader('/path/to/GeoLite2-Country.mmdb');

// Get the user's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Lookup the user's country
try {
    $record = $reader->country($ip);
    $countryCode = $record->country->isoCode;
} catch (Exception $e) {
    $countryCode = 'UNKNOWN'; // Default if something goes wrong
}

// Check if the user is from the US
if ($countryCode === 'US') {
    header('Location: https://roastandrelish.store');
} else {
    header('Location: https://www.amazon.com/Simple-Joys-Carters-Short-Sleeve-Bodysuit/dp/B07GY1RRZF');
}

// Make sure to stop further execution
exit();
?>
