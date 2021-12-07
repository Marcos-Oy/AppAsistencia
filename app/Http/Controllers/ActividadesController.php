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
        if ($request) {
            $query=trim($request->get('searchText'));
            
            $f1=trim($request->get('FechaD'));
            $f2=trim($request->get('FechaH'));

            /*if ($f1 == null || $f2 == null) {
                $f1 = $f2 = date('Y-m-d');
            }*/

            $usuarios=DB::table('users')->get();
            $actividad=DB::table('actividades as a')
            ->join('users as usu', 'usu.id', '=', 'a.user_id')
            ->join('establecimiento as b', 'b.idestablecimiento', '=', 'a.establecimiento_id')
            ->select(
                'a.id',
                'a.user_id',
                'usu.name',
                'b.descestablecimiento',
                'a.Fecha',
                'a.HoraInicio',
                'a.HoraFin',
                'a.establecimiento_id',
                'a.Observaciones'
            )
                
            ->whereBetween('a.Fecha', [$f1, $f2])
            ->where('usu.id', '=', $query)
            
            
            ->orderBy('Fecha')

            ->paginate(7);
            return view('Actividades.index', ["usuarios"=>$usuarios,"actividades"=>$actividad,"searchText"=>$query,"FechaD" => $f1, "FechaH" => $f2]);
        }
    }
    

    //redirigir a create html
    public function create()
    {
        $establecimiento=DB::table('establecimiento')->get();
        $usuarios=DB::table('users')->get();
        return view("Actividades.create", ["establecimiento"=>$establecimiento, "usuarios"=>$usuarios]);
    }

    //insertar datos
    public function store(ActividadesFormRequest $request)
    {
        try {
            $actividad = new Actividades;
            $actividad -> user_id = $request->get('user_id');
            $actividad -> establecimiento_id = $request->get('idestablecimiento');
            $actividad -> Fecha = $request->get('Fecha');
            $actividad -> HoraInicio = $request->get('HoraInicio');
            $actividad -> HoraFin = $request->get('HoraFin');
            $actividad -> Observaciones = $request->get('Observaciones');
        
           
            $actividad -> save();
            return Redirect::to('Actividades');
        } catch (Exception $e) {
            return $e;
        }
    }


    //rederigir a actividad
    public function edit($id)
    {
        $establecimiento=DB::table('establecimiento')->get();
        $usuarios=DB::table('users')->get();
        return view("Actividades.edit", ["establecimiento"=>$establecimiento, "usuarios"=>$usuarios, "Actividades" => Actividades::findOrFail($id)]);
    }


    //actualizar datos
    public function update(ActividadesFormRequest $request, $id)
    {
        $actividad = Actividades::findOrFail($id);
        $actividad -> user_id = $request->get('user_id');
        $actividad -> establecimiento_id = $request->get('establecimiento_id');
        $actividad -> Fecha = $request->get('Fecha');
        $actividad -> HoraInicio = $request->get('HoraInicio');
        $actividad -> HoraFin = $request->get('HoraFin');
        $actividad -> Observaciones = $request->get('Observaciones');
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
