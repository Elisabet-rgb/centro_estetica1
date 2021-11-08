<?php
require_once "ConexionBD.php";

Class EsteticienM extends ConexionBD{
//Ingreso Esteticien
	static public function IngresarEsteticienM($tablaBD,$datosC){//es estatica porque lleva parámetros
		$pdo= ConexionBD::cBD()->prepare("SELECT usuario,clave,nombre,apellido,foto,rol,id FROM $tablaBD WHERE usuario = :usuario");
		//para enlazar parámetros
		$pdo -> bindParam(":usuario",$datosC["usuario"],PDO::PARAM_STR);
		$pdo ->execute();
		return $pdo -> fetch();//retornamos 1 sóla fila
		$pdo ->close();
		$pdo = null;//vaciamos la conexión

	}
//ver perfil Esteticien
	static public function VerPerfilEsteticienM($tablaBD,$id){
		$pdo= ConexionBD::cBD()->prepare("SELECT usuario,clave,nombre,apellido,foto,rol,id FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id",$datosC["id"],PDO::PARAM_INT);
		$pdo ->execute();
		return $pdo -> fetch();//retornamos 1 sóla fila
		$pdo ->close();
		$pdo = null;//vaciamos la conexión

	}
}