<?php

 require_once("conexion.php"); 

       /* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función 

     htmlentities para evitar inyecciones SQL. */

	  $miusuario  = $_POST['usuario'];

	  $password   = $_POST['clave'];

	  $miuser     = htmlentities($miusuario);

	  $miclave    = md5(htmlentities($password));

	  $myusuario  = "SELECT idusuario FROM usuarios WHERE idusuario = '$miuser'";

	  $validacion = mysqli_query($conecta, $myusuario); 

	  $nmyusuario = mysqli_num_rows($validacion);      	

     //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...

     if($nmyusuario != 0){

	     $sql = "SELECT * FROM usuarios WHERE estado = 1 AND idusuario = '$miuser' AND clave = '$miclave'";             

		 $myclave = mysqli_query($conecta, $sql);

		 $nmyclave = mysqli_num_rows($myclave);

		 //echo $nmyclave;

		 //Si el usuario,departamento y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.

          if($nmyclave != 0){

               session_start();

               $_SESSION['autentica'] = "SIP";

			   $_SESSION['usuarioactual'] = $miuser; //nombre del usuario logueado.

			   $user=$_SESSION['usuarioactual'];

			   $ensesion="UPDATE usuarios SET login=1 WHERE idusuario='$user'";

                mysqli_query($conecta, $ensesion);

				$cadena=$_SESSION['usuarioactual'];

				$buscar="admin";

			    $palabra = stripos($cadena, $buscar);

			   	if($palabra!==FALSE){

			   	header("Location: pages/admin_home.php");}

			   	 else{

                header("Location: pages/home.php");}

                }

                else{

               echo"<script>alert('La contraseña del usuario no es correcta');

               window.location.href=\"index.php\"</script>";  

               }

     }else{

          echo"<script>alert('El usuario no existe');window.location.href=\"index.php\"</script>";

     }

     mysqli_close($conecta);

?>