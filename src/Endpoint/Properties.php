<?php

namespace Taleez\Endpoint;

use GuzzleHttp\Exception\GuzzleException;
use Taleez\TaleezClient;

class Properties
{
    const BASE_ENDPOINT = 'properties';

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
     * List available candidate properties in your company.
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
}
