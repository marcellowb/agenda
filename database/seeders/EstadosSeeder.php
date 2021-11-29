<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->delete();

        Estado::create(["id"=>12, "sigla"=>"AC", "nome"=>"Acre"]);
        Estado::create(["id"=>27, "sigla"=>"AL", "nome"=>"Alagoas"]);
        Estado::create(["id"=>13, "sigla"=>"AM", "nome"=>"Amazonas"]);
        Estado::create(["id"=>16, "sigla"=>"AP", "nome"=>"Amapá"]);
        Estado::create(["id"=>29, "sigla"=>"BA", "nome"=>"Bahia"]);
        Estado::create(["id"=>23, "sigla"=>"CE", "nome"=>"Ceará"]);
        Estado::create(["id"=>53, "sigla"=>"DF", "nome"=>"Distrito Federal"]);
        Estado::create(["id"=>32, "sigla"=>"ES", "nome"=>"Espírito Santo"]);
        Estado::create(["id"=>52, "sigla"=>"GO", "nome"=>"Goiás"]);
        Estado::create(["id"=>21, "sigla"=>"MA", "nome"=>"Maranhão"]);
        Estado::create(["id"=>31, "sigla"=>"MG", "nome"=>"Minas Gerais"]);
        Estado::create(["id"=>50, "sigla"=>"MS", "nome"=>"Mato Grosso do Sul"]);
        Estado::create(["id"=>51, "sigla"=>"MT", "nome"=>"Mato Grosso"]);
        Estado::create(["id"=>15, "sigla"=>"PA", "nome"=>"Pará"]);
        Estado::create(["id"=>25, "sigla"=>"PB", "nome"=>"Paraíba"]);
        Estado::create(["id"=>26, "sigla"=>"PE", "nome"=>"Pernambuco"]);
        Estado::create(["id"=>22, "sigla"=>"PI", "nome"=>"Piauí"]);
        Estado::create(["id"=>41, "sigla"=>"PR", "nome"=>"Paraná"]);
        Estado::create(["id"=>33, "sigla"=>"RJ", "nome"=>"Rio de Janeiro"]);
        Estado::create(["id"=>24, "sigla"=>"RN", "nome"=>"Rio Grande do Norte"]);
        Estado::create(["id"=>11, "sigla"=>"RO", "nome"=>"Rondônia"]);
        Estado::create(["id"=>14, "sigla"=>"RR", "nome"=>"Roraima"]);
        Estado::create(["id"=>43, "sigla"=>"RS", "nome"=>"Rio Grande do Sul"]);
        Estado::create(["id"=>42, "sigla"=>"SC", "nome"=>"Santa Catarina"]);
        Estado::create(["id"=>28, "sigla"=>"SE", "nome"=>"Sergipe"]);
        Estado::create(["id"=>35, "sigla"=>"SP", "nome"=>"São Paulo"]);
        Estado::create(["id"=>17, "sigla"=>"TO", "nome"=>"Tocantins"]);

    }
}





















