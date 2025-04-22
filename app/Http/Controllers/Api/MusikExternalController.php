<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LastFmService;
use Illuminate\Http\Request;

class MusikExternalController extends Controller
{
    protected $lastFm;

    public function __construct(LastFmService $lastFm)
    {
        $this->lastFm = $lastFm;
    }

    public function topTracks(Request $request)
    {
        $artist = $request->query('artist', 'Coldplay');
        $result = $this->lastFm->getTopTracks($artist);
        $tracks = $result['toptracks']['track'] ?? [];
    
        return view('top_tracks', [
            'artist' => $artist,
            'tracks' => $tracks,
        ]);
    }
    

    public function artistInfo(Request $request)
    {
        $request->validate(['artist' => 'required|string']);
        $data = $this->lastFm->getArtistInfo($request->artist);
        return response()->json($data);
    }
}
