<?php
session_start();
		
	
    $receptor = $_POST['receptor'];
	
    $host = "10.10.100.191"; 		
    $puerto = "5038";    			
    $usuario = "nextcore";			   
     
    $string = 'N3xtCor32018Comm';
    $contrasena = (string)$string;

	$_SESSION["Extension"] = $_POST["Extension"];
    $_SESSION["Prefijo"] = $_POST["Prefijo"];
	
    $Extension = $_SESSION["Extension"];
    $prefijo = $_SESSION["Prefijo"];

    $contexto = "from-internal";	  

    //$canal = "Local/".$Extension."@".$contexto;	        
    $canal = "SIP/".$Extension;	        
    $espera = "30";					
    $prioridad = "1";				
					

    if (!$receptor == null){
        $errno = 0 ;
        $errstr = 0 ;
        $caller_id = "Llamada a $receptor, desde $canal";
        $socket = fsockopen($host, $puerto, $errno, $errstr, 20);	
    
        if (!$socket) {												
          //  echo "$errstr ($errno)";
        }
        else {														
            fputs($socket, "Action: login\r\n");
            fputs($socket, "Events: off\r\n");
            fputs($socket, "Username: $usuario\r\n");
            fputs($socket, "Secret: $contrasena\r\n\r\n");
            fputs($socket, "Action: originate\r\n");
            fputs($socket, "Channel: $canal\r\n");                 
            fputs($socket, "WaitTime: $espera\r\n");
            fputs($socket, "CallerId: $caller_id\r\n");
            fputs($socket, "Exten: $prefijo$receptor\r\n");           
            fputs($socket, "Context: $contexto\r\n");              
            fputs($socket, "Priority: $prioridad\r\n\r\n");
            fputs($socket, "Action: Logoff\r\n\r\n");
            //sleep(2);
            fclose($socket);
        }
				echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";

      //  echo "$Extension  llamando  $prefijo,$receptor..." ;	
       
    }else{
        exit() ;
    }					

?>