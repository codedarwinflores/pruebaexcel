<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>CRUD PHP PDO BootStrap Modal: Ejemplo Completo | BaulPHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="./">Darwin</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="./">INICIO <span class="sr-only">(current)</span></a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<div class="container">
		<h1 class="page-header text-center">CRUD PHP PDO BootStrap Modal</h1>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Nuevo Registro</a>
				<?php
				session_start();
				if (isset($_SESSION['message'])) {
				?>
					<div class="alert alert-info text-center" style="margin-top:20px;">
						<?php echo $_SESSION['message']; ?>
					</div>
				<?php

					unset($_SESSION['message']);
				}
				?>
				<br><br>
				<form action="POST">
					<div class="row">
						<div class="col-md-6">
							<div class="dropdown">
								<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									Excel
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<li><a href="javascript:();" onclick="imprimir('xlsx')">.xlsx</a></li>
									<li><a href="javascript:();" onclick="imprimir('xls')">.xls</a></li>
									<li><a href="javascript:();" onclick="imprimir('csv')">.csv</a></li>

								</ul>
							</div>

						</div>
					</div>
				</form>
				<table class="table table-bordered table-striped" style="margin-top:20px;">
					<thead>
						<th>ID</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Telefono</th>
						<th>Carrera</th>
						<th>Pais</th>
						<th>Acción</th>
					</thead>
					<tbody>
						<?php
						//incluimos el fichero de conexion
						include_once('dbconect.php');

						$database = new Connection();
						$db = $database->open();
						try {
							$sql = 'SELECT * FROM empleados';
							foreach ($db->query($sql) as $row) {
						?>
								<tr>
									<td><?php echo $row['idEmp']; ?></td>
									<td><?php echo $row['Nombres']; ?></td>
									<td><?php echo $row['Apellidos']; ?></td>
									<td><?php echo $row['Telefono']; ?></td>
									<td><?php echo $row['Carrera']; ?></td>
									<td><?php echo $row['Pais']; ?></td>
									<td>
										<a href="#edit_<?php echo $row['idEmp']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Editar</a>
										<a href="#delete_<?php echo $row['idEmp']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Borrar</a>
									</td>
									<?php include('BorrarEditarModal.php'); ?>
								</tr>
						<?php
							}
						} catch (PDOException $e) {
							echo "Hubo un problema en la conexión: " . $e->getMessage();
						}

						//Cerrar la Conexion
						$database->close();

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		function imprimir(param) {
			window.open('reporte.php?typeReport=' + param, '_blank');
		}
	</script>
	<?php include('AgregarModal.php'); ?>
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>