<div class="card-body">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <label>Nombre Rutina</label>
            @if(!isset($rutina->nombreRutina))
                <input type="text" name="nombreRutina" value="{{old('nombreRutina')}}" class="form-control" placeholder="Rutina" required>
            @else
                <input type="text" name="nombreRutina" value="{{ $rutina->nombreRutina }}" class="form-control" placeholder="Rutina" required>
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Fecha de inicio</label>
            @if(!isset($rutina->fechaInicio))
                <input type="date" name="fechaInicio" id="fechaInicio" value="{{ old('fechaInicio') }}" class="form-control" required >
            @else
                <input type="date" name="fechaInicio" id="fechaInicio"class="form-control" value="{{$rutina->fechaInicio}}" required>
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <label>Fecha de termino</label>
            @if(!isset($rutina->fechaFin))
                <input type="date" name="fechaFin" id="fechaFin" value="{{ old('fechaFin') }}" class="form-control" required >
            @else
                <input type="date" name="fechaFin" id="fechaFin"class="form-control" value="{{$rutina->fechaFin}}" required>
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <label>Alumno</label>
            @if( !isset($rutina->idUsuario))
                <select name="idUsuario" class="form-control" required>
                    <option value="">Seleccione un alumno</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->rut}} - {{ $user->name }} {{ $user->apellido }}</option>
                    @endforeach
                </select>
            @else
                <select name="idTipoContrato" class="form-control" required>
                    <option value="">Seleccione un alumno</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ ($user->id== $rutina->idUsuario) ? 'selected' :'' }}>{{ $user->rut}} - {{ $user->name }} {{ $user->apellido }}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <label>Elementos de la rutina:</label>
            <br>
            @if(!isset($asignadas))
                @if($ejercicios)
                @foreach($ejercicios as $ejercicio)
                    <input type="checkbox" name="options[]" value="{{ $ejercicio->id }}"/> {{ $ejercicio->nombreEjercicio }}<br/>
                @endforeach
                @endif
            @else
                @if($asignadas->isEmpty())
                    @foreach ($ejercicios as $ejercicio)
                        <input type="checkbox" name="options[]" value="{{ $ejercicio->id }}"/> {{ $ejercicio->nombreEjercicio }}<br/>
                    @endforeach
                @else
                    @foreach ($ejercicios as $ejercicio)
                        @php($encontrado = false)
                            @foreach ($asignadas as $asignada)
                                @if($ejercicio->id == $asignada->idEjercicio)
                                    @php($encontrado = true)
                                    <input type="checkbox" name="options[]" value="{{ $ejercicio->id }}" checked /> {{ $ejercicio->nombreEjercicio }}<br/>        
                                    @break
                                @endif
                            @endforeach
                        @if($encontrado == false)
                        <input type="checkbox" name="options[]" value="{{ $ejercicio->id }}"/> {{ $ejercicio->nombreEjercicio }}<br/>
                        @endif
                    @endforeach
                @endif
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12" style="text-align:center">
            <a href="/users" class="btn btn-danger waves-effect waves-light" style="margin-right: 10px">
                <i class="bx bx-arrow-back font-size-16 align-middle mr-2"></i> Volver
            </a>
            <button type="submit" class="btn btn-success waves-effect waves-light">
                <i class="bx bxs-user-check font-size-16 align-middle mr-2"></i> Guardar
            </button>
        </div>
    </div>
</div>
            
        