<?php

use Illuminate\Database\Seeder;
use \App\Contato;
use \Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contatos')->truncate();

        $faker = Faker::create("pt_BR");

        foreach (range(1, 200) as $i) {

            $data = [
                'nome' => $faker->firstName,
                'telefone' => $faker->unique()->phoneNumber,
                'email' => $faker->unique()->email,

            ];

            $data = array_merge($data, $this->getEndereco(rand (0, 9)));

            Contato::create($data);
        }
    }

    /**
     * @param int $posicao
     * @return array
     */
    public function getEndereco($posicao){

        $enderecos = [
            [
                'cep' => "23020-610",
                'logradouro' => "Caminho da Covanca",
                'complemento' => "",
                'bairro' => "Guaratiba",
                'localidade' => "Rio de Janeiro",
                'uf' => "RJ"
            ],
            [
                'cep' => "20250-001",
                'logradouro' => "Rua Maia Lacerda",
                'complemento' => "lado ímpar",
                'bairro' => "Estácio",
                'localidade' => "Rio de Janeiro",
                'uf' => "RJ"
            ],
            [
                'cep' => "21853-400",
                'logradouro' => "Travessa Sorrento",
                'complemento' => "",
                'bairro' => "Bangu",
                'localidade' => "Rio de Janeiro",
                'uf' => "RJ"
            ],
            [
                'cep' => "20960-150",
                'logradouro' => "Rua Flack",
                'complemento' => "",
                'bairro' => "Riachuelo",
                'localidade' => "Rio de Janeiro",
                'uf' => "RJ"
            ],
            [
                'cep' => "21360-740",
                'logradouro' => "Travessa Flores",
                'complemento' => "",
                'bairro' => "Madureira",
                'localidade' => "Rio de Janeiro",
                'uf' => "RJ"
            ],
            [
                'cep' => "23075-063",
                'logradouro' => "Rua Torquato de Araújo Neto",
                'complemento' => "",
                'bairro' => "Campo Grande",
                'localidade' => "Campo Grande",
                'uf' => "RJ"
            ],
            [
                'cep' => "22793-928",
                'logradouro' => "Avenida Prefeito Dulcídio Cardoso 3230",
                'complemento' => "3230",
                'bairro' => "Barra da Tijuca",
                'localidade' => "Rio de Janeiro",
                'uf' => "RJ"
            ],
            [
                'cep' => "21720-010",
                'logradouro' => "Rua Pacaembu",
                'complemento' => "",
                'bairro' => "Realengo",
                'localidade' => "Rio de Janeiro",
                'uf' => "RJ"
            ],
            [
                'cep' => "20210-010",
                'logradouro' => "Praça Onze de Junho",
                'complemento' => "",
                'bairro' => "Centro",
                'localidade' => "Rio de Janeiro",
                'uf' => "RJ"
            ],
            [
                'cep' => "21852-596",
                'logradouro' => "Travessa Manoel Sobrinho",
                'complemento' => "",
                'bairro' => "Bangu",
                'localidade' => "Rio de Janeiro",
                'uf' => "RJ"
            ]
        ];
        return ($posicao > count($enderecos)) ? $enderecos[0] : $enderecos[$posicao];
    }
}
