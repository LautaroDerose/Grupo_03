<?php 

function buscarUsuarioEmail($db, $usuario){
	$user= $usuario["email"];

	$sql = 
	"SELECT * 
	FROM usuarios
	WHERE email = :user";

	$consulta = $db->prepare($sql);
	$consulta->bindValue(':user', $user, PDO::PARAM_STR);
	//ejecuto la consulta
	$consulta->execute();

	//leo los resultados obtenidos
	$resultado = $consulta->fetch(PDO::FETCH_ASSOC);  

	return $resultado;


}

function insertarUsuario($db, $usuario){
	$nombre = $usuario["nombre"];
	$apellido = $usuario["apellido"];
	$email = $usuario["email"];
	$pass = password_hash($usuario["pass"], PASSWORD_DEFAULT);

	$sql= "
	INSERT INTO usuarios 
	VALUES (null, :nombre, :apellido, :email, :password)
	";

	$consulta = $db->prepare($sql);
	$consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
	$consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
	$consulta->bindValue(':email', $email, PDO::PARAM_STR);
	$consulta->bindValue(':password',$pass, PDO::PARAM_STR);

	$consulta->execute();
}

function insertarProducto($db,$producto){
	$nombre = $producto["nombre"];
	$precio = $producto["precio"];
	$descripcion = $producto["descripcion"];
	$sql= "
	INSERT INTO productos 
	VALUES (null, :nombre, :precio, :descripcion, :valoracion)
	";

	$consulta = $db->prepare($sql);
	$consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
	$consulta->bindValue(':precio', $precio, PDO::PARAM_INT);
	$consulta->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
	$consulta->bindValue(':valoracion',5, PDO::PARAM_INT);

	$consulta->execute();
}

function obtenerProductos($db){

	$sql = 
	"SELECT * 
	FROM productos";

	$consulta = $db->prepare($sql);
	//ejecuto la consulta
	$consulta->execute();

	//leo los resultados obtenidos
	$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);  

	return $resultado;

}

function eliminarProducto($db, $id){

	$sql="
	DELETE
	FROM productos 
	WHERE idProducto=:id
	";

	$consulta = $db->prepare($sql);

	$consulta->bindValue(':id', $id, PDO::PARAM_INT);
	$consulta->execute();
}




?>