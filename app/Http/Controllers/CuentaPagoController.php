<?php

namespace sis_Inventario\Http\Controllers;

use Illuminate\Http\Request;

use sis_Inventario\Http\Requests;

use sis_Inventario\Banco;
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
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $cuentapago=DB::table('cuenta_pago as c')
            ->join('instituciones as i','i.id','=','c.instituciones_id')
            ->join('users as usu', 'usu.id', '=', 'usu.users_id')

            ->select('i.id', 'i.tipo', 'i.nombre','c.nmro_cuenta','usu.name', 'usu.role', 'usu.email', 'usu.phone')

            ->orwhere('i.id','LIKE','%'.$query.'%')
            ->orwhere('i.tipo','LIKE','%'.$query.'%')
            ->orwhere('i.nombre','LIKE','%'.$query.'%')
            ->orwhere('c.nmro_cuenta','LIKE','%'.$query.'%')
            ->orwhere('usu.name','LIKE','%'.$query.'%')
            ->orwhere('usu.role','LIKE','%'.$query.'%')
            ->orwhere('usu.email','LIKE','%'.$query.'%')
            ->orwhere('usu.phone','LIKE','%'.$query.'%')

            ->orderBy('id','desc')
            ->paginate(7);
            return view('CuentaPago.index',["cuentapago"=>$cuentapago,"searchText"=>$query]);
        }
    }

    //redirigir a create html
    public function create()
    {
        return view("CuentaPago.create");
    }

    //insertar datos
    public function store(CuentaPagoFormRequest $request)
    {
        
        try{
            $cuentapago = new CuentaPago;       
            $cuentapago -> tipo = $request->get('tipo');
            $cuentapago -> codigoSBIF = $request->get('codigoSBIF');
            $cuentapago -> codigoRegistro = $request->get('codigoRegistro');
            $cuentapago -> nombre = $request->get('nombre');
        
            $cuentapago -> save();
            return Redirect::to('CuentaPago');

        }catch(Exception $e){
            
            return $e;
        
        }
    }


    //rederigir a actividad
    public function edit($id)
    {
        return view("CuentaPago.edit", ["cuentapago" => CuentaPago::findOrFail($id)]);
    }


    //actualizar datos
    public function update(CuentaPagoFormRequest $request, $id)
    {
        $cuentapago = CuentaPago::findOrFail($id);
        $cuentapago -> tipo = $request->get('tipo');
        $cuentapago -> nombre = $request->get('nombre');
        $cuentapago -> codigoSBIF = $request->get('codigoSBIF');
        $cuentapago -> codigoRegistro = $request->get('codigoRegistro');
        $cuentapago -> update();
        return Redirect::to('CuentaPago');
    }



    //ELIMINAR DATOS
    public function destroy($id)
    {
        $cuentapago = DB::table('cuenta_pago')->where('id', '=', $id)->delete();
        return Redirect::to('CuentaPago');
    }


}
