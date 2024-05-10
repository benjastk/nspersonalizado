<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\LogTransaccion;
use App\EjercicioRutina;
use App\Ejercicio;
use App\Rutina;
use App\User;
use App\Rol;
use Auth;
use DB;
class RutinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $rutinas = Rutina::select('rutinas_alumnos.*', 'users.name', 'users.apellido')
        ->join('users', 'users.id', '=', 'rutinas_alumnos.idUsuario')
        ->get();
        return view('backend.rutinas.index', compact('user', 'rutinas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = Auth::user();
        $users = User::where('eliminado', 0)->get();
        $ejercicios = Ejercicio::where('activado', 1)->get();
        return view('backend.rutinas.create', compact('user', 'users', 'ejercicios'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $rutina = new Rutina();
            $rutina->fill($request->all());
            $rutina->save();

            $logTransaccion = new LogTransaccion();
            $logTransaccion->tipoTransaccion = 'Creacion de rutina';
            $logTransaccion->idUsuario =  Auth::user()->id;
            $logTransaccion->webclient = $request->userAgent();
            $logTransaccion->descripcionTransaccion = 'Creacion de rutina: '. $request->nombreRutina. ' Usuario creador: '.$request->idUsuarioCreador.
            ' Usuario: '. $request->idUsuario;
            $logTransaccion->save();

            DB::commit();
            toastr()->success('Rutina creada exitosamente', 'Operación exitosa');
            return redirect('/rutinas');
        } catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado', 'Advertencia');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage(), 'Advertencia');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (\Exception $e) {
            toastr()->warning($e->getMessage(), 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $users = User::where('eliminado', 0)->get();
        $rutina = Rutina::where('id', $id)->first();
        $ejercicios = Ejercicio::where('activado', 1)->get();
        $asignadas = EjercicioRutina::where('idRutina', $id)->get();
        return view('backend.rutinas.edit', compact('user', 'rutina', 'users', 'ejercicios', 'asignadas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $rutina = Rutina::where('id', $id)->firstOrFail();
            $rutina->fill($request->all());
            $rutina->save();

            if($request->options)
            {
                $asignadas = EjercicioRutina::where('idRutina', $id)->get();
                if($asignadas)
                {
                    foreach ($asignadas as $item) 
                    {
                        $item->delete();
                    }
                }
                foreach ($request->options as $key => $value) 
                {
                    $asignadoNuevo = new EjercicioRutina();
                    $asignadoNuevo->idRutina = $id;
                    $asignadoNuevo->idEjercicio = $value;
                    $asignadoNuevo->save();
                }
            }
            else
            {
                $asignadas = EjercicioRutina::where('idRutina', $id)->get();
                if($asignadas)
                {
                    foreach ($asignadas as $item) 
                    {
                        $item->delete();
                    }
                }
            }

            $logTransaccion = new LogTransaccion();
            $logTransaccion->tipoTransaccion = 'Actualizacion de rutina';
            $logTransaccion->idUsuario =  Auth::user()->id;
            $logTransaccion->webclient = $request->userAgent();
            $logTransaccion->descripcionTransaccion = 'Actualizacion de rutina: '. $request->nombreRutina. ' Usuario creador: '.$request->idUsuarioCreador.
            ' Usuario: '. $request->idUsuario;
            $logTransaccion->save();
            DB::commit();
            toastr()->success('Rutina actualizada exitosamente', 'Operación exitosa');
            return redirect('/rutinas');
        } catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado', 'Advertencia');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage(), 'Advertencia');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (\Exception $e) {
            toastr()->warning($e->getMessage(), 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            DB::beginTransaction();

            $rutina = Rutina::where('id', $request->id)->firstOrFail();
            $rutina->activado = 0;
            $rutina->save();

            $logTransaccion = new LogTransaccion();
            $logTransaccion->tipoTransaccion = 'Eliminacion de rutina';
            $logTransaccion->idUsuario =  Auth::user()->id;
            $logTransaccion->webclient = $request->userAgent();
            $logTransaccion->descripcionTransaccion = 'Eliminacion de rutina: '. $rutina->nombreRutina. ' Usuario creador: '.$rutina->idUsuarioCreador.
            ' Usuario: '. $rutina->idUsuario;
            $logTransaccion->save();

            DB::commit();
            toastr()->success('Rutina eliminada exitosamente', 'Operación exitosa');
            return redirect('/rutinas');
        } catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado', 'Advertencia');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage(), 'Advertencia');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (\Exception $e) {
            toastr()->warning($e->getMessage(), 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }
}
