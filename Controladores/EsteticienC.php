<?php
class EsteticienC {
//ingreso esteticien
public function IngresarEsteticienC(){
	if(isset($_POST['usuario-Ing'])){//si viene con información que ejecute todo
		//pare evitar ataques 
		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])){

			$tablaBD = "esteticien";
			$datosC = array("usuario"=>$_POST["usuario-Ing"],"clave"=>$_POST['clave-Ing']);
			$resultado=EsteticienM::IngresarEsteticienM($tablaBD,$datosC);

//si las tres variables estan bien se inicia la sesión
			if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){
				$_SESSION["Ingresar"] = true;
//le pedimos todas la variables de sesión
				$_SESSION["id"] = $resultado["id"];
				$_SESSION["usuario"]= $resultado["usuario"]; 
				$_SESSION["clave"]= $resultado["clave"]; 
				$_SESSION["nombre"] = $resultado["nombre"];
				$_SESSION["apellido"]= $resultado["apellido"];
				$_SESSION["foto"] = $resultado["foto"];
				$_SESSION["rol"] = $resultado["rol"];
//nos envie a la página de inicio
				echo '<script>

				window.location = "inicio";


				</script>';


			}else{//clase de bustrak
				echo '<div class= "alert alert-danger">Error al Ingresar </div>';
			}




	} 

}
}//Ver perfil esteticien
public function VerPerfilEsteticienC(){

	$tablaBD = "esteticien";
	$id = $_SESSION["id"];
	$resultado = EsteticienM::VerPerfilEsteticienM($tablaBD,$id); 

	echo '<tr>
                         <td>'.$resultado["usuario"].'</td>

                        <td>'.$resultado["clave"].'</td>

                        <td>'.$resultado["nombre"].'</td>

                        <td>'.$resultado["apellido"].'</td>';
                        if($resultado["foto"] != ""){
							echo '<td><img src="http://localhost/centro_estetica/'.$resultado["foto"].'"class= "img-responsive" width= "40px"></td>';
						}else{
							echo '<td><img src="http://localhost/centro_estetica/Vistas/img/defecto.png" class= "img-responsive" width= "40px"></td>';
						}

                        

                       
                       echo' <td>
                            <a href="#">
                                <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                            </a>
                        </td>
                          
                     </tr>';


}



}
