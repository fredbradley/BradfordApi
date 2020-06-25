<?php

namespace FredBradley\BradfordApi;

use GuzzleHttp\Client;

class BradfordApi
{
    protected $client;

    public function __construct(string $url, string $username, string $password)
    {
        $this->client = new Client([
            'base_uri' => $url,
            'auth' => [
                $username,
                $password
            ],
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
    }

    /**
     * Shorthand function to create requests with JSON body and query parameters.
     * @param $method
     * @param string $uri
     * @param array $json
     * @param array $query
     * @param array $options
     * @param boolean $decode JSON decode response body (defaults to true).
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(
        $method,
        $uri = '',
        array $json = [],
        array $query = [],
        array $options = [],
        $decode = true
    ) {
        $response = $this->client->request($method, $uri, array_merge([
            'json' => $json,
            'query' => $query
        ], $options));

        return $decode ? json_decode((string)$response->getBody(), true) : (string)$response->getBody();
    }
}
