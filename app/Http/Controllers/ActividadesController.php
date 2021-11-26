<?php

namespace sis_Inventario\Http\Controllers;

use Illuminate\Http\Request;

use sis_Inventario\Http\Requests;

use sis_Inventario\Actividades;
use Illuminate\Support\Facades\Redirect;
use sis_Inventario\Http\Requests\ActividadesFormRequest;
use DB;
use Fpdf;

class ActividadesController extends Controller
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
            $actividad=DB::table('actividades')
            ->where('asiste','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('Actividades.index',["actividades"=>$actividad,"searchText"=>$query]);
        }
    }

    //redirigir a create html
    public function create()
    {
        return view("Actividades.create");
    }

    //insertar datos
    public function store(ActividadesFormRequest $request)
    {
        $actividad = new Actividades;       
        $actividad->asiste = $request->get('asiste');
        $actividad->save();
        return Redirect::to('Actividades');
    }


    //rederigir a actividad
    public function edit($id)
    {
        return view("Actividades.edit", ["Actividades" => Actividades::findOrFail($id)]);
    }


    //actualizar datos
    public function update(ActividadesFormRequest $request, $id)
    {
        $actividad = Actividades::findOrFail($id);
        $actividad-> asiste = $request->get('asiste');
        $actividad->update();
        return Redirect::to('Actividades');
    }



    //ELIMINAR DATOS
    public function destroy($id)
    {
        $actividad = DB::table('Actividades')->where('id', '=', $id)->delete();
        return Redirect::to('Actividades');
    }


}
