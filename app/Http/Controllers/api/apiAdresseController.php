<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Adresse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class apiAdresseController extends Controller
{
    public function getadresses($id){
        $adresses = Adresse::where('idUser', '=', $id)->get();
        $dataAdresse = [];

        foreach ($adresses as $adresse) {
            $dataAdresse[] = [
                'id' => $adresse->id,
                'longitude' => $adresse->longitude,
                'latitude' => $adresse->latitude,
            ];
        }
        return response()->json($dataAdresse);
    }
}
