<?php

namespace Taleez\Endpoints;

use Taleez\TaleezClient;

class Association
{
    const BASE_ENDPOINT = 'association';

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
     * Link a candidate to a pool or a job.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function link($candidateId, $poolId, $jobId)
    {
        return $this->client->post(self::BASE_ENDPOINT, [
            'association' => [
                'candidateId' => $candidateId,
                'poolId' => $jobId,
                'jobId' => $jobId,
            ],
        ]);
    }
}
