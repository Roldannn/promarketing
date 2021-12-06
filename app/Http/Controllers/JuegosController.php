<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Juego;
use Yajra\DataTables\DataTables;
use App\Http\Requests\JuegosRequest;
use Illuminate\Support\Facades\DB;

class JuegosController extends Controller
{
    public function list()
    {
        $Juegos = Juego::all();
        return DataTables::of($Juegos)
        ->addColumn('url', function(Juego $Juegos){
            return "<a href=".$Juegos->url." target='_blank'>Ir</a>";
        })
        ->addColumn('estado', function(Juego $Juegos){
            if ($Juegos->estado == 1){
                return "<span class=\"badge badge-success\">Online</span>";
            } else {
                return "<span class=\"badge badge-warning\">Offline</span>";
            }            
        })
        ->addColumn('url_imagen', function(Juego $Juegos){
            return "<img src=".$Juegos->url_imagen."></img>";
        })
        ->addColumn('ver', function(Juego $Juegos){
            return "<button class='btn btn-outline-primary' onclick=\"ver($Juegos->id)\">Ver</button>";
        })
        ->addColumn('editar', function(Juego $Juegos){
            return "<button class='btn btn-outline-success' onclick=\"editar($Juegos->id)\">Editar</button>";
        })
        ->addColumn('borrar', function(Juego $Juegos){
            return "<button class='btn btn-outline-danger' onclick=\"eliminar($Juegos->id)\">Borrar</button>";
        })
        ->rawColumns(['url_imagen', 'url', 'estado', 'ver', 'editar', 'borrar'])
        ->toJson();
        
    }

    public function add(JuegosRequest $request)
    {
        $juego = new Juego();
        $juego->nombre = $request->nombre;
        $juego->url = $request->url;
        $juego->descripcion = $request->descripcion;
        $juego->url_imagen = $request->url_imagen;
        $juego->estado = $request->estado;
       
        DB::beginTransaction();
        try {
            $juego->save();
            DB::commit();
            $regreso = array();
            $regreso = Arr::add($regreso, 'estado', 'true');
            $regreso = Arr::add($regreso, 'mensaje', 'Datos guardados correctamente');
        } catch (\Exception $e) {
            DB::rollback();
            $regreso = array();
            $regreso = Arr::add($regreso, 'estado', 'false');
            $regreso = Arr::add($regreso, 'mensaje', 'Error al registrar los datos');
        }
        return response()->json($regreso);
    }

    public function edit(JuegosRequest $request)
    {
        $juego = Juego::where("id", $request->id)->first();

        if ($juego) {
            DB::beginTransaction();
            try {
                $juego->nombre = $request->nombre;
                $juego->url = $request->url;
                $juego->descripcion = $request->descripcion;
                $juego->url_imagen = $request->url_imagen;
                $juego->estado = $request->estado;
                $juego->save();
                DB::commit();
                $regreso = array();
                $regreso = Arr::add($regreso, 'estado', 'true');
                $regreso = Arr::add($regreso, 'mensaje', 'Datos guardados correctamente');
            } catch (\Exception $e) {
                DB::rollback();
                $regreso = array();
                $regreso = Arr::add($regreso, 'estado', 'false');
                $regreso = Arr::add($regreso, 'mensaje', 'Error al editar los datos');
            }
        } else {
            $regreso = array();
            $regreso = Arr::add($regreso, 'estado', 'false');
            $regreso = Arr::add($regreso, 'mensaje', 'Registro no encontrado');
        }

        return response()->json($regreso);
    }

    public function delete(Request $request)
    {
        $juego = Juego::where("id", $request->id)->first();
        if ($juego) {
            DB::beginTransaction();
            try {
                $juego->delete();
                $regreso = array();
                $regreso = Arr::add($regreso, 'estado', 'true');
                $regreso = Arr::add($regreso, 'mensaje', 'Datos eliminados correctamente');
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                $regreso = array();
                $regreso = Arr::add($regreso, 'estado', 'false');
                $regreso = Arr::add($regreso, 'mensaje', 'Error al eliminar los datos');
            }
            return response()->json($regreso);
        }
        $regreso = array();
        $regreso = Arr::add($regreso, 'estado', 'false');
        $regreso = Arr::add($regreso, 'mensaje', 'Registro no encontrado');

        return response()->json($regreso);
    }

    public function modalVer(Request $request)
    {
        $id = $request->id;
        $idModal = $request->idModal;
        $Juego = Juego::where("id", $id)->first();

        return view('modal-ver', compact('idModal', 'Juego'));
    }

    public function modalEdit(Request $request)
    {
        $id = $request->id;
        $idModal = $request->idModal;
        $Juego = Juego::where("id", $id)->first();

        return view('modal-edit', compact('idModal', 'Juego'));
    }

    public function modalAdd(Request $request)
    {
        $idModal = $request->idModal;
        return view('modal-add', compact('idModal'));
    }
}