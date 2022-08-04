<html>
	<body>
			<h1>Usuarios</h1>

			<div class="card-body">
				<table class='table'>
					<thead>
						<th>Codigo usuario</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Correo Electronico</th>
						<th>Rol</th>
						<th>Estado</th>
					</thead>
					<tbody>
						@foreach($usuarios as $usuario)
							<tr>
								<td>{{$usuario->ID_USUARIO}}</td>
								<td>{{$usuario->USR_NOMBRE}}</td>
								<td>{{$usuario->USR_APELLIDOS}}</td>
								<td>{{$usuario->USR_EMAIL}}</td>
								<td>{{$usuario->ID_ROL}}</td>
								<td>{{$usuario->IND_ESTADO}}</td>
							 </tr>
						@endforeach
					</tbody>	
				</table>
			</div>
		
		<ul>
			@foreach($usuarios as $usuario)
				<li>
					{{$usuario->ID_USUARIO}}
				</li>
			@endforeach
		</ul>
		
		

   </body>
</html>