<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
			$telefono = $_POST['telefono'];
			$carrera = $_POST['carrera'];
			$pais = $_POST['pais'];

			$sql = "UPDATE empleados SET Nombres = '$nombres', Apellidos = '$apellidos', Telefono = '$telefono', Carrera = '$carrera', Pais = '$pais' WHERE idEMp = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado actualizado correctamente' : 'No se puso actualizar empleado';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: index.php');

?>