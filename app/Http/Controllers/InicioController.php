<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormularioContacto;
use App\Mail\FormularioContacto as MailFormulario;
use Illuminate\Support\Facades\Mail;
use Session;
use DB;
class InicioController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
    public function contactoController(Request $request)
    {
        try{
            DB::beginTransaction();
            $formulario = new FormularioContacto();
            $formulario->fill($request->all());
            $formulario->save();
            
            $formularioDos = FormularioContacto::select('formulario_contacto.*')
            ->where('formulario_contacto.id', $formulario->id)
            ->first();
            
            Mail::to(['admin@benjaminperez.cl'])
            ->send(new MailFormulario($formularioDos));
            DB::commit();
            toastr()->success('Formulario enviado exitosamente, pronto te contactaremos.', 'Operación exitosa');
            return redirect('/');
        } catch (ModelNotFoundException $e) {
            toastr()->warning('No autorizado', 'Advertencia');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (QueryException $e) {
            toastr()->warning('Ha ocurrido un error, favor intente nuevamente' . $e->getMessage(), 'Advertencia');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (DecryptException $e) {
            toastr()->info('Ocurrio un error al intentar acceder al recurso solicitado', 'Información');
            DB::rollback();
            return back()->withInput($request->all());
        } catch (\Exception $e) {
            toastr()->warning($e->getMessage(), 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }
}
