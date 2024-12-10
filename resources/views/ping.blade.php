@extends('base');

@section('content')

<div class="container">
    <br>

    <h2>Estado de Enlace:</h2>

    <div class="card">
        <div class="card-header">
            {{$host}}
        </div>
        <div class="card-body">
            <h5 class="card-title">Estado del enlace:
                @if ($estado)
                    <span class="text-success">On Line!</span>
                @else
                    <span class="text-danger">Off Line!</span>
                @endif

            </h5>
            <p class="card-text"><?php echo $fichero ?></p>
            <a href="/" class="btn btn-primary">Volver...</a>
        </div>
    </div>
</div>

@endsection
