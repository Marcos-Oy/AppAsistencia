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
            ->select('id', 'user_id', 'establecimiento_id', 'Fecha', 'horaInicio', 'horaFin', 'Observaciones')
            ->where('id','LIKE','%'.$query.'%')
            ->where('user_id','LIKE','%'.$query.'%')
            ->where('establecimiento_id','LIKE','%'.$query.'%')
            ->where('Fecha','LIKE','%'.$query.'%')
            ->where('horaInicio','LIKE','%'.$query.'%')
            ->where('horaFin','LIKE','%'.$query.'%')
            ->where('Observaciones','LIKE','%'.$query.'%')
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
        
        try{
            $actividad = new Actividades;       
            $actividad -> user_id = $request->get('user_id');
            $actividad -> establecimiento_id = $request->get('establecimiento_id');
            $actividad -> fecha = $request->get('Fecha');
            $actividad -> horainicio = $request->get('horaInicio');
            $actividad -> horafin = $request->get('horaFin');
            $actividad -> observaciones = $request->get('Observaciones');
        
           
            $actividad -> save();
            return Redirect::to('Actividades');

        }catch(Exception $e){
            
            return $e;
        
        }
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
        $actividad -> user_id = $request->get('user_id');
        $actividad -> establecimiento_id = $request->get('establecimiento_id');
        $actividad -> fecha = $request->get('Fecha');
        $actividad -> horainicio = $request->get('horaInicio');
        $actividad -> horafin = $request->get('horaFin');
        $actividad -> observaciones = $request->get('Observaciones');
        $actividad -> update();
        return Redirect::to('Actividades');
    }



    //ELIMINAR DATOS
    public function destroy($id)
    {
        $actividad = DB::table('Actividades')->where('id', '=', $id)->delete();
        return Redirect::to('Actividades');
    }


}
