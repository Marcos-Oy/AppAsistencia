<?php

namespace sis_Inventario\Http\Controllers;

use Illuminate\Http\Request;

use sis_Inventario\Http\Requests;

use sis_Inventario\Banco;
use Illuminate\Support\Facades\Redirect;
use sis_Inventario\Http\Requests\BancoFormRequest;
use DB;
use Fpdf;

class BancoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //mostrar y buscar datos
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $banco=DB::table('instituciones')
            ->select('id', 'tipo', 'codigoSBIF', 'codigoRegistro', 'nombre')
            ->orwhere('id','LIKE','%'.$query.'%')
            ->orwhere('tipo','LIKE','%'.$query.'%')
            ->orwhere('codigoSBIF','LIKE','%'.$query.'%')
            ->orwhere('codigoRegistro','LIKE','%'.$query.'%')
            ->orwhere('nombre','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('Banco.index',["banco"=>$banco,"searchText"=>$query]);
        }
    }

    //redirigir a create html
    public function create()
    {
        return view("Banco.create");
    }

    //insertar datos
    public function store(BancoFormRequest $request)
    {
        
        try{
            $banco = new Banco;       
            $banco -> tipo = $request->get('tipo');
            $banco -> codigoSBIF = $request->get('codigoSBIF');
            $banco -> codigoRegistro = $request->get('codigoRegistro');
            $banco -> nombre = $request->get('nombre');
        
            $banco -> save();
            return Redirect::to('Banco');

        }catch(Exception $e){
            
            return $e;
        
        }
    }


    //rederigir a actividad
    public function edit($id)
    {
        return view("Banco.edit", ["banco" => Banco::findOrFail($id)]);
    }


    //actualizar datos
    public function update(BancoFormRequest $request, $id)
    {
        $banco = Banco::findOrFail($id);
        $banco -> tipo = $request->get('tipo');
        $banco -> nombre = $request->get('nombre');
        $banco -> codigoSBIF = $request->get('codigoSBIF');
        $banco -> codigoRegistro = $request->get('codigoRegistro');
        $banco -> update();
        return Redirect::to('Banco');
    }



    //ELIMINAR DATOS
    public function destroy($id)
    {
        $banco = DB::table('instituciones')->where('id', '=', $id)->delete();
        return Redirect::to('Banco');
    }


}
