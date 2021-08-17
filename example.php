<?php

use Kato\Airwallex\ApiClient;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$clientId = $_ENV['CLIENT_ID'];
$apiKey = $_ENV['API_KEY'];
$apiUrl = $_ENV['API_END_POINT'];
$version= $_ENV['API_VERSION'];

$client = new ApiClient($clientId, $apiKey, $apiUrl);

/*
 * Create Payment Intent
 * https://www.airwallex.com/docs/api?v=2021-02-28#/Payment_Acceptance/Payment_Intents/_api_v1_pa_payment_intents_create/post
 */
$order=[
    'request_id' => uniqid(),
    'amount' => '0.1',
    'currency' => 'HKD',
    'merchant_order_id' => '00001'
];
$response = $client->paymentIntent()->create($order);
var_dump($response);

$paymentIntentId = $response['id'];

/*
 * Retrieve a PaymentIntent
 * https://www.airwallex.com/docs/api?v=2021-02-28#/Payment_Acceptance/Payment_Intents/_api_v1_pa_payment_intents__id_/get
 */

$paymentIntent = $client->paymentIntent()->get($paymentIntentId);
var_dump($paymentIntent);


/*
 * Confirm a PaymentIntent
 * https://www.airwallex.com/docs/api?v=2021-02-28#/Payment_Acceptance/Payment_Intents/_api_v1_pa_payment_intents__id__confirm/post
 */

//$order=[
//    'request_id' => $requestId,
//    'payment_method' => [
//        'type' => 'alipayhk',
//        'alipayhk' => [
//            "flow" => "webqr"
//        ]
//    ]
//];

$request=[
    'request_id' => uniqid(),
    'payment_method' => [
        'type' => 'card',
        'card' => [
            "cvc" => "123",
            "expiry_month" => "12",
            "expiry_year" => "2030",
            "name" => "John Doe",
            "number" => "4111111111111111"
        ]
    ]
];

$confirm = $client->paymentIntent()->confirm($paymentIntentId, $request);
var_dump($confirm);


/*
 * Continue to confirm a PaymentIntent (3DS / DCC)
 * https://www.airwallex.com/docs/api?v=2021-02-28#/Payment_Acceptance/Payment_Intents/_api_v1_pa_payment_intents__id__confirm_continue/post
 */
//$request = [
//    'request_id' => uniqid(),
//    'type' => 'dcc',
//    'use_dcc' => true
//];
//$confirm = $client->paymentIntent()->confirmAgain($paymentIntentId, $request);
//var_dump($confirm);

/*
 * Capture a PaymentIntent
 * https://www.airwallex.com/docs/api?v=2021-02-28#/Payment_Acceptance/Payment_Intents/_api_v1_pa_payment_intents__id__capture/post
 */
$request = [
    'request_id' => uniqid(),
    'amount' => 0.1
];
$capture = $client->paymentIntent()->capture($paymentIntentId, $request);
var_dump($capture);

/*
 * Cancel a PaymentIntent
 * https://www.airwallex.com/docs/api?v=2021-02-28#/Payment_Acceptance/Payment_Intents/_api_v1_pa_payment_intents__id__cancel/post
 */
$cancel = $client->paymentIntent()->cancel($paymentIntentId);
var_dump($cancel);


$paymentIntents = $client->paymentIntent()->records();
var_dump($paymentIntents);
