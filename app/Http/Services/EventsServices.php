<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

class EventsServices
{
    public static function buscarEventos(Request $request, $token)
    {
        $url = 'http://eventsfull.com.br/api/events';

        // Cabeçalhos personalizados que deseja enviar
        $headers = array(
            'Content-Type: application/json', // Exemplo de cabeçalho Content-Type
            'Authorization: Bearer ' . $token
        );

        $ch = curl_init();

        // Configura as opções da requisição cURL
        curl_setopt($ch, CURLOPT_URL, $url); // Define a URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Se true, retorna o resultado da transferência como string ao invés de imprimi-lo diretamente
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Se true, segue redirecionamentos
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Executa a requisição cURL e obtém a resposta
        $response = curl_exec($ch);

        // Verifica se ocorreu algum erro durante a requisição
        if(curl_errno($ch)){
            echo 'Erro cURL: ' . curl_error($ch);
        }

        // Fecha a sessão cURL
        curl_close($ch);

        return $response;
    }

    public static function buscarParticipantes($args, $token)
    {
        $url = 'http://eventsfull.com.br/api/events/' . $args;
        //die(var_export($url));

        // Cabeçalhos personalizados que deseja enviar
        $headers = array(
            'Content-Type: application/json', // Exemplo de cabeçalho Content-Type
            'Authorization: Bearer ' . $token
        );

        $ch = curl_init();

        // Configura as opções da requisição cURL
        curl_setopt($ch, CURLOPT_URL, $url); // Define a URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Se true, retorna o resultado da transferência como string ao invés de imprimi-lo diretamente
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Se true, segue redirecionamentos
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Executa a requisição cURL e obtém a resposta
        $response = curl_exec($ch);

        // Verifica se ocorreu algum erro durante a requisição
        if(curl_errno($ch)){
            echo 'Erro cURL: ' . curl_error($ch);
        }

        // Fecha a sessão cURL
        curl_close($ch);

        return $response;
    }
}