@extends('home.home')

@section('content')
    <div class="card card-spacing" style="margin-left: 30px">
        <canvas id="draw-canvas" width="420" height="160">
            No tienes un buen navegador.
        </canvas>

        <div>
            <input type="submit" class="btn btn-success" value="Limpiar" id="draw-clearBtn">
            <input type="submit" class="btn btn-success" value="Agregar" id="guardar_mant">

        </div>
    </div>
@endsection
