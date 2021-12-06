<?php

use Illuminate\Database\Seeder;

class JuegosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";');
        \DB::table('juegos')->insert([
			[
                'id'            => '1',
                'nombre'        => 'BAMBOO RUSH',
                'url'           => 'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=806&lang=es',
                'descripcion'   => '',
                'url_imagen'    => 'https://winchiletragamonedas.com/public/images/games/bamboo_rush.jpeg',
                'estado'        => '1'
            ],
			[
                'id'            => '2',
                'nombre'        => 'REELS OF WEALTH',
                'url'           => 'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=795&lang=es',
                'descripcion'   => '',
                'url_imagen'    => 'https://winchiletragamonedas.com/public/images/games/reels_of_wealth.jpeg',
                'estado'        => '1'
            ],
            [
                'id'            => '3',
                'nombre'        => 'DRAGON & PHOENIX',
                'url'           => 'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=814&lang=es',
                'descripcion'   => '',
                'url_imagen'    => 'https://winchiletragamonedas.com/public/images/games/dragon_phoenix.jpeg',
                'estado'        => '1'
            ],
            [
                'id'            => '4',
                'nombre'        => 'TAKE THE BANK',
                'url'           => 'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=813&lang=es',
                'descripcion'   => '',
                'url_imagen'    => 'https://winchiletragamonedas.com/public/images/games/take_the_bank.jpeg',
                'estado'        => '1'
            ],
            [
                'id'            => '5',
                'nombre'        => 'CAISHEN’S ARRIVAL',
                'url'           => 'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=812&lang=es',
                'descripcion'   => '',
                'url_imagen'    => 'https://winchiletragamonedas.com/public/images/games/caishens_arrival.jpeg',
                'estado'        => '1'
            ],
            [
                'id'            => '6',
                'nombre'        => 'GEMMED!',
                'url'           => 'https://latamwin-gp3.discreetgaming.com/cwguestlogin.do?bankId=3006&gameId=811&lang=es',
                'descripcion'   => '',
                'url_imagen'    => 'https://winchiletragamonedas.com/public/images/games/gemmed.jpeg',
                'estado'        => '1'
            ],
	    ]);
    }
}
