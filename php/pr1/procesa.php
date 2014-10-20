<!DOCTYPE html>
<html lang="en">
    <head>
    <title>More</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/zerogrid.css" type="text/css" media="all">
	 <link rel="stylesheet" href="../../css/responsive.css" type="text/css" media="all">
    <link rel="icon" href="../../images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon" />
    <script src="../../js/jquery.js"></script>
    <script src="../../js/jquery-migrate-1.1.1.js"></script>
    <script src="../../js/bgstretcher.js"></script>
	<script type="text/javascript" src="../../js/css3-mediaqueries.js"></script>
    <script>
	$(function(){
      //  Initialize Backgound Stretcher
      $('BODY').bgStretcher({
        images: ['../../images/slide-1.jpg'], 
		imageWidth: 1600, 
		imageHeight: 964, 
		resizeProportionally:true	
       });	
    });
    </script>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc; width: 100%}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif; text-align: left; font-size:18px;font-weight:bold;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-4eph{background-color:#f9f9f9}
.error{ font-weight: bold;  background-color: black; opacity: 0.8;}
</style>
  

    </head>
    <body>
<div class="extra-block"> 
      <!--==============================row-top=================================-->
      <div class="row-top">
    <div class="main zerogrid">
          <ul class="list-soc">
        <li><a href="#"><img alt="" src="../../images/soc-icon1.png"></a></li>
        <li><a href="#"><img alt="" src="../../images/soc-icon2.png"></a></li>
      </ul>
        </div>
  </div>
      
      <!--==============================header=================================-->
      
      <header>
    <div class="row-nav">
        <div class="main zerogrid">
        <h1 class="logo"><a href="../../index.html"><img alt="Eni Gma" src="../../images/logo.png"></a></h1>
        <nav>
          <ul class="menu">
            <li class="current"><a href="../../index.html">Home</a></li>
            <li><a href="../../index.html#practicas">Prácticas</a></li>
            <li><a href="http://github.com/rubiles">GitHub</a></li>
			<li><a href="#">JSFiddle</a></li>
			<li><a href="#">Portafolio</a></li>
          </ul>
        </nav>
        <div class="clear"></div>
      </div>
      </div>
  </header>
  <!--==============================content=================================-->
    <section >
  
     <div class="main" style="padding:30px; width:60%; margin:10% auto; ">
    <h3>Práctica 1: Clase Subir</h3>         

		<?php
        require_once './requires.php';
   
        $subir = new SubirCarmelo("archivo");
        
        $nombre = Leer::post("nombre");
        
        
        
//echo "$nombre<br/>";
        //echo "nombre: " . $subir->getNombre() . "<br/>";
        if ($nombre !== NULL && $nombre !== "") {
            //echo "asigna nombre<br/>";
            $subir->setNombre($nombre);
            //echo "nombre: " . $subir->getNombre() . "<br/>";
        }

        $destino = Leer::post("destino");
        //echo "Destino: $destino <br/>";
        if ($destino !== NULL && $destino !== "") {
            $subir->setDestino($destino);
           // $subir->setCrearCarpeta($destino);
            //echo $subir->getDestino() . "<br/>";
        }
        
        $carpeta = Leer::post("radioCrear");
        if ($carpeta === "si") {
            $subir->setCrearCarpeta("TRUE");
        }
              

        $politica = Leer::post("radio");
        //echo "radio: " . $radio;
        if ($politica == null) {
            echo "<h4 class='error'>Debes seleccionar una opcion <br/> Reemplazar o renombrar</h4>";
            //exit();
        } else {
            //echo "$politica <br/>";
            if ($politica=="Renombrar") {
                $subir->setAccion(SubirCarmelo::RENOMBRAR);
            } else if ($politica=="Reemplazar") {
                $subir->setAccion(SubirCarmelo::REEMPLAZAR);
            }

           
/*AÑADIMOS EXTENSIONES Y TIPO MIMES JUNTOS*/            
        $extensiones=Leer::post("extensiones");
        if($extensiones!=null){
          foreach ($extensiones as $key => $value) {
                 $valido = explode(" ", $value);
                 $subir->addExtension($valido[1]);
                 $subir->addTipo($valido[0]);
             //    echo $value."<br/>";
             //    echo "Extensiones:".$valido[1]."</br>";
             //    echo "Tipos:".$valido[0]."</br>";
            }
        }else
        {echo "<h4 class='error'>Debe seleccionar minimo una extension válida</h4><br/>";}
           
        
            $subir->subirMultiple();
            echo"<h4 class='error'>".$subir->getMensajeMultiple()."</h4>";
        // echo "".$subir->getExito();
        }
        ?>
    
    <h4><a href="./practica1.html">VOLVER ATRAS</a></h4>
     </div>
  </div>  

<div class="block"> 
      <!--==============================footer================================-->
       <footer>
    <div class="main aligncenter zerogrid">
        <div class="main aligncenter zerogrid">
        <div class="privacy">Carlos Rubí GT <span>|</span> <strong>Free Html5 Templates designed by TemplateMonster  Zerotheme</strong> </div>
        </div>
  </footer>
    </div>
</body>
</html>