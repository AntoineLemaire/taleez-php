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
     */
    public function __construct(TaleezClient $client)
    {
        $this->client = $client;
    }

    /**
     * List all jobs in your company.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function list(array $options = [], $page = 0, $pageSize = 100)
    {
        $options = array_merge($options, [
            'page' => $page,
            'pageSize' => $pageSize,
        ]);

        return $this->client->get(self::BASE_ENDPOINT, $options);
    }

    /**
     * Get details of a job.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function getDetails($jobId)
    {
        return $this->client->get(self::BASE_ENDPOINT.'/'.$jobId);
    }

    /**
     * Get questions of a job.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function getQuestions($jobId)
    {
        return $this->client->get(self::BASE_ENDPOINT.'/'.$jobId.'/questions');
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
    public function count()
    {
        return $this->client->get(self::BASE_ENDPOINT.'/filters');
    }
}
