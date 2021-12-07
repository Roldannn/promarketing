<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Juego;

class AppTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testActualizar()
    {
        $test = $this->json('PUT', '/juegos', [
            'nombre' => '',
            'url' => '',
            'url_imagen' => '',
            'descripcion' => '',
            'estado' => '',
            'id' => 1000,
        ]);
        $test->assertStatus(200)->assertExactJson([
            'estado' => 'false',
            'mensaje' => 'Registro no encontrado'
        ]);
    }

    public function testAgregar()
    {
        $test = $this->json('POST', '/juegos', [
            'nombre' => 'test',
            'url' => 'test',
            'url_imagen' => 'test',
            'descripcion' => 'test',
            'estado' => '1',
        ]);
        $test->assertStatus(200)->assertExactJson([
            'estado' => 'true',
            'mensaje' => 'Datos guardados correctamente'
        ]);
    }

    public function testEliminar(){
        $id = Juego::latest()->first()->id;

        if($id > 5){
            $test = $this->json('DELETE', '/juegos', [
                'id' => $id,
            ]);
    
            $test->assertStatus(200)->assertExactJson([
                'estado' => 'true',
                'mensaje' => 'Datos eliminados correctamente'
            ]);
        }

       
    }


    public function testLista()
    {
        $test = $this->json('POST', '/juegosList');

        $test->assertStatus(200)->assertJsonStructure([
            'data' =>[
                '*' => [
                    'id',
                    'nombre',
                    'borrar',
                    'created_at',
                    'descripcion',
                    'editar',
                    'estado',
                    'id',
                    'nombre',
                    'updated_at',
                    'url',
                    'url_imagen',
                    'ver',
                ]
            ],
            'draw',
            'input',
            'recordsFiltered',
            'recordsTotal'
        ]);
    }
}
