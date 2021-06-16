<?php

namespace App\Http\Controllers;

use App\Services\ViaCEP;
use App\Models\Diarista;
use Illuminate\Http\Request;

class BuscaDiaristaCep extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ViaCEP $viaCEP){
       $endereco =  $viaCEP->buscar($request->cep);

       if ($endereco === false){
           return response()->json(['erro' =>'CEP inválido'], 400);
       }
      
     return  [
         'diaristas' => Diarista::buscaPorCodigoIbge($endereco['ibge']),
         'quantidade diaristas' => Diarista:: quantidadePorCodigoIbge($endereco['ibge'])
     ];
       
    }
}
