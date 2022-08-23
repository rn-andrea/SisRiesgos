@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Acción Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>

    <form action="/MantAccion/update/{{$accion->id}}" method="POST">
    @csrf
    {{method_field('PUT')}}
    <div class="row">
        <div class="col-sm">
        <label for="txtAccion">Descripción de la Acción</label>
            <input type="text" class="form-control {{$errors->has('nombre_accion')?'is-invalid':'' }}" id="txtAccion" name="nombre_accion" placeholder="Descipción de la acción de riesgo" value="{{$accion->nombre_accion}}">
            {!! $errors->first('nombre_accion','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Observación</label>
            <textarea class="form-control {{$errors->has('observacion')?'is-invalid':'' }}" id="txtDetalleRiesgo" rows="3" name="observacion">{{$accion->des_observacion}}</textarea>
        </div>
    </div>

    <div class="row">
                <div class="col-sm">
				<input class="form-check-input" type="hidden" value="2" name="estado" >
                <input class="form-check-input" type="checkbox" value="1" name="estado" id="defaultCheck3" checked>
                    <label class="form-check-label" for="Activo">
                        Estado Activo
                    </label>
                   
                    
    </div>
   
    
    <div class="row">
    <div class="col-sm"></div>
        <div class="col-sm">
            <button type="submit" id="btnAccionRiesgMod" class="btn btn-primary my-1">Actualizar Acción</button>
        </div>    
        <div class="col-sm"></div>
    </div>
    </form>
    </br>
    
    <div class="row">
    <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID Consecutivo</th>
                            <th>Descripción Acción</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Consecutivo</th>
                            <th>Descripción Acción</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <td>Estado</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($accions as $Accion)
                             <tr>
								<td>{{$Accion->id}}</td>
								<td>{{$Accion->nombre_accion}}</td>
								<td>{{$Accion->des_observacion}}</td>
                                <td>{{$Accion->created_at}}</td>
                                <td>{{$Accion->usuario->usr_nombre}} {{$Accion->usuario->usr_apellidos}}</td>
                                <td>{{$Accion->updated_at}}</td>
                                <td>{{$Accion->usuario1->usr_nombre}} {{$Accion->usuario1->usr_apellidos}}</td>
                                <td>{{$Accion->estado->nom_estado}}</td>
                               
                            </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</html>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Agregar')=='ok')
        <script>
             Swal.fire('Acción de riesgo registrada con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el nombre de la acción de riesgo', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el nombre de la acción de riesgo', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
    @if (session('Modifica')=='info')
        
        <script>
             Swal.fire('No ha realizado ningun cambio a la acción de riesgo seleccionada', '', 'info')
        </script>
    @endif
@endsection