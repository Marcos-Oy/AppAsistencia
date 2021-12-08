<?php

namespace sis_Inventario\Http\Controllers;

use Illuminate\Http\Request;

use sis_Inventario\Http\Requests;

use sis_Inventario\CuentaPago;
use Illuminate\Support\Facades\Redirect;
use sis_Inventario\Http\Requests\CuentaPagoFormRequest;
use DB;
use Fpdf;

class CuentaPagoController extends Controller
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
            $cuentapago=DB::table('cuenta_pago as c')
            ->join('instituciones as i', 'i.id', '=', 'c.instituciones_id')
            ->join('users as usu', 'usu.id', '=', 'c.users_id')

            ->select('c.nmro_cuenta', 'i.id', 'i.tipo', 'i.nombre', 'usu.name', 'usu.role', 'usu.email', 'usu.phone', 'c.tipo_cuenta')

            ->orwhere('i.id', 'LIKE', '%'.$query.'%')
            ->orwhere('i.tipo', 'LIKE', '%'.$query.'%')
            ->orwhere('i.nombre', 'LIKE', '%'.$query.'%')
            ->orwhere('c.nmro_cuenta', 'LIKE', '%'.$query.'%')
            ->orwhere('usu.name', 'LIKE', '%'.$query.'%')
            ->orwhere('usu.role', 'LIKE', '%'.$query.'%')
            ->orwhere('usu.email', 'LIKE', '%'.$query.'%')
            ->orwhere('usu.phone', 'LIKE', '%'.$query.'%')
            ->orwhere('c.tipo_cuenta', 'LIKE', '%'.$query.'%')

            ->orderBy('id', 'desc')
            ->paginate(7);
            return view('CuentaPago.index', ["cuentapago"=>$cuentapago,"searchText"=>$query]);
        }
    }

    //redirigir a create html
    public function create()
    {
        $banco=DB::table('instituciones')->get();
        $usuarios=DB::table('users')->get();
        return view("CuentaPago.create", ["banco"=>$banco, "usuarios"=>$usuarios]);
    }

    //insertar datos
    public function store(CuentaPagoFormRequest $request)
    {
        try {
            $cuentapago = new CuentaPago;
            $cuentapago -> nmro_cuenta = $request->get('nmro_cuenta');
            $cuentapago -> instituciones_id = $request->get('instituciones_id');
            $cuentapago -> users_id = $request->get('users_id');
            $cuentapago -> tipo_cuenta = $request->get('tipo_cuenta');
            $cuentapago -> save();
            return Redirect::to('CuentaPago');
        } catch (Exception $e) {
            return $e;
        }
    }


    
    public function edit($id)
    {
        $cuentapago=CuentaPago::findOrFail($id);
        $usuarios=DB::table('users')->get();
        return view("CuentaPago.edit", ["cuentapago" => $cuentapago, "usuarios"=>$usuarios]);
    }


    //actualizar datos
    public function update(CuentaPagoFormRequest $request, $id)
    {
        $cuentapago = CuentaPago::findOrFail($id);
        $cuentapago -> nmro_cuenta = $request->get('nmro_cuenta');
        $cuentapago -> instituciones_id = $request->get('instituciones_id');
        $cuentapago -> users_id = $request->get('users_id');
        $cuentapago -> tipo_cuenta = $request->get('tipo_cuenta');
        $cuentapago -> update();
        return Redirect::to('CuentaPago');
    }



    //ELIMINAR DATOS
    public function destroy($id)
    {
        $cuentapago = DB::table('cuenta_pago')->where('nmro_cuenta', '=', $id)->delete();
        return Redirect::to('CuentaPago');
    }
}
