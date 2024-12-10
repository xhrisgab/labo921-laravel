@extends('base');

@section('content')
<div>
    <div class="container">
        <h2>Generar Reporte</h2>
        <form action="/reporte" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-3">
                    <label for="select-host" class="">seleccione un Host...</label>
                    <select class="form-select form-select mb-3" aria-label="Default"  name="host" id="host" value="{{old('host')}}">
                        @foreach ($hosts as $host)
                            <option value="{{$host->enlace}}">{{$host->enlace}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3 ">
                    <label for="from-date">Desde:</label>
                    <input type="date" class="form-control" name="dateFrom" id="dateFrom" value="{{old('dateFrom')}}" required>
                </div>
                <div class="col-3 ">
                    <label for="from-date">Hasta:</label>
                    <input type="date" class="form-control" name="dateTo" id="dateTo" value="{{old('dateTo')}}" required>
                </div>
                <button type="Submit" class="btn btn-success col-auto" >Aceptar</button>
            </div>
        </form>
    </div>


    <div class="container">
    <h2>Host Registrados:</h2>
    <br>

    <div class="table-responsive-md">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre de Host</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $hosts as $host )
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $host->enlace }}</td>
                    <td><a href="/ping/{{ $host->enlace }}">Verificar enlace...</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
</div>

@endsection
