<?php

namespace Taleez\Endpoints;

use Taleez\TaleezClient;

/**
 * Class Job.
 */
class Job
{
    const BASE_ENDPOINT = 'job';

    /** @var TaleezClient */
    private $client;

    /**
     * Job constructor.
     *
     * @param TaleezClient $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * List all jobs in your company.
     *
     * @param array $options
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function get($options = [])
    {
        return $this->client->get(self::BASE_ENDPOINT, $options);
    }

    /**
     * Count all jobs and count jobs by filter values.
     *
     * @param array $options
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function filters()
    {
        return $this->client->get(self::BASE_ENDPOINT.'/filter');
    }
}
