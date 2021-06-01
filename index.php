<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width" />
  <title>Edukids</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./css/style.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Ribeye&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rasa&family=Ribeye&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />    
</head>
<body>
  <?php 
    include './layout/header.php';
  ?>
  <main class="main" id="scroll-spy">
      <div class="principal-container">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                  <div class="carousel-item active">
                    <picture>
                      <source media="(min-width: 768px)" srcset="./img/portada1.png" />
                      <img src="./img/imagen1.jpg" class="d-block w-100" alt="Inscripciones abiertas">
                    </picture>
                  </div>
                  <div class="carousel-item">
                      <picture>
                          <source media="(min-width: 768px)" srcset="./img/portada2.jpg" />
                          <img src="./img/imagen2.jpg" class="d-block w-100" alt="imagen de jovenes en un bus">
                      </picture>
                  </div>
                  <div class="carousel-item">
                      <picture>
                          <source media="(min-width: 768px)" srcset="./img/portada3.jpg">
                          <img src="./img/imagen2.jpg" class="d-block w-100" alt="imagen de jovenves">
                      </picture>
                  </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
          <div class="container-fluid mt-3 mb-5">
              <!-- Section: Block Content -->
              <section class="mb-4">
                  <style>
                      .map-container {
                          overflow: hidden;
                          position: relative;
                          height: 0;
                      }

                          .map-container iframe {
                              left: 0;
                              top: 0;
                              height: 100%;
                              width: 100%;
                              position: absolute;
                          }
                  </style>
                  <div class="card">
                      <div class="row">
                          <div class="col-md-6">
                              <!-- Google Maps -->
                              <div id="map-within-card-2" class="map-container rounded-left" style="height: 400px">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d965.0251316375644!2d-90.58593865328525!3d14.650234625176292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0:0xb94d5c7f6a31b8b6!2sLearning Center EduKids!5e0!3m2!1ses-419!2sgt!4v1610330364431!5m2!1ses-419!2sgt" frameborder="0"
                                          style="border:0" allowfullscreen></iframe>
                              </div>
                              <!-- Google Maps -->
                          </div>
                          <div class="col-10 col-md-4 mx-auto align-self-center py-4 mapDescription">
                              <h6 class="font-weight-bold grey-text text-uppercase small">Direccion</h6>
                              <h5 class="font-weight-normal mb-4">2 ave. 2-25 Colonia Jardines de San Juan, Zona 7, Guatemala, Guatemala</h5>
                              <p class="text-muted font-weight-light">Whatsapp: 50162833</p>
                              <p class="text-muted font-weight-light">Correo: centroeducativoedu@gmail.com </p>
                              <p class="text-muted font-weight-light">Horario de Atención: <br> Lunes a viernes 8:00am a 3:00pm </p>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
      </div>
      
      <div class="info1" id="quienesSomos">
          <section class="box1">
              <div class="contenedor1">
                  <div class="card-string">
                      <h2>¿Quienes somos?</h2>
                  </div>
                  <div class="card-background"></div>
                  <img src="./img/preprimariaportada.png" />
              </div>
          </section>

          <div class="box2">
              <div class="box2-info" id="inforojo">
                  <h2>¿Quienes Somos?</h2>
                  <div class="divider-line"></div>
                  <p>
                      Somos un centro educativo comprometido con los principios y alineadacurriculo nacional base,
                      que busca la participación de los docentes y padres de familia para consolidar el desarrollo integral del alumno.
                  </p>
              </div>
              <div class="box2-info">
                  <h2>Misión</h2>
                  <div class="divider-line"></div>
                  <p>
                      Formar integralmente al estudiante con liderazgo, comprometido en la enseñanza y práctica de los valores que contribuyen al desarrollo de sus capacidades,
                      habilidades, para la convivencia con la sociedad propiciando una cultura de paz y de integridad.
                  </p>
              </div>
              <div class="box2-info" id="infoazul">
                  <h2>Visión</h2>
                  <div class="divider-line"></div>
                  <p>
                      Ser un Centro educativo que forme estudiantes competitivos con sus capacidades,
                      habilidades y valores que les permita desenvolverse de forma adecuada en su entorno y
                      contribuyan al establecimiento para forma una sociedad justa y estable.
                  </p>
              </div>
          </div>
      </div>
      <div class="preprimaria" id="preprimaria">
          <div class="image-prepri informativeText">
              <picture>
                  <img src="./img/preprimaria/portada-preprimaria.png" alt="Kid Cartoon Png - Kids Cartoon Png {#866246} - Pngtube">
              </picture>
          </div>
          <div class="container-prepri informativeText">
              <h1>Pre-Primaria</h1>
          </div>
          <div class="divider-line informativeText"></div>
          <p class="informativeText">
              El nivel de Educación Preprimaria, se caracteriza por cumplir una doble finalidad:
              la socialización del ser humano y la estimulación de los procesos evolutivos.
              Se entiende por socialización el proceso de incorporación, a la conducta de las personas,
              de normas que rigen la convivencia social y su transformación para satisfacer necesidades e intereses individuales:
              pautas, normas, hábitos, actitudes y valores que se adquieren en la interacción con otros y otras: solidaridad,
              espíritu de cooperación y respeto Su finalidad es que el niño y la niña se reconozcan como seres con identidad
              personal y como sujetos sociales.
          </p>
          <div class="prepi-div informativeText">
              <div class="prepri-div_container informativeText">
                  <picture>
                      <img src="./img/preprimaria/nursery.png" alt="Baby shoes circle icon - Transparent PNG &amp; SVG vector file" />
                  </picture>
                  <h3>Nursery</h3>
              </div>
              <div class="prepri-div_container informativeText">
                  <picture>
                      <img src="./img/preprimaria/prekinder.png" alt="Oso de peluche de dibujos animados - Descargar PNG/SVG transparente" />
                  </picture>
                  <h3>Pre-kinder</h3>
              </div>
              <div class="prepri-div_container">
                  <picture>
                      <img src="./img/preprimaria/kinder.png" alt="Carácter lindo del hombre tailandés - Descargar PNG/SVG transparente" /><!
                  </picture>
                  <h3>Kinder</h3>
              </div>
              <div class="prepri-div_container">
                  <picture>
                      <img src="./img/preprimaria/prepa.png" alt="Niño leyendo libros ilustración - Descargar PNG/SVG transparente" /><!
                  </picture>
                  <h3>Preparatoria</h3>
              </div>
          </div>
      </div>
      <div class="primaria" id="primaria">
          <div class="image-primero informativeText">
              <picture>
                  <img src="./img/Logo-primaria.png" alt="Foto que representa el grado de primaria">
              </picture>
          </div>
          <div class="container-primaria informativeText">
              <h1>Primaria</h1>
          </div>
          <div class="divider-line informativeText"></div>
          <p class="informativeText">
              El nivel primario, también denominado como enseñanza o primaria básica es aquella que garantiza la alfabetización conforme el tiempo que
              dura que la misma que normalmente son seis años, identificado con grados aprendemos a el nivel primario también denominado como enseñanza
              básica que garantiza un nivel que aporte a los alumnos una buena formación e integridad que ayude a desarrollar sus capacidades.
          </p>
          <div class="primaria-des informativeText">
              <div class="primaria-des_container">
                  <picture>
                      <img src="./img/primaria/primero.png" alt="Sonriente personaje de pluma de niño - Descargar PNG/SVG transparente" />
                  </picture>
                  <h3>Primero</h3>
              </div>
              <div class="primaria-des_container">
                  <picture>
                      <img src="./img/primaria/segundo.png" alt="Calm kid reading book character - Transparent PNG &amp; SVG vector file" />
                  </picture>
                  <h3>Segundo</h3>
              </div>
              <div class="primaria-des_container">
                  <picture>
                      <img src="./img/primaria/tercero.png" alt="Happy boy hug character - Transparent PNG &amp; SVG vector file" />
                  </picture>
                  <h3>Tercero</h3>
              </div>
              <div class="primaria-des_container">
                  <picture>
                      <img src="https://images.vexels.com/media/users/3/205370/isolated/preview/39bf88852f117ff6993ea40a10e7c179-happy-girl-with-tablet-character-by-vexels.png" alt="Happy girl with tablet character - Transparent PNG &amp; SVG vector file" />
                  </picture>
                  <h3>Cuarto</h3>
              </div>
              <div class="primaria-des_container">
                  <picture>
                      <img src="https://images.vexels.com/media/users/3/205515/isolated/preview/9f18964bc13e29a76d4f01dbd0360b42-smiling-boy-character-by-vexels.png" alt="Smiling boy character - Transparent PNG &amp; SVG vector file" />
                  </picture>
                  <h3>Quinto</h3>
              </div>
              <div class="primaria-des_container">
                  <picture>
                      <img src="https://images.vexels.com/media/users/3/205372/isolated/preview/60317425168d380e86d386b0e9a70a18-happy-lying-girl-character-by-vexels.png" alt="Happy lying girl character - Transparent PNG &amp; SVG vector file" />
                  </picture>
                  <h3>Sexto</h3>
              </div>
          </div>
      </div>
      <div class="secundaria" id="secundaria">
          <div class="image-secundaria informativeText informativeText">
              <picture>
                  <img src="https://assets.change.org/photos/3/bl/xf/IxblxfrYuzNKWqG-800x450-noPad.jpg?1522100450" alt="Petition · Home Ec., Computer Skills, and First Aid should be required  classes · Change.org" /><!
              </picture>
          </div>
          <div class="container-secundaria informativeText">
              <h1>Secundaria</h1>
          </div>
          <div class="divider-line informativeText"></div>
          <p class="informativeText">
              El nivel secundario garantizar una educación inclusiva y equitativa de calidad y promover oportunidades de aprendizaje
              permanente para todos, es el paso previo a los estudios de enseñanza medio o superior prepara al alumno para que pueda
              alcanzar conforme el siguiente nivel y además que pueda desarrollar capacidades, habilidades y valores que le permitan
              desempeñarse satisfactoriamente en la sociedad.
          </p>
          <div class="secundaria-des informativeText informativeText">
              <div class="secu-des_container">
                  <picture>
                      <img src="https://images.vexels.com/media/users/3/205546/isolated/preview/eaaccf9a4d134c57e1fb83897ae0951a-teen-with-big-cable-character-by-vexels.png" alt="Teen with big cable character - Transparent PNG &amp; SVG vector file" />
                  </picture>
                  <h3>Primero</h3>
              </div>
              <div class="secu-des_container">
                  <picture>
                      <img src="https://images.vexels.com/media/users/3/208643/isolated/preview/8281d0252d7f73be5ec7b171b1c54aa8-car--cter-dedo-arriba-dama-by-vexels.png" alt="Carácter dedo arriba dama - Descargar PNG/SVG transparente" /><
                  </picture>
                  <h3>Segundo</h3>
              </div>
              <div class="secu-des_container">
                  <picture>
                      <img src="https://images.vexels.com/media/users/3/205549/isolated/preview/ee333acb146337b73a6fc791198c321c-teen-with-notebook-character-by-vexels.png" alt="Teen with notebook character - Transparent PNG &amp; SVG vector file" />
                  </picture>
                  <h3>Tercero</h3>
              </div>
          </div>
      </div>
  </main>
  <footer class="page-footer font-small indigo darken-4 py-4">

      <!-- Footer Elements -->
      <div class="container">

        <div class="row">
          <div class="col-md-6 d-flex justify-content-start">
            <!-- Copyright -->
            <div class="footer-copyright text-center bg-transparent">
              EDUKIDS
            </div>
            <!-- Copyright -->
          </div>
          <div class="col-md-6 d-flex justify-content-end">
            <ul class="list-unstyled d-flex mb-0">
              <li>
                <span class="material-icons">
                  <a href="https://www.facebook.com/EduKidsCenter/">facebook</a>
                </span>
              </li>
            </ul>
          </div>
        </div>

      </div>
      <!-- Footer Elements -->

  </footer>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="./js/scroll.js"></script>
  <script src="./js/animated.js"></script>
</body>
</html>