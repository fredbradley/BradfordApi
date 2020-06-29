<?php

namespace FredBradley\BradfordApi;

use GuzzleHttp\Client;

/**
 * Class BradfordApi
 * @package FredBradley\BradfordApi
 */
class BradfordApi
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * BradfordApi constructor.
     * @param string $url
     * @param string $username
     * @param string $password
     */
    public function __construct(string $url, string $username, string $password)
    {
        $this->client = new Client([
            'base_uri' => $url,
            'auth' => [
                $username,
                $password,
            ],
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }

    /**
     * Shorthand function to create requests with JSON body and query parameters.
     * @param $method
     * @param string $uri
     * @param array $json
     * @param array $query
     * @param array $options
     * @param bool $decode JSON decode response body (defaults to true).
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request(
        string $method,
        string $uri = '',
        array $json = [],
        array $query = [],
        array $options = [],
        $decode = true
    ) {
        $response = $this->client->request($method, $uri, array_merge([
            'json' => $json,
            'query' => $query,
        ], $options));

        return $decode ? json_decode((string)$response->getBody(), true) : (string)$response->getBody();
    }

    /**
     * @param string $username
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function findHostsByUsername(string $username)
    {
        return $this->getUserDevices([
            'owner' => $username,
        ]);
    }

    /**
     * @param string $macAddress
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHostbyMacAddress(string $macAddress)
    {
        return $this->request("GET", 'host/macaddress/' . strtoupper($macAddress));
    }

    /**
     * @param array $searchQuery
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getUserDevices(array $searchQuery)
    {
        return $this->request("GET", "host", [], $searchQuery);
    }
}
