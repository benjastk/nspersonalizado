<div class="card-body">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <label>Ejercicio</label>
            @if(!isset($ejercicio->nombreEjercicio))
                <input type="text" name="nombreEjercicio" value="{{old('nombreEjercicio')}}" class="form-control" placeholder="Ejercicio" required>
            @else
                <input type="text" name="nombreEjercicio" value="{{ $ejercicio->nombreEjercicio }}" class="form-control" placeholder="Ejercicio" required>
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
        <label>Repeticiones</label>
            @if(!isset($ejercicio->repeticiones))
                <input type="number" name="repeticiones" value="{{old('repeticiones')}}" class="form-control" placeholder="Repeticiones" required >
            @else
                <input type="number" name="repeticiones" value="{{ $ejercicio->repeticiones }}" class="form-control" placeholder="Repeticiones" required >
            @endif
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
        <label>Series</label>
            @if(!isset($ejercicio->series))
                <input type="number" name="series" value="{{old('series')}}" class="form-control" placeholder="Series" required >
            @else
                <input type="number" name="series" value="{{ $ejercicio->series }}" class="form-control" placeholder="Series" required >
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <label>Activacion Muscular</label>
            @if(!isset($ejercicio->activacionMuscular))
                <input type="text" name="activacionMuscular" value="{{old('activacionMuscular')}}" class="form-control" placeholder="Activacion Muscular" required>
            @else
                <input type="text" name="activacionMuscular" value="{{ $ejercicio->activacionMuscular }}" class="form-control" placeholder="Activacion Muscular" required>
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <label>Descripcion</label>
            @if(!isset($ejercicio->descripcionEjercicio))
                <textarea class="form-control" name="descripcionEjercicio" id="summernote" rows="4" placeholder="Descripcion" >{{ old('descripcionEjercicio') }}</textarea>
            @else
                <textarea class="form-control" name="descripcionEjercicio" id="summernote" rows="4" placeholder="Descripcion" >{{ $ejercicio->descripcionEjercicio }}</textarea>
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="row">
                @if(!isset($ejercicio->imagen))
                <div class="col-12">
                    <label>Subir imagen</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen" id="imagen" accept="image/*">
                    <input type="hidden" class="form-control" name="imagenActual" id="imagenActual">
                </div>
                @else
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Subir imagen</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen" id="imagen" accept="image/*">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                <label>Imagen</label>
                    <div class="form-group" >
                        <img src="/img/ejercicios/{{ $ejercicio->imagen}}" width="150px" height="120px">
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="row">
                @if(!isset($ejercicio->video))
                <div class="col-12">
                    <label>Subir video</label>
                    <input type="file" class="form-control-file" id="video" name="video" id="video" accept="image/*">
                    <input type="hidden" class="form-control" name="imagenActual" id="imagenActual">
                </div>
                @else
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label>Subir video</label>
                    <input type="file" class="form-control-file" id="video" name="video" id="video" accept="image/*">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                <label>Video</label>
                    <div class="form-group" >
                        <video style="width: 100%" src="/videos/{{ $ejercicio->video}}" autoplay muted loop ></video>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6">
        </div>
    </div>
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
            
        