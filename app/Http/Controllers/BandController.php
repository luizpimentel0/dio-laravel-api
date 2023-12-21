<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class BandController extends Controller
{
    public function getAll(): Response
    {
        $bands = $this->getBands();
        return response()->json($bands);
    }

    public function getBandById(int $id): Response
    {
        $band = null;

        foreach($this->getBands() as $_band) {
            if ($_band['id'] == $id) $band = $_band;
        }

        return $band ? response()->json($band) : response()->json('Band not found', 404);
    }

    public function getBandsByGenre(string $genre): Response
    {
        $bands = [];

        foreach($this->getBands() as $band) {
            if (strtolower($band['genre']) == strtolower($genre) )
                $bands[] = $band;
        }

        return !empty($bands) ? response()->json($bands) : response()->json("No bands with genre {$genre}", 404);
    }

    /**
     * @return array<int, array<string,mixed>>
     **/
    protected function getBands(): array
    {
        return [
            [
                'id' => 1, 'name' => 'Unleash the Archers', 'genre' => 'Heavy Metal'
            ],
            [
                'id' => 2, 'name' => 'Bayside Kings', 'genre' => 'Hardcore'
            ],
            [
                'id' => 3, 'name' => 'Crystal Lake', 'genre' => 'Metalcore'
            ],
            [
                'id' => 4, 'name' => 'Coldrain', 'genre' => 'Metalcore'
            ]
        ];
    }
}
