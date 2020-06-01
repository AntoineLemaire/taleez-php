<?php


namespace Taleez\Endpoint;


use Taleez\TaleezClient;

class Recruiters
{
    const BASE_ENDPOINT = 'recruiters';

    /** @var TaleezClient */
    private $client;

    /**
     * Recruiters constructor.
     */
    public function __construct(TaleezClient $client)
    {
        $this->client = $client;
    }

    /**
     * List all recruiters in your company
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
