<?php

namespace Taleez\Endpoints;

use Taleez\TaleezClient;

class Documents
{
    const BASE_ENDPOINT = 'documents';

    /** @var TaleezClient */
    private $client;

    /**
     * Document constructor.
     */
    public function __construct(TaleezClient $client)
    {
        $this->client = $client;
    }

    /**
     * Add a document.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return mixed
     */
    public function add($candidateId, $file, $cv = false)
    {
        return $this->client->post(self::BASE_ENDPOINT, [
            'candidateId' => $candidateId,
            'file' => $file,
            'cv' => $cv,
        ]);
    }
}