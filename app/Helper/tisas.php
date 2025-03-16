<?php

namespace App\Helper;

class tisas
{
    protected $client;
    protected $headers;
    protected $tisas;

    public function __construct()
    {
        $this->tisas        = 'https://crm.toyotaintercom.com/api/syncdata';
        $this->client       = new \GuzzleHttp\Client();
        $this->headers      = ['Content-Type' => 'application/json', 'Accept' => 'application/json'];
    }

    public static function initial()
    {
        return new self;
    }

    public function generateAccessToken($dataBody)
    {
        $res = $this->client->request('POST', $this->tisas . '/gettoken', [
            'headers' => $this->headers,
            'body' => json_encode($dataBody)
        ], ['verifiy' => false]);
        $response = json_decode($res->getBody());

        return $response;
    }

    public function getSales($bearer, $dataBody)
    {
        $res      = $this->client->request('GET', $this->tisas . '/getsales', [
            'headers' => [
                'Authorization' => 'Bearer ' . $bearer,
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json'
            ],
            'body'    => json_encode($dataBody)
        ]);
        $response = json_decode($res->getBody());

        return $response;
    }

    public function getSpv($bearer, $dataBody)
    {
        $res      = $this->client->request('GET', $this->tisas . '/getsupervisor', [
            'headers' => [
                'Authorization' => 'Bearer ' . $bearer,
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json'
            ],
            'body'    => json_encode($dataBody)
        ]);
        $response = json_decode($res->getBody());

        return $response;
    }
}
