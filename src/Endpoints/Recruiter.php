<?php


namespace Taleez\Endpoints;


use Taleez\TaleezClient;

class Recruiter
{
    const BASE_ENDPOINT = 'recruiter';

    /** @var TaleezClient */
    private $client;

    /**
     * Recruiter constructor.
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
