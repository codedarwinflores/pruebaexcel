<?php
	session_start();
	include_once('dbconect.php');

	if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM empleados WHERE idEmp = '".$_GET['id']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Empleado Borrado' : 'Hubo un error al borrar empleado';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
	}

	header('location: index.php');

?>