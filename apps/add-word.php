<!DOCTYPE html>
<html lang="es">
   <?php
        $title = "Diccionario EOI Puerto de la Cruz - Agregar palabra nueva";
        $description = "Formulario creado para agregar nuevas palabras al diccionario de nivel Intermedio 1";
        require_once('../partials/head.php');
    ?>
   <body>
   <div class="container-fuild">
      <div class="row">
          <div class="col-md-12 col-xs-12">
             <ol class="breadcrumb">
             <script type="text/javascript">
                 var string = '<li><a href="http://'+location.hostname+'/idiomas">Inicio</a></li>';
                 document.querySelector('.breadcrumb').innerHTML = string;
            </script>
              <li class="active">Agrega palabra</li>
            </ol>
              <div class="addWordForm">
                   <fieldset>
                     <legend>Agregar nueva palabra</legend>
                        <form id="add-word-form" method="post" role="form" action="../server/add-word.php">
                            <div class="form-group">
                                <label for="english-word">Introduzca una palabra en Inglés</label>
                                 <input type="text" id="english-word" name="english-word" class="form-control" />
                                 <span class="help-block">No se requiere si ya introdujo una palabra en Español</span>
                                 <label for="spanish-word">Introduzca una palabra en Español</label>
                                 <input type="text" id="spanish-word" name="spanish-word" class="form-control" />
                                 <span class="help-block">No se requiere si ya introdujo una palabra en Inglés</span>
                                 <label for="pronunciation-word">Introduzca la Pronunciación</label>
                                 <input type="text" id="pronunciation-word" name="pronunciation-word" class="form-control" />
                                 <span class="help-block">Opcional. Escriba la pronunciación igual que haría en español. Ejemplo con la palabra stew: stiu</span>
                                 <label for="extra-word">Introduzca algún comentario extra</label>
                                 <input type="text" id="extra-word" name="extra-word" class="form-control" />
                                 <span class="help-block">Explicación sobre como pronunciar algún caracter. Ejemplo: (i: pronunciado como una " i " larga)</span>
                                 <label for="extra-word">Audio (en construcción)</label>
                                 <!--<input type="text" id="extra-word" name="extra-word" class="form-control" />
                                 <span class="help-block">Explicación sobre como pronunciar algún caracter. Ejemplo: (i: pronunciado como una " i " larga)</span>-->
                                 <button type="submit" class="btn btn-primary btn-lg btn-block searchButton">Guardar</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div class="centerText alert alert-danger hidden" id="result-word-info" style="font-size:1.5em;"><span></span></div>
            </div>
        </div>
    </div>
    <?php require_once('../partials/scripts.php'); ?>
   <script type="application/javascript">
        appendJS('vendor/bootstrap/js/bootstrap.min.js');
        appendJS('js/addWord.js');
    </script>
   </body>
</html>