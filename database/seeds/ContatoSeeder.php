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

        foreach (range(1, 500) as $i) {
            Contato::create([
                'nome' => $faker->firstName,
                'telefone' => $faker->unique()->phoneNumber,
                'email' => $faker->unique()->email,
                'cep' => $faker->postcode,
                'logradouro' => $faker->streetName,
                'complemento' => $faker->text(15),
                'bairro' => $faker->text(8),
                'localidade' => $faker->citySuffix,
                'uf' => $faker->stateAbbr
            ]);
        }
    }
}
