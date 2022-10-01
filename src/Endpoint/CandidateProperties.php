<?php

namespace Taleez\Endpoint;

use GuzzleHttp\Exception\GuzzleException;
use Taleez\TaleezClient;

/**
 * Class CandidateProperties.
 */
class CandidateProperties
{
    const BASE_ENDPOINT = 'candidate-properties';

    /** @var TaleezClient */
    private $client;

    /**
     * CandidateProperties constructor.
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
    /**
     * Get details of a candidate property.
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
