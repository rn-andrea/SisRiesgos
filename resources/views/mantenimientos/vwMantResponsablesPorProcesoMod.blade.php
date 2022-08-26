@extends('vwMainTemplate')
@section('contenido')
<html>
</br>
<script runat="server">


   </script>
   <body>
<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Responsables por Proceso que Afecta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
        <form action="/MantResponsablesProcesoAfecta/update/{{$responsablesproceso->id}}" method="POST">
        @csrf
        {{method_field('PUT')}}
       
            <div class="row">
                <div class="col-sm">
                <label for="selectProceso">Proceso que Afecta</label>
                <select id="selectProceso" class="form-control" name="ID_PROCESO_AFECTA" >
                <option value="{{$responsablesproceso['id_proceso_afecta']}}">{{$responsablesproceso->procesoafecta->nom_proceso_afecta}}</option>
                @foreach ($procesoafectaf as $proceso)
                
                        <option value="{{$proceso['id']}}">{{$proceso['nom_proceso_afecta']}}</option>
                   @endforeach
                </select>

            </div>

          </div>
        </br>
           <div class="row">
                <div class="col-sm">
                <label for="selectRresponsable">Asignar Responsable</label>
                <select id="selectResponsable" class="form-control" name="ID_RESPONSABLE" >
                <option value="{{$responsablesproceso['usr_responsable_proceso']}}">{{$responsablesproceso->usuario->usr_nombre}} {{$responsablesproceso->usuario->usr_apellidos}}</option>
                   @foreach ($usuariorespon as $usuario)
                        <option value="{{$usuario['id_usuario']}}"> {{$usuario['usr_nombre']}} {{$usuario['usr_apellidos']}}</option>
                   @endforeach
                </select>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-sm">
				<input class="form-check-input" type="hidden" value="2" name="IND_ESTADO" >
                <input class="form-check-input" type="checkbox" value="1" name="IND_ESTADO" id="defaultCheck3" checked>
                    <label class="form-check-label" for="Activo">
                        Estado Activo
                    </label>
                   
        </div>
            <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRCREACION"  name="USR_CREACION" value="305050002"> 
            </div>
            <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="USR_MODIFICA" value="305050002">
           


            </div>
    
    </br>
        </br>
            <div class="row">
            <div class="col-sm" ></div>
                <div class="col-sm">
                    <button type="submit" onserverclick="Button_Click" class="btn btn-primary my-1">Actualizar Responsable</button>
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
                            <th>ID</th>
                            <th>Proceso que Afecta</th>
                            <th>Responsable del proceso</th>
                            <th>Fecha de asignación</th>
                            <th>Usuario Creador</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($responsablesprocesos as $responsable)
							<tr>
                                <td>{{$responsable->id}}</td>
								<td>{{$responsable->procesoafecta->nom_proceso_afecta}}</td>
                                <td>{{$responsable->usuario->usr_nombre}} {{$responsable->usuario->usr_apellidos}}</td>
                                <td>{{$responsable->created_at}}</td>
                                <td>{{$responsable->usuariocre->usr_nombre}} {{$responsable->usuario->usr_apellidos}}</td>
                                <td>{{$responsable->updated_at}}</td>
                                <td>{{$responsable->usuariomod->usr_nombre}} {{$responsable->usuario->usr_apellidos}}</td>
                                <td>{{$responsable->estado->nom_estado}}</td>
                                		
							 </tr>
					@endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
<script>

</script>

<form action="/logout" method="POST">
                        @csrf
    <a id="apresionar" onclick="this.closest('form').submit()" href="#!">Cerrar Sesión</a>
 <?php
        try {
         $correo = auth()->user()->email;
         $consulta = DB::table('usuarios')->select('ID_ROL')->where('USR_EMAIL',$correo)->value('ID_ROL');
        if($consulta=='2')
        {
            echo '<script>document.body.style.display = "none";</script>';
            echo '<script>alert("Usted no tiene permisos para acceder a esta página, debe loguearse como un usuario Administrativo");</script>';
            echo '<script>document.getElementById("apresionar").click();</script>';
        }
        } catch (Exception $e) {

        }
        ?>
        </form>
</body>
</html>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Agregar')=='ok')
        <script>
             Swal.fire('Responsable de proceso que afecta registrado con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/> El responsable por el proceso que afecta ya existe', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el responsable por el proceso que afecta', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
    <script>
      $('.formulario-agregar').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
         
          this.submit();
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
        })
      });
    </script>
@endsection
