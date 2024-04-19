<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\LogTransaccion;
use App\Genero;
use App\User;
use App\Rol;
use Auth;
use DB;
class UserController extends Controller
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
        $users = User::select('users.*', 'roles.nombre', 'roles.id as idRol', 'genero.nombreGenero')
        ->leftjoin('roles', 'roles.id', '=', 'users.idRolUsuario')
        ->leftjoin('genero', 'genero.idGenero', '=', 'users.idGenero')
        ->where('users.eliminado', 0)
        ->get();
        return view('backend.usuarios.index', compact('user', 'users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = Auth::user();
        $users = User::get();
        $roles = Rol::get();
        $generos = Genero::get();
        return view('backend.usuarios.create', compact('user', 'users', 'roles', 'generos'));
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
            if ($request->contrasena1 != $request->contrasena2) {
                toastr()->error('Contraseña no coincide');
                return redirect()->back()->withInput();
            }
            DB::beginTransaction();

            $usuario = new User();
            $usuario->fill($request->all());
            $usuario->password = Hash::make($request->contrasena1);

            if($request->hasFile('foto')){
                $nombreArchivo = "";
                $file =  $request['foto'];
                $nombreArchivo = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/backend/img/usuarios/', $nombreArchivo);
                $usuario->avatarImg = $nombreArchivo;
            }
            $usuario->save();

            $logTransaccion = new LogTransaccion();
            $logTransaccion->tipoTransaccion = 'Creacion de usuario';
            $logTransaccion->idUsuario =  Auth::user()->id;
            $logTransaccion->webclient = $request->userAgent();
            $logTransaccion->descripcionTransaccion = 'Creacion de usuario:'. $request->name. ' '.$request->apellido.
            ' Rut: '. $request->rut. ' Email: '. $request->email. ' Telefono: '. $request->telefono;
            $logTransaccion->save();

            DB::commit();
            toastr()->success('Usuario registrado exitosamente', 'Operación exitosa');
            return redirect('/users');
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
        $usuario = User::where('users.id', $id)->first();
        $roles = Rol::get();
        $generos = Genero::get();
        return view('backend.usuarios.edit', compact('user', 'users', 'roles', 'generos', 'usuario'));
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
            $usuario = User::where('id', $id)->firstOrFail();
            $usuario->fill($request->all());
            if($usuario->password == $request->contrasena1)
            {

            }
            else
            {
                $usuario->password = Hash::make($request->contrasena1);
            }
            if($request->hasFile('foto'))
            {
                $nombreArchivo = "";
                $file =  $request['foto'];
                $nombreArchivo = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/backend/img/usuarios/', $nombreArchivo);
                $usuario->avatarImg = $nombreArchivo;
            }
            $usuario->save();
            $logTransaccion = new LogTransaccion();
            $logTransaccion->tipoTransaccion = 'Actualizacion de usuario';
            $logTransaccion->idUsuario =  Auth::user()->id;
            $logTransaccion->webclient = $request->userAgent();
            $logTransaccion->descripcionTransaccion = 'Actualizacion de usuario:'. $request->name. ' '.$request->apellido.
            ' Rut: '. $request->rut. ' Email: '. $request->email. ' Telefono: '. $request->telefono;
            $logTransaccion->save();
            DB::commit();
            toastr()->success('Usuario actualizado exitosamente', 'Operación exitosa');
            return redirect('/users');
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

            $usuario = User::where('id', $request->id)->firstOrFail();
            $usuario->eliminado = 1;
            $usuario->save();

            $logTransaccion = new LogTransaccion();
            $logTransaccion->tipoTransaccion = 'Eliminacion de usuario';
            $logTransaccion->idUsuario =  Auth::user()->id;
            $logTransaccion->webclient = $request->userAgent();
            $logTransaccion->descripcionTransaccion = 'Eliminacion de usuario:'. $usuario->name. ' '.$usuario->apellido.
            ' Rut: '. $usuario->rut. ' Email: '. $usuario->email. ' Telefono: '. $usuario->telefono;
            $logTransaccion->save();

            DB::commit();
            toastr()->success('Usuario eliminado exitosamente', 'Operación exitosa');
            return redirect('/users');
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
