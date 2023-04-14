@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subir nueva imagen</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="from-group row row mb-3">
                            <label for="image_path" class="col-md-3 col-form-label text-md-end">Imagen</label>
                            <div class="col-md-6">
                                <input id="image_path" type="file" name="image_path" class="form-control {{ $errors->has('image_path') ? 'is-invalid' : ' ' }}" required />

                                @if($errors->has('image_path'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_path') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="from-group row row mb-3">
                            <label for="description" class="col-md-3 col-form-label text-md-end">Descripción</label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ' ' }}" required></textarea>

                                @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="from-group row row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Subir imagen" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection