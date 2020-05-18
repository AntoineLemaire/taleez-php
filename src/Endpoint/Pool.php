<?php

namespace Taleez\Endpoint;

use Taleez\TaleezClient;

class Pool
{
    const BASE_ENDPOINT = 'pool';

    /** @var TaleezClient */
    private $client;

    /**
     * Pool constructor.
     */
    public function __construct(TaleezClient $client)
    {
        $this->client = $client;
    }

    /**
     * List all pools in your company.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
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
}
