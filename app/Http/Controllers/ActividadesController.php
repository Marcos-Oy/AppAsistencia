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

    public function create()
    {
        return view("Actividades.create");
    }
    public function store(ActividadesFormRequest $request)
    {
        $actividad = new User;       
        $actividad->name = $request->get('asiste');
        $actividad->save();
        return Redirect::to('Actividades');
    }

    public function edit($id)
    {
        return view("Actividades.edit", ["Actividades" => User::findOrFail($id)]);
    }
    public function update(ActividadesFormRequest $request, $id)
    {
        $actividad = User::findOrFail($id);
        $actividad->name = $request->get('asiste');
        $actividad->update();
        return Redirect::to('Actividades.index');
    }
    public function destroy($id)
    {
        $actividad = DB::table('Actividades')->where('id', '=', $id)->delete();
        return Redirect::to('Actividades.index');
    }


}
