@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Proceso Afecta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantProcesoAfecta/update/{{$ProcesoAfecta->id}}" method="POST">
	@csrf
    {{method_field('PUT')}}
     <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Nomenclatura del Proceso que Afecta</label>
            <input type="text" class="form-control {{$errors->has('id_nomenclatura')?'is-invalid':'' }}" id="txtClasificacion" placeholder="" name="id_nomenclatura" value="{{$ProcesoAfecta->id_nomenclatura}}">
            {!! $errors->first('id_nomenclatura','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Proceso que Afecta</label>
            <input type="text" class="form-control {{$errors->has('nombre_proceso_afecta')?'is-invalid':'' }}" id="txtClasificacion" placeholder="" name="nombre_proceso_afecta"  value="{{$ProcesoAfecta->nom_proceso_afecta}}">
            {!! $errors->first('nombre_proceso_afecta','<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="row">
    
        <div class="col-sm">
        <label for="txtClasificacion">Observación</label>
            <textarea class="form-control {{$errors->has('observacion')?'is-invalid':'' }}" id="txtDetalleRiesgo" rows="3" name="observacion">{{$ProcesoAfecta->des_observacion}}</textarea>
            {!! $errors->first('observacion','<div class="invalid-feedback">:message</div>') !!}
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
    
    
 
    <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRCREACION"  name="usr_creacion" value="305050002"> 
            </div>
            <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="usr_modifica" value="305050002">
            </div> </div>  
    
    </br>
    <div class="row">
    <div class="col-sm"></div>
        <div class="col-sm">
            <button type="submit" id="btnProcesoAfecta" class="btn btn-primary my-1">Actualizar Proceso</button>
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
                            <th>ID </th>
                            <th>Nomenclatura</th>
                            <th>Nombre Proceso</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <th>Estado</th>
                           
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID </th>
                            <th>Nomenclatura</th>
                            <th>Nombre Categoria</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <td>Estado</td>
                    
                            
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($ProcesoAfectas as $ProcesoAfecta)
                             <tr>
                                <td>{{$ProcesoAfecta->id}}</td>
								<td>{{$ProcesoAfecta->id_nomenclatura}}</td>
								<td>{{$ProcesoAfecta->nom_proceso_afecta}}</td>
								<td>{{$ProcesoAfecta->des_observacion}}</td>
                                <td>{{$ProcesoAfecta->created_at}}</td>
                                <td>{{$ProcesoAfecta->usuario->usr_nombre}} {{$ProcesoAfecta->usuario->usr_apellidos}}</td>
                                <td>{{$ProcesoAfecta->updated_at}}</td>
                                <td>{{$ProcesoAfecta->usuario1->usr_nombre}} {{$ProcesoAfecta->usuario1->usr_apellidos}}</td>
                                <td>{{$ProcesoAfecta->estado->nom_estado}}</td>
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
             Swal.fire('El proceso afecta fue registrado con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/> La nomenclatura del proceso afecta ya existe', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe la nomenclatura del proceso afecta', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
@endsection