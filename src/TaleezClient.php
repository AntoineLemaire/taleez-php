<?php

namespace Taleez;

use GuzzleHttp\Client;
use function GuzzleHttp\Psr7\stream_for;
use Psr\Http\Message\ResponseInterface;
use Taleez\Endpoint\Association;
use Taleez\Endpoint\Candidates;
use Taleez\Endpoint\Documents;
use Taleez\Endpoint\Jobs;
use Taleez\Endpoint\Pools;
use Taleez\Endpoint\Properties;
use Taleez\Endpoint\Recruiters;

class TaleezClient
{
    const BASE_URI = 'api.taleez.com/0';

    /*******************
     *    ENDPOINTS    *
     *******************/

    /** @var Candidates $candidate */
    public $candidates;

    /** @var Documents $document */
    public $documents;

    /** @var Jobs $job */
    public $jobs;

    /** @var Pools $pool */
    public $pools;

    /** @var Properties $properties */
    public $properties;

    /** @var Recruiters $recruiter */
    public $recruiters;

    /*******************
     *    CONFIG       *
     *******************/

    /** @var string API public key */
    private $apiKey;

    /** @var string API secret key */
    private $apiSecret;

    /** @var Client $httpClient */
    private $httpClient;

    /**
     * TaleezClient constructor.
     *
     * @param string $apiKey    API public key
     * @param string $apiSecret API secret key
     */
    public function __construct($apiKey, $apiSecret)
    {
        $this->setDefaultClient();
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;

        $this->candidates = new Candidates($this);
        $this->documents = new Documents($this);
        $this->jobs = new Jobs($this);
        $this->pools = new Pools($this);
        $this->properties = new Properties($this);
        $this->recruiters = new Recruiters($this);
    }

    /**
     * Sets GuzzleHttp client.
     */
    public function setClient(Client $client)
    {
        $this->httpClient = $client;
    }

    /**
     * Sends POST request to Taleez API.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function post(string $endpoint, array $datas = [])
    {
        $response = $this->httpClient->request('POST', $this->getUri().$endpoint, [
            'json' => $datas,
            'headers' => $this->getAuthHeaders(),
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Sends PUT request to Taleez API.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function put(string $endpoint, array $datas = [])
    {
        $response = $this->httpClient->request('PUT', $this->getUri().$endpoint, [
            'json' => $datas,
            'headers' => $this->getAuthHeaders(),
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Sends DELETE request to Taleez API.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function delete(string $endpoint, array $datas = [])
    {
        $response = $this->httpClient->request('DELETE', $this->getUri().$endpoint, [
            'json' => $datas,
            'headers' => $this->getAuthHeaders(),
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Sends GET request to Taleez API.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function get(string $endpoint, array $datas = [])
    {
        $response = $this->httpClient->request('GET', $this->getUri().$endpoint, [
            'query' => $datas,
            'headers' => $this->getAuthHeaders(),
        ]);

        return $this->handleResponse($response);
    }

    /**
     * Returns basic headers with authentication parameters.
     *
     * @return array
     */
    public function getAuthHeaders()
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

    private function setDefaultClient()
    {
        $this->httpClient = new Client();
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
