<?php

namespace Taleez\Endpoint;

use GuzzleHttp\Exception\GuzzleException;
use Taleez\TaleezClient;

class Pools
{
    const BASE_ENDPOINT = 'pools';

    /** @var TaleezClient */
    private $client;

    /**
     * Pools constructor.
     */
    public function __construct(TaleezClient $client)
    {
        $this->client = $client;
    }

    /**
     * List all pools in your company.
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function list($page = 0, $pageSize = 100)
    {
        return $this->client->get(self::BASE_ENDPOINT, [
            'page' => $page,
            'pageSize' => $pageSize,
        ]);
    }

    /**
     * Add candidates to a pool.
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function add($poolId, array $candidatesIds)
    {
        return $this->client->get(sprintf(self::BASE_ENDPOINT.'/%s/candidates', $poolId), [
            'candidateIds' => $candidatesIds,
        ]);
    }
}
