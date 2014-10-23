<!DOCTYPE html>
<html lang="es">
   <?php
        $title = "Diccionario EOI Puerto de la Cruz - Listado de palabras";
        $description = "Listado completo de palabras del diccionario de nivel Intermedio 1";
        require_once('../partials/head.php');
    ?>
   <body>
      <ol class="breadcrumb">
         <script type="text/javascript">
             var string = '<li><a href="http://'+location.hostname+'/idiomas">Inicio</a></li>';
             document.querySelector('.breadcrumb').innerHTML = string;
        </script>
         <li class="active">Listado de palabras</li>
      </ol>
      <div class="container-fuild">
          <div class="row">
              <div class="col-md-12 col-xs-12 centerText">
                  <ul class="pagination pagination-lg" id="word-list">
                      <script type="application/javascript">
                         var array = ['&laquo', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'K', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '&raquo'];
                         for (i in array) {
                             var string = '<li><a href="#" id="word-'+array[i].toLowerCase()+'">'+ array[i] +'</a></li>';
                             document.querySelector('#word-list').innerHTML += string;
                         }
                      </script>
                  </ul>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 col-xs-12">
                  <div class="centerText"><h1>EN CONSTRUCCIÓN</h1></div>
              </div>
          </div>
          <!-- pagination -->
          <!--<div class="row">
              <div class="col-md-12 col-xs-12 centerText">
                  <ul class="pagination pagination-lg">
                      <li><a href="#">&laquo;</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#">&raquo;</a></li>
                  </ul>
                  <span class="help-block">Número de Páginas</span>
              </div>
          </div>-->
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
       <?php require_once('../partials/scripts.php'); ?>
       <script type="application/javascript">
        appendJS('vendor/bootstrap/js/bootstrap.min.js');
        appendJS('js/listWords.js');
    </script>
   </body>
</html>