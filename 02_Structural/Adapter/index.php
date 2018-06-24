<?php

class YouTube
{
    public function getViewCount($id)
    {
        return 3242;
    }
}

interface YouTubeAdapterInterface
{
    public function getViews($id);
}

class YouTubeAdapter implements YouTubeAdapterInterface
{
    protected $client;

    public function __construct(YouTube $client)
    {
        $this->client = $client;
    }
    public function getViews($id)
    {
        return $this->client->getViewCount($id);
    }
}

$youtube = new YouTubeAdapter(new YouTube);
var_dump($youtube->getViews(12));
