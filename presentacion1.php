

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



<title>Presentación</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="css/loginn.css">

<link rel="stylesheet" href="css/mis_estilos.css"> 


</head>



<body>

	<section class="grid-container">  

    <div class="header"><h1>BIBLIOTECA</h1>

      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

    </div>

	 
		<?php include "navigation_bar.php";?>

</div>

<div class="w3-center w3-flat-pumpkin">
<div class="w3-bar">
    <br/>
 <div class="center">
	<a href="index.php" class="w3-button w3-red">Inicio</a>

	<a href="presentacion1.php" class="w3-button w3-red">Presentación</a>

	<a href="prestamo1.php?id=<?php echo $id;?>" class="w3-button w3-red">Solicitar Libro</a>

	<a href="mis-prestamos.php?id=<?php echo $id;?>"class="w3-button w3-red">Mis Préstamos</a>

	<a href="colecciones.php" class="w3-button w3-red">Colecciones</a>

    <a href="https://upch.mx/#" class="w3-button w3-red">Bibliotecas</a>

	<a href="https://upch.mx/quienes-somos" class="w3-button w3-red">Acerca de Nosotros</a>
</div>
</div>
</div>
		<br/>
 
<link rel="stylesheet" href="css/slideshow.css">	

</head>

<body>
<br>
<div class="slideshow-container">
<style>
div {
    text-align: justify;
}
</style>
<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <img src="images/upch.jpg" style="width: 1000px; height: 250px;">
  <div align="center"> 
  <div class="bi">Biblioteca de la UPCH</div>
  <p><h2>Presentacion de la BIBLIOTECA</h2></p>
</div>

<p>Una cosa que empezamos a usar ahora en las bibliotecas es repensar el diseño. 
Es algo común y lo que implica salir a conversar con los usuarios. 
Interactuar activamente con ellos, no sólo pensando en los nuevos servicios que podríamos añadir en la biblioteca. 
Si no crear una estrategia completamente nueva en función de las nuevas dinámicas de la biblioteca.</p>

</div>


<div class="mySlides fade">
  <div class="numbertext">2 / 5</div>
  <img src="images/UPCH_4.jpg" alt="Biblioteca de la UPCH" style="width: 1000px; height: 300px;">
  <div class="bi">Biblioteca de la UPCH</div>
  
  
<p> Un futuro que podría ser plausible para las bibliotecas es la biblioteca como el “Quinto Poder“. 
Los medios de comunicación se definen a sí mismos como el cuarto poder del estado porque se ven a sí mismos como quienes controlan los tres poderes principales del estado. 
</p>

</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <img src="images/logo1_.jpg" class="center" style="width:100%" >
  <div class="bi">Logo de la UPCH</div>
  
  
  <p><h2>Presentacion de la BIBLIOTECA</h2></p>

<p>Así Mogens afirma “Lo que las bibliotecas están representando son personas, gente común y corriente en grandes cantidades. De esta manera, la biblioteca puede establecer una nueva forma de control. Las bibliotecas ofrecen lo que la gente necesita; una amplia gama de información, y estamos ayudando a la gente a tener acceso a esa información. Así que, en esa perspectiva, somos el quinto poder del estado.”</p>

</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <img src="images/logo2_.jpg"  style="width:100%">
  <div class="bi">Logo de la UPCH</div>
  
  
  <p><h2>Presentacion de la BIBLIOTECA</h2></p>

<p>Fuente: “Bibliotecas modernas: El paso de una biblioteca transaccional a una biblioteca relacional”. [En línea]. Universo Abierto.
Disponible: https://universoabierto.org/2018/03/06/bibliotecas-modernas-pasar-de-una-biblioteca-transaccional-a-una-biblioteca-relacional/. </p>

</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <img src="images/logo_textoupch_treal_.png"  style="width:100%">
  <div class="bi">UPCH – Universidad del Pueblo y para el Pueblo.</div>
  
  
  <p><h2>Presentacion de la BIBLIOTECA</h2></p>

<p>De pie por la excelencia y la integridad es nuestra meta.</p>

</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
  
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

 <?php include "footer.php";?>
 
</body>
</html> 
