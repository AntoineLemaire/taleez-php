<?php

namespace Taleez\Endpoint;

use GuzzleHttp\Exception\GuzzleException;
use Taleez\TaleezClient;

/**
 * Class Jobs.
 */
class Jobs
{
    const BASE_ENDPOINT = 'jobs';

    /** @var TaleezClient */
    private $client;

    /**
     * Jobs constructor.
     */
    public function __construct(TaleezClient $client)
    {
        $this->client = $client;
    }

    /**
     * List all jobs in your company.
     *
     * @throws GuzzleException
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
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function getDetails($jobId)
    {
        return $this->client->get(self::BASE_ENDPOINT.'/'.$jobId);
    }

    /**
     * Create an application for a job.
     *
     * @var array $application
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function createApplication($jobId, $application)
    {
        return $this->client->post(self::BASE_ENDPOINT.'/'.$jobId.'/applications', $application);
    }

    /**
     * Add candidates to a job.
     *
     * @var array $candidatesIds
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function addCandidates($jobId, $candidatesIds)
    {
        return $this->client->post(self::BASE_ENDPOINT.'/'.$jobId.'/candidates', [
            'ids' => $candidatesIds
        ]);
    }

    /**
     * Get questions of a job.
     *
     * @throws GuzzleException
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
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function count()
    {
        return $this->client->get(self::BASE_ENDPOINT.'/filters');
    }
}
