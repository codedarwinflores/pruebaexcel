<?php
session_start();
include_once('dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO empleados (Nombres, Apellidos, Telefono, Carrera, Pais) VALUES (:nombres, :apellidos, :telefono, :carrera, :pais)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':nombres' => $_POST['nombres'] , ':apellidos' => $_POST['apellidos'] , ':telefono' => $_POST['telefono'], ':carrera' => $_POST['carrera'], ':pais' => $_POST['pais'])) ) ? 'Empleado guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: index.php');
	
?>