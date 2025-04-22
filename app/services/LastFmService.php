<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class LastFmService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('LASTFM_API_KEY');
        $this->apiUrl = env('LASTFM_API_URL');
    }

    public function getTopTracks($artist)
    {
        $response = Http::get($this->apiUrl, [
            'method' => 'artist.gettoptracks',
            'artist' => $artist,
            'api_key' => $this->apiKey,
            'format' => 'json',
        ]);

        return $response->json();
    }

    public function getArtistInfo($artist)
    {
        $response = Http::get($this->apiUrl, [
            'method' => 'artist.getinfo',
            'artist' => $artist,
            'api_key' => $this->apiKey,
            'format' => 'json',
        ]);

        return $response->json();
    }
}
