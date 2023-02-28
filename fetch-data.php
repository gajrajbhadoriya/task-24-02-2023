<?php

require_once __DIR__ . '/vendor/autoload.php';

$fData = getPostData();
// dd($fData);

$req = [
    'api' => 'https://api.nasa.gov/neo/rest/v1/feed',
    'param' => [
        'start_date' => $fData['start_date'],
        'end_date' => $fData['end_date'],
        'api_key' =>  'PSGqlSSlNOjHhJ2oiwfOVW1EbNgVaChXkgjB1h0E'
    ]
];

// dd($req);

//$data = json_decode((string) (new GuzzleHttp\Client())->get($req['api'] . '?' . http_build_query($req['param']))->getBody(), true);

$client = new GuzzleHttp\Client();
$queryString = http_build_query($req['param']);
$url = $req['api'] . '?' . $queryString;
$response = $client->get($url);
$data = json_decode((string) $response->getBody(), true);   
// dd($data);

$speed = [];
$distance = [];
$minSize = [];
$maxSize = [];

foreach ($data['near_earth_objects'] as $astros) {
    foreach ($astros as $astro) {
        $speed[] = [
            'id'=>  $astro['id'],
            'name'=>  $astro['name'],
            'speed'=>  $astro['close_approach_data'][0]['relative_velocity']['kilometers_per_hour']
        ];

        $distance[] =   [
            'id' =>  $astro['id'],
            'name' =>  $astro['name'],
            'distance' =>  $astro['close_approach_data'][0]['miss_distance']['kilometers']
        ];

        $minSize[]  =   [
            'id' =>  $astro['id'],
            'name' =>  $astro['name'],
            'minSize' =>  $astro['estimated_diameter']['kilometers']['estimated_diameter_min']
        ];

        $maxSize[]  =   [
            'id' =>  $astro['id'],
            'name' =>  $astro['name'],
            'maxSize' =>  $astro['estimated_diameter']['kilometers']['estimated_diameter_max']
        ];
    }
}

$fastestAsteroid = getMinMaxVal($speed, 'speed', 'max');
$nearestAsteroid = getMinMaxVal($distance, 'distance', 'min');
$smallestAsteroid = getMinMaxVal($minSize, 'minSize', 'min');
$largestAsteroid = getMinMaxVal($maxSize, 'maxSize', 'max');

// dd($fastestAsteroid, $nearestAsteroid, $smallestAsteroid, $largestAsteroid);

return [
    'fast' => $fastestAsteroid,
    'near' => $nearestAsteroid,
    'small' => $smallestAsteroid,
    'large' => $largestAsteroid
];
