<?php

namespace Taleez\Endpoints;

use Taleez\TaleezClient;

class Property
{
    const BASE_ENDPOINT = 'property';

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
     * List available candidate properties in your company.
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
