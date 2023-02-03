@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pensamientos') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="">
                        <div class="form-group">
                            <label for="pensamiento">Ahora estoy pensando en:</label>
                            <input type="text" class="form-control" name="pensamiento">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar pensamiento</button>
                </div>
            </div>

            <br>
            <br>
            <div class="card">
                <div class="card-header">{{ __('Publicado el 03/02/2023') }}</div>

                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem laborum dolores perferendis aliquam
                        nisi, natus quaerat aut hic vel sed optio ea consequatur illo corrupti molestiae consectetur id
                        temporibus debitis.</p>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-secondary">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection