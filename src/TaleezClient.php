<?php

namespace Taleez;

use GuzzleHttp\Client;
use Taleez\Endpoints\Job;
use function GuzzleHttp\Psr7\stream_for;
use Psr\Http\Message\ResponseInterface;

class TaleezClient
{
    const BASE_URI = 'api.taleez.com';

    /** @var Client $httpClient */
    private $httpClient;

    /** @var string API public key */
    protected $apiKey;

    /** @var string API secret key */
    protected $apiSecret;

    /** @var Job $calls */
    public $job;

    /**
     * TaleezClient constructor.
     *
     * @param string $apiKey    API public key
     * @param string $apiSecret API secret key
     */
    public function __construct($apiKey, $apiSecret)
    {
        $this->setDefaultClient();
        $this->job = new Job($this);

        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    private function setDefaultClient()
    {
        $this->httpClient = new Client();
    }

    /**
     * Sets GuzzleHttp client.
     *
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->httpClient = $client;
    }

    /**
     * Sends POST request to Taleez API.
     *
     * @param string $endpoint
     * @param array  $datas
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function post($endpoint, $datas = [])
    {
        $response = $this->httpClient->request('POST', $this->getUri().$endpoint, [
            'json' => $datas,
            'headers' => $this->getHeaders(),
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Sends PUT request to Taleez API.
     *
     * @param string $endpoint
     * @param array  $datas
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function put($endpoint, $datas = [])
    {
        $response = $this->httpClient->request('PUT', $this->getUri().$endpoint, [
            'json' => $datas,
            'headers' => $this->getHeaders(),
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Sends DELETE request to Taleez API.
     *
     * @param string $endpoint
     * @param array  $datas
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function delete($endpoint, $datas = [])
    {
        $response = $this->httpClient->request('DELETE', $this->getUri().$endpoint, [
            'json' => $datas,
            'headers' => $this->getHeaders(),
        ]);

        return $this->handleResponse($response);
    }

    /**
     * @param string $endpoint
     * @param array  $$datas
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function get($endpoint, $datas = [])
    {
        $response = $this->httpClient->request('GET', $this->getUri().$endpoint, [
            'query' => $datas,
            'headers' => $this->getHeaders(),
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Returns basic headers with authentication parameters.
     *
     * @return array
     */
    public function getHeaders()
    {
        $headers = [
            'Accept' => 'application/json',
        ];

        if (!empty($this->apiKey)) {
            $headers['X-taleez-api-key'] = $this->apiKey;
        }

        if (!empty($this->apiSecret)) {
            $headers['X-taleez-api-secret'] = $this->apiSecret;
        }

        return $headers;
    }

    /**
     * Returns Taleez API Uri.
     *
     * @return string
     */
    public function getUri()
    {
        return 'https://'.self::BASE_URI.'/';
    }

    /**
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    private function handleResponse(ResponseInterface $response)
    {
        $stream = stream_for($response->getBody());
        $data = json_decode($stream);

        return $data;
    }
}
