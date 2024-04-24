<?php

namespace App\Http\Controllers;

use App\Http\Services\AutenticationService;
use App\Http\Services\EventsServices;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $ok = AutenticationService::verificaAutenticacao($request->bearerToken());
        if (!$ok)
        {
            return response()->json([
                "success" => false,
                "message" => "Não autorizado!",
                403
            ]);
        }
            
        $token = AutenticationService::login();
        $result = EventsServices::buscarEventos($request, $token);

        return json_decode($result);
    }

    public function participantes(Request $request, $args)
    {
        $ok = AutenticationService::verificaAutenticacao($request->bearerToken());
        if (!$ok)
        {
            return response()->json([
                "success" => false,
                "message" => "Não autorizado!",
                403
            ]);
        }
            
        $token = AutenticationService::login();
        $result = EventsServices::buscarParticipantes($args, $token);

        return json_decode($result);
    }
}