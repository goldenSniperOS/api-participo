<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <?=HTML::style('css/materialize.css')?>
  <?=HTML::style('css/style.css')?>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <?=HTML::image('img/logo.png',['height' => '100%'])?>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center  light-green-text text-accent-2">Municipalidad de San Isidro</h1>
        <div class="row center">
          <h5 class="header col s12 light  light-green darken-1 sub">Ellos participaron e hicieron de este lugar un mejor San Isidro, ¿tu participarías?</h5>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax">
    <?=HTML::image('img/portal03.jpg')?>
    </div>
  </div>


  
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text"><i class="material-icons">theaters</i></h2>
            <h5 class="center">Participando llegamos lejos</h5>

            <p class="light">Creemos que el espacio público es, en esencia, el lugar de encuentro entre las personas, donde recuperamos nuestro derecho a la ciudad, donde todos nos hacemos iguales. </p>
          </div>
        </div>
        <div class="col s12 m8">
          <div class="icon-block">
            <dl>
              <dt>Top 10 - Eventos culturales</dt>
              <?php foreach ($usuarios as $usuario): ?>
                <dd class="percentage percentage-<?=number_format((float)$usuario->percentage, 0, '.', '')?>">
                  <span class="text">
                  <div class="col s12 m4">
                    <img width="30px" height="30px" src="http://graph.facebook.com/<?=$usuario->id_usuario?>/picture?type=large">
                  </div>
                  <div class="col s12 m8">
                      <?=$usuario->nombre?>:<?=number_format((float)$usuario->percentage, 0, '.', '')?>%
                  </div>
                  </span>
                </dd> 
              <?php endforeach ?>
            </dl>       
          </div>
        </div>
      </div>
    </div>
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">"La implementación  de los programas "Vive sin Ruido" y "Respira aire Limpio" es sin duda todo lo que necesita la ciudad y no solo San Isidro"</h5>
        </div>
      </div>
    </div>
    <div class="parallax">
    <?=HTML::image('img/portal04.jpg')?>
    </div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s8 m7">
          <div  id="chartContainer"></div>            
        </div>
        <div class="col s4 m4 push-s9">
          <h3><i style="font-size:2em;" class="material-icons light-green-text">invert_colors</i></h3>
          <h4>Uso Correcto</h4>
          <p class="left-align light">La movilidad urbana sostenible busca reducir las emisiones contaminantes del transporte urbano, reducir la presión del automóvil por más espacio en la ciudad para circular y estacionar, disminuir la necesidad de viajar grandes distancias para hacer uso de los servicios.</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Un Ciudadano informado no solo actuará con prudencia por su bienestar, sino que además será parte de una Ciudad más Ordenada y Respetuosa de las Normas</h5>
        </div>
      </div>
    </div>
    <div class="parallax">
    <?=HTML::image('img/portal01.jpg')?>s
    </div>
  </div>

  <footer class="page-footer light-green">
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="#">Itnovate</a>
      </div>
    </div>
  </footer>
  
  <!--  Scripts-->
  <script type="text/javascript">
    window.onload = function () {
      var chart = new CanvasJS.Chart("chartContainer",
      {
        title:{
          text: "Categorias más Asistidas"
        },
        legend: {
          maxWidth: 200,
          itemWidth: 120
        },
        data: [
        {
          type: "pie",
          showInLegend: true,
          toolTipContent: "{y} - #percent %",
          legendText: "{indexLabel}",
          dataPoints: <?=json_encode($listado)?>
        }
        ]
      });
      chart.render();
      console.log(<?=json_encode($listado)?>);
    }
    </script>
  <?=HTML::script('js/canvasjs.min.js')?>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <?=HTML::script('js/materialize.js')?>
  <?=HTML::script('js/init.js')?>
  </body>
</html>
