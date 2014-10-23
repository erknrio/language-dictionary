<!DOCTYPE html>
<html lang="es">
   <?php
        $title = "Diccionario EOI Puerto de la Cruz - Intermedio 1";
        $description = "Diccionario creado para los alumnos de Intermedio 1 de la Escuela Oficial de Idiomas del Puerto de la Cruz";
        require_once('partials/head.php');
    ?>
    <body>
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-2 col-xs-12">
                <img src="assets/img/EOI_Puerto_de_la_Cruz_logo.JPG" alt="EOI Puerto de la Cruz logo" title="EOI Puerto de la Cruz logo">
            </div>
            <div class="col-md-10 col-xs-12">
                <h1>Diccionario Escuela Oficial de Idiomas Puerto de la Cruz - Intermedio 1</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="formBackground">
                     <fieldset>
                         <legend>Búsqueda en Inglés</legend>
                          <form id="english-word-form" method="get" role="form" action="server/get-word.php">
                              <div class="form-group">
                                 <label for="english-word">Introduzca una palabra en Inglés</label>
                                  <input type="text" id="english-word" name="english-word" class="form-control" />
                                  <input type="hidden" name="wordType" value="1" />
                                  <button type="submit" class="btn btn-primary btn-lg btn-block searchButton">Buscar</button>
                              </div>
                          </form>
                      </fieldset>
                  </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="formBackground">
                   <fieldset>
                     <legend>Búsqueda en Español</legend>
                        <form id="spanish-word-form" method="get" role="form" action="server/get-word.php">
                            <div class="form-group">
                                 <label for="spanish-word">Introduzca una palabra en Español</label>
                                 <input type="text" id="spanish-word" name="spanish-word" class="form-control" />
                                 <input type="hidden" name="wordType" value="2" />
                                 <button type="submit" class="btn btn-primary btn-lg btn-block searchButton">Buscar</button>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row marginTop">
            <div class="col-md-6 col-xs-12">
                <a href="apps/add-word.php" class="noLink">
                   <div class="step">
                       <p>Agregar nueva palabra</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xs-12">
                <a href="apps/list-words.php" class="noLink">
                   <div class="step">
                       <p>Listado completo</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row marginTop">
            <div class="col-md-12 col-xs-12">
               <div class="centerText alert alert-danger hidden" id="result-word-info" style="font-size:1.5em;"><span></span></div>
                <table id="table-word" class="table table-striped hidden">
                    <thead class="tableHead">
                        <tr>
                            <th>English</th>
                            <th>Español</th>
                            <th>Pronunciation</th>
                            <th>Extra Info</th>
                            <th>Audio</th>
                        </tr>
                    </thead>
                    <tbody id="table-word-tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require_once('partials/scripts.php'); ?>
    <script type="text/javascript">
      appendJS('vendor/bootstrap/js/bootstrap.min.js');
      appendJS('js/main.js');
    </script>
    </body>
</html>