[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]

<p align="center">

  <h3 align="center">Airwallex API Demo</h3>

  <p align="center">
    <a href="https://github.com/apphk/airwallex-api-demo"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/apphk/airwallex-api-demo">View Demo</a>
    ·
    <a href="https://github.com/apphk/airwallex-api-demo/issues">Report Bug</a>
    ·
    <a href="https://github.com/apphk/airwallex-api-demo/issues">Request Feature</a>
  </p>
</p>


<!-- ABOUT THE PROJECT -->
## About The Project

[![Airwallex API Flow][airwallex-flow]](https://www.airwallex.com/docs/online-airwallexnts__recurring-airwallexnts__api-integration)

### Built With

* [PHP](https://www.php.net/)



## Getting Started

### Prerequisites

Get your Airwallex business account ready and generate your API credentials
* API Credentials consist of 2 parameters
    ```text
    Client ID 
    API Key
    ```

### Installation

1. Get the Airwallex API package 
2. Clone this repo 
    ```sh
    git clone https://github.com/apphk/airwallex-api-demo
    ```
3. Rename .env.example to .env and update the variables with your credentials
    ```sh
    CLIENT_ID =
    API_KEY =
   ...
    ```
4. Install packages
   ```sh
   composer install
   ```
5. Run example.php 
   ```sh
   php example.php 
   ```

## Usage

- Init api client
    ```php
    $client = new ApiClient($clientId, $apiKey, $apiUrl);
    ```
- Create Payment Intent
    ```php
    $response = $client->paymentIntent()->requests($request);
    ```
- Retrieve a PaymentIntent 
    ```php
    $paymentIntent = $client->paymentIntent()->get($paymentIntentId);
    ```  
- Confirm a PaymentIntent
    ```php
    $confirm = $client->paymentIntent()->confirm($paymentIntentId, $request);
    ```
- Continue to confirm a PaymentIntent (3DS / DCC)
    ```php
    $confirm = $client->paymentIntent()->confirmAgain($paymentIntentId, $request);
    ```
- Capture a PaymentIntent
    ```php
    $capture = $client->paymentIntent()->capture($paymentIntentId, $request);
    ```
- Cancel a PaymentIntent
    ```php
    $cancel = $client->paymentIntent()->cancel($paymentIntentId);
    ```
  
_For more api details, please refer to the [Documentation](https://www.airwallex.com/docs/api#/Introduction)_



<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/apphk/airwallex-api-demo/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- CONTACT -->
## Contact

Project team: [https://hksay.com](https://hksay.com)


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/apphk/airwallex-api-demo.svg?style=for-the-badge
[contributors-url]: https://github.com/apphk/airwallex-api-demo/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/apphk/airwallex-api-demo.svg?style=for-the-badge
[forks-url]: https://github.com/apphk/airwallex-api-demo/network/members
[stars-shield]: https://img.shields.io/github/stars/apphk/airwallex-api-demo.svg?style=for-the-badge
[stars-url]: https://github.com/apphk/airwallex-api-demo/stargazers
[issues-shield]: https://img.shields.io/github/issues/apphk/airwallex-api-demo.svg?style=for-the-badge
[issues-url]: https://github.com/apphk/airwallex-api-demo/issues
[airwallex-flow]: https://images.contentful.com/c3n7jozh84hr/5ewNVlLNzq1fyMfbJQhuZc/7ebca30c386b637d29286a581c62a225/API-MIT.png