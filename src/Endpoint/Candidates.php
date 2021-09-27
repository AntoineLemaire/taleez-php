<?php

namespace Taleez\Endpoint;

use GuzzleHttp\Exception\GuzzleException;
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
     * Search candidates.
     *
     * @throws GuzzleException
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
     * @throws GuzzleException
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
     * @throws GuzzleException
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
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function associateJobs($candidateId, array $jobs)
    {
        return $this->client->post(sprintf(self::BASE_ENDPOINT.'/%s/jobs', $candidateId), [
            'ids' => $jobs,
        ]);
    }

    /**
     * Get candidate pool list.
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function getPoolList($candidateId)
    {
        return $this->client->get(sprintf(self::BASE_ENDPOINT.'/%s/pools', $candidateId));
    }

    /**
     * Add candidate to pools.
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function associatPools($candidateId, array $pools)
    {
        return $this->client->post(sprintf(self::BASE_ENDPOINT.'/%s/pools', $candidateId), [
            'ids' => $pools,
        ]);
    }

    /**
     * Update candidate properties values.
     *
     * @throws GuzzleException
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
