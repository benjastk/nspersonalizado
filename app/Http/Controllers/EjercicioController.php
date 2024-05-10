<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\LogTransaccion;
use App\Ejercicio;
use App\Genero;
use App\User;
use App\Rol;
use Auth;
use DB;
class EjercicioController extends Controller
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
        $ejercicios = Ejercicio::where('activado', 1)
        ->get();
        return view('backend.ejercicios.index', compact('user', 'ejercicios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = Auth::user();
        return view('backend.ejercicios.create', compact('user'));
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

            $ejercicio = new Ejercicio();
            $ejercicio->fill($request->all());
            if($request->hasFile('video'))
            {
                $file = $request->file('video');
                $filename = $file->getClientOriginalName();
                $path = public_path().'/videos/';
                $file->move($path, $filename);
                $ejercicio->video = $filename;
            }
            if($request->hasFile('imagen'))
            {
                $file2 = $request->file('imagen');
                $filename2 = $file2->getClientOriginalName();
                $path2 = public_path().'/img/ejercicios/';
                $file2->move($path2, $filename2);
                $ejercicio->imagen = $filename2;
            }
            $ejercicio->save();

            $logTransaccion = new LogTransaccion();
            $logTransaccion->tipoTransaccion = 'Creacion de ejercicio';
            $logTransaccion->idUsuario =  Auth::user()->id;
            $logTransaccion->webclient = $request->userAgent();
            $logTransaccion->descripcionTransaccion = 'Creacion de ejercicio: '. $request->nombreEjercicio. ' Repeticiones: '.$request->repeticiones.
            ' Series: '. $request->series;
            $logTransaccion->save();

            DB::commit();
            toastr()->success('Ejercicio creado exitosamente', 'Operación exitosa');
            return redirect('/ejercicios');
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
        $ejercicio = Ejercicio::where('id', $id)->first();
        return view('backend.ejercicios.edit', compact('user', 'ejercicio'));
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
            $ejercicio = Ejercicio::where('id', $id)->firstOrFail();
            $ejercicio->fill($request->all());
            if($request->hasFile('video'))
            {
                $file = $request->file('video');
                $filename = $file->getClientOriginalName();
                $path = public_path().'/videos/';
                $file->move($path, $filename);
                $ejercicio->video = $filename;
            }
            if($request->hasFile('imagen'))
            {
                $file2 = $request->file('imagen');
                $filename2 = $file2->getClientOriginalName();
                $path2 = public_path().'/img/ejercicios/';
                $file2->move($path2, $filename2);
                $ejercicio->imagen = $filename2;
            }
            $ejercicio->save();
            $logTransaccion = new LogTransaccion();
            $logTransaccion->tipoTransaccion = 'Actualizacion de ejercicio';
            $logTransaccion->idUsuario =  Auth::user()->id;
            $logTransaccion->webclient = $request->userAgent();
            $logTransaccion->descripcionTransaccion = 'Actualizacion de ejercicio: '. $request->nombreEjercicio. ' Repeticiones: '.$request->repeticiones.
            ' Series: '. $request->series;
            $logTransaccion->save();
            DB::commit();
            toastr()->success('Ejercicio actualizado exitosamente', 'Operación exitosa');
            return redirect('/ejercicios');
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

            $ejercicio = Ejercicio::where('id', $request->id)->firstOrFail();
            $ejercicio->activado = 0;
            $ejercicio->save();

            $logTransaccion = new LogTransaccion();
            $logTransaccion->tipoTransaccion = 'Eliminacion de ejercicio';
            $logTransaccion->idUsuario =  Auth::user()->id;
            $logTransaccion->webclient = $request->userAgent();
            $logTransaccion->descripcionTransaccion = 'Eliminacion de ejercicio: '. $ejercicio->nombreEjercicio. ' Repeticiones: '.$ejercicio->repeticiones.
            ' Series: '. $ejercicio->series;
            $logTransaccion->save();

            DB::commit();
            toastr()->success('Ejercicio eliminado exitosamente', 'Operación exitosa');
            return redirect('/ejercicios');
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
