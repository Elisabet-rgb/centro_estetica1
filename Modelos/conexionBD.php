<?php
/**
 * clase con una función pública que nospermite
 * la conexión con la base de datos 
 */
Class ConexionBD{

	public function cBD(){

		$bd=new PDO("mysql:host=localhost;dbname=centro","root","");
		$bd -> exec("set names utf8");
		return $bd;
	}
}