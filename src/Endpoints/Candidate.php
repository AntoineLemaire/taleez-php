<?php

namespace Taleez\Endpoints;

use Taleez\TaleezClient;

class Candidate
{
    const BASE_ENDPOINT = 'candidate';

    /** @var TaleezClient */
    private $client;

    /**
     * Property constructor.
     */
    public function __construct(TaleezClient $client)
    {
        $this->client = $client;
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
