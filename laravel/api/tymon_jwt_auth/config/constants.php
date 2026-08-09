<?php
$host = $_SERVER['HTTP_HOST'] ?? php_uname('n');
// $host = explode(':', $host)[0];

$localHosts = [ "127.0.0.1:8000", "127.0.0.1", "localhost" ];
$developmentHosts = [ "example.dev.com" ];
$liveHosts = [ "example.com" ];

$isLocal = in_array($host, $localHosts);
$isDevelopment = in_array($host, $developmentHosts);
$isLive = in_array($host, $liveHosts);

if ($isLocal) {
    $env = 'local';
    if (!defined('MAIL_TEST_MODE')) define('MAIL_TEST_MODE', 'TEST');
    $frontend = "http://localhost:3000/";
    $adminPanel = "http://127.0.0.1:8000/login";
    $businessPanel = "http://127.0.0.1:8000/business/login";
}
else if ($isDevelopment) {
    $env = 'development';
    if (!defined('MAIL_TEST_MODE')) define('MAIL_TEST_MODE', 'TEST');
    $frontend = "https://example.dev.com/";
    $adminPanel = "https://example.dev.com/project/public/login";
    $businessPanel = "https://example.dev.com/project/public/business/login";
}
else {
    $env = 'live';
    if (!defined('MAIL_TEST_MODE')) define('MAIL_TEST_MODE', 'Live');
    $frontend = "https://example.com/";
    $adminPanel = "https://example.com/project/public/login";
    $businessPanel = "https://example.com/project/public/business/login";
}

return [
    'app_name' => env('APP_NAME', default: 'Laravel'),
    'environment' => $env,
    'currencySymbol'=> '€',
    'currencyCode'=> 'EUR',
    'websiteUrls' => [
        'current' => [
            'frontend' => $frontend,
            'adminPanel' => $adminPanel,
            'businessPanel' => $businessPanel,
        ]
    ],
    'placeholder_image' => [
        'placehold_co' => [
            // '50_50' => 'https://placehold.co/50x50/797979/fff?text=No+Image+Available',
            // '400_400' => 'https://placehold.co/400x400/797979/fff?text=No+Image+Available',

            '50_50' => 'https://example.com/project/public/storage/uploads/default/50_50.svg',
            '400_400' => 'https://example.com/project/public/storage/uploads/default/400_400.svg',
        ],
        'default' => [
            'person' => 'https://example.com/project/public/storage/uploads/default/person-default.png',
        ],
        'another_source' => [
            // '400_400' => 'https://another.source/400x400/placeholder.png',

            '400_400' => '',
        ],
    ],
    'main_admin_id' => [1],
    'mail' => [
        'isCC' => true,
        'developer' => ['liam_dev@yopmail.com'],
        'support' =>''
    ],
];
// \DB::enableQueryLog();
// _pre(\DB::getQueryLog());
?>