<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_completo', 
        'cpf', 
        'email',
        'telefone',
        'logradouro', 
        'numero', 
        'complemento',
        'bairro', 
        'cidade',
        'estado', 
        'cep', 
        'codigo_ibge', 
        'foto_usuario'];

        protected $visible = ['nome_completo', 'cidade', 'foto_usuario','reputacao']; //quais atributos serão repassados pela API

        protected $appends = ['reputacao'];
  
       
        public function getFotoUsuarioAttribute(string $valor){

            return config('app.url').'/'. $valor;
        }

        //dando uma reputação randomica
        public function getReputacaoAttribute( $valor){
            return mt_rand(1,5);
        }


        //Buscando diaristas por codigo IBGE

        static public function buscaPorCodigoIbge(int $codigoIbge){
            return self::where('codigo_ibge', $codigoIbge) ->limit(6)->get();
        }

        //Retorna a qtde de diaristas

        static public function quantidadePorCodigoIbge(int $codigoIbge){
            $quantidade = self::where('codigo_ibge', $codigoIbge) ->count();

            return $quantidade > 6 ? $quantidade - 6 : 0;
        }
}
