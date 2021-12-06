<?php

namespace sis_Inventario\Http\Controllers;

use Illuminate\Http\Request;

use sis_Inventario\Http\Requests;

use sis_Inventario\Establecimiento;
use Illuminate\Support\Facades\Redirect;
use sis_Inventario\Http\Requests\EstablecimientoFormRequest;
use DB;
use Fpdf;

class EstablecimientoController extends Controller
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
            $establecimiento=DB::table('establecimiento')
            ->select('idestablecimiento', 'descestablecimiento')
            ->orwhere('idestablecimiento','LIKE','%'.$query.'%')
            ->orwhere('descestablecimiento','LIKE','%'.$query.'%')
            ->orderBy('idestablecimiento','desc')
            ->paginate(7);
            return view('Establecimiento.index',["establecimiento"=>$establecimiento,"searchText"=>$query]);
        }
    }

    //redirigir a create html
    public function create()
    {
        return view("Establecimiento.create");
    }

    //insertar datos
    public function store(EstablecimientoFormRequest $request)
    {
        
        try{
            $establecimiento = new Establecimiento;       
            $establecimiento -> descestablecimiento = $request->get('descestablecimiento');
        
            $establecimiento -> save();
            return Redirect::to('Establecimiento');

        }catch(Exception $e){
            
            return $e;
        
        }
    }


    //rederigir a actividad
    public function edit($id)
    {
        return view("Establecimiento.edit", ["Establecimiento" => Establecimiento::findOrFail($id)]);
    }


    //actualizar datos
    public function update(EstablecimientoFormRequest $request, $id)
    {
        $establecimiento = Establecimiento::findOrFail($id);
        $establecimiento -> descestablecimiento = $request->get('descestablecimiento');
        $establecimiento -> update();
        return Redirect::to('Establecimiento');
    }



    //ELIMINAR DATOS
    public function destroy($id)
    {
        $establecimiento = DB::table('Establecimiento')->where('idestablecimiento', '=', $id)->delete();
        return Redirect::to('Establecimiento');
    }


}
