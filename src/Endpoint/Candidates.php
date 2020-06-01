<?php

namespace Taleez\Endpoint;

use Taleez\TaleezClient;

class Candidates
{
    const BASE_ENDPOINT = 'candidates';

    /** @var TaleezClient */
    private $client;

    /**
     * Properties constructor.
     */
    public function __construct(TaleezClient $client)
    {
        $this->client = $client;
    }

    /**
     * Search candidates
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function search(array $options = [], $page = 0, $pageSize = 100)
    {
        $options = array_merge($options, [
            'page' => $page,
            'pageSize' => $pageSize,
        ]);

        return $this->client->get(self::BASE_ENDPOINT, $options);
    }

    /**
     * Add a candidate.
     *
     * @var array
     *            {
     *            "firstName": "John",
     *            "lastName": "Doe",
     *            "mail": "john.doe@gmail.com",
     *            "phone": "0611223344",
     *            "initialReferrer": "linkedin.com",
     *            "lang": "fr",
     *            "recruiterId": 5489
     *            }
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function add($candidate)
    {
        return $this->client->post(self::BASE_ENDPOINT, [
            'candidate' => $candidate,
        ]);
    }

    /**
     * Get a candidate.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function get($candidateId)
    {
        return $this->client->get(self::BASE_ENDPOINT.'/'.$candidateId);
    }

    /**
     * Associate candidate to jobs.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function associateJobs($candidateId, array $jobs)
    {
        return $this->client->post(sprintf(self::BASE_ENDPOINT.'/%s/jobs', $candidateId), [
            'idListDTO' => $jobs,
        ]);
    }

    /**
     * Add candidate to pools.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function associatPools($candidateId, array $pools)
    {
        return $this->client->post(sprintf(self::BASE_ENDPOINT.'/%s/pools', $candidateId), [
            'idListDTO' => $pools,
        ]);
    }

    /**
     * Update candidate properties values.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function update($candidateId, array $properties)
    {
        return $this->client->post(sprintf(self::BASE_ENDPOINT.'/%s/properties', $candidateId), [
            'candidateProperties' => $properties,
        ]);
    }
}
