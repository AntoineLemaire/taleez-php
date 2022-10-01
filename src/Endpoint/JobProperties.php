<?php

namespace Taleez\Endpoint;

use GuzzleHttp\Exception\GuzzleException;
use Taleez\TaleezClient;

/**
 * Class JobProperties.
 */
class JobProperties
{
    const BASE_ENDPOINT = 'job-properties';

    /** @var TaleezClient */
    private $client;

    /**
     * JobProperties constructor.
     */
    public function __construct(TaleezClient $client)
    {
        $this->client = $client;
    }

    /**
     * List available job properties in your company.
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
     * Get details of a job property.
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function details($propertyId)
    {
        return $this->client->get(self::BASE_ENDPOINT.'/'.$propertyId);
    }
}
