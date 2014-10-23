<?php
function escape_string($mysqli, $string) {
    $result = $mysqli->real_escape_string($string);
    return $result;
}


function db_conn($host, $user, $pass, $db) {
    $mysqli = new mysqli($host, $user, $pass, $db);

    if ($mysqli->connect_error) {
        return -1;
    }else{
        if (!$mysqli->set_charset("utf8")) {
            return -1;
        }else{
            return $mysqli;
        }
    }
}
/**
 * [db_get Realiza una consulta a la base de datos]
 * @param  [obj] $mysqli [objeto conexion]
 * @param  [string] $fields  [campos a buscar en la BD]
 * @param  [string] $table  [tabla donde se ejecutara la consulta]
 * @param  [string] $where  [clausula where]
 * @return [array/integer]         [-1 indica error o devuelve valores en array asociativo]
 */
function db_get($mysqli, $table, $fields, $where) {
    if(gettype($mysqli) === 'object' && gettype($table) === 'string' && gettype($fields) === 'string' && gettype($where) === 'string') {
        if (!empty($mysqli) && !empty($table) && !empty($fields) && !empty($where)) {
            $table = escape_string($mysqli, $table);
            $fields = escape_string($mysqli, $fields);
            $where = stripslashes(escape_string($mysqli, $where));
            $query = 'SELECT '. $fields .' FROM '. $table.' WHERE '. $where. ';';
            $array = array();

            if($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    array_push($array, $row);
                }
            }else
                return -1;

            return $array;
        }else
            return -1;
    }else
        return -1;
}
/**
 * [db_post Consulta de insercion en BD]
 * @param  [obj] $mysqli [obj conexion]
 * @param  [string] $table  [tabla de la BD afectada]
 * @param  [string] $fields [campos de la tabla]
 * @param  [string] $data [valores a insertar]
 * @return [integer]         [-1 indica error y 1 todo correcto]
 */
function db_post($mysqli, $table, $fields, $data) {
    if(gettype($mysqli) === 'object' && gettype($table) === 'string' && gettype($fields) === 'string' && gettype($data) === 'string') {
        if (!empty($mysqli) || empty($table) || !empty($fields) || !empty($data)) {
            $table = escape_string($mysqli, $table);
            $fields = escape_string($mysqli, $fields);
            $data = stripslashes(escape_string($mysqli, $data));
            $query = 'INSERT INTO '. $table .' ('.$fields.') VALUES ('.$data.');';

            if($result = $mysqli->query($query)) {
                if ($mysqli->affected_rows >= 1) {
                    return 1;
                }else
                    return -1;
            }else
                return -1;
        }else
            return -1;
    }else
        return -1;
}

// update UPDATE table_name SET column1=value, column2=value2,... WHERE some_column=some_value
function db_put() {
    //
}

// delete
// DELETE FROM table_name WHERE some_column = some_value
function db_delete() {
    //
}
/**
 * Realizar una consulta a la base de datos para obtener palabras
 * @param  [obj] $mysqli     [objeto que representa la conexion a la base de datos]
 * @param  [string] $query      [consulta a realizar]
 * @param  [string] $paramType  [tipo de parámetros a insertar]
 * @param  [string] $paramValue [valor de el parámetro a insertar]
 * @return [array]             [devuelve el resultado de la consulta realizada]
 * Docu:    http://php.net/manual/es/mysqli-stmt.prepare.php
 */
/*function db_query_one_param($mysqli, $query, $paramType, $paramValue) {
    $query = $mysqli->real_escape_string($query);
    $paramType = $mysqli->real_escape_string($paramType);
    $paramValue = $mysqli->real_escape_string($paramValue);

    if ($stmt = $mysqli->prepare($query)) {

        // ligar parámetros para marcadores
        $stmt->bind_param($paramType, $paramValue);

        // ejecutar la consulta
        $stmt->execute();

        // obtenemos resultado consulta
        //$result = $stmt->get_result();
        $result = $stmt->result_metadata();

        // Devuelve el número de campos
        //$result->field_count;

        // obtener valor
        //$array = array();
        //while ($row = @$result->fetch_assoc()) {
        //while ($row = @$result->fetch_field()) {
        $row = $result->fetch_fields();
            //$array[] = $row;
        //}
        // Liberamos los recursos
        $stmt->free_result();

        // cerrar sentencia
        $stmt->close();

        //return $array;
        return $row;
    }else
        die("Fallo la preparacion: (" . $mysqli->errno . ") " . $mysqli->error);
}*/

/**
 * Realizar una consulta a la base de datos para obtener palabras
 * @param  [obj] $mysqli      [objeto que representa la conexion a la base de datos]
 * @param  [string] $query       [consulta a realizar]
 * @param  [string] $paramType   [tipo de parámetros a insertar]
 * @param  [string] $paramValue1 [valor de el parámetro a insertar]
 * @param  [string] $paramValue2 [valor de el parámetro a insertar]
 * @param  [string] $paramValue3 [valor de el parámetro a insertar]
 * @param  [string] $paramValue4 [valor de el parámetro a insertar]
 * @return [type]              [description]
 */
//INSERT INTO dicctionary(english, spanish, pronunciation, extra) VALUES (?, ?, ?, ?)ssss , box, caja, box,
function db_query_four_params($mysqli, $query, $paramType, $paramValue1, $paramValue2, $paramValue3, $paramValue4) {
    $query = $mysqli->real_escape_string($query);
    $paramType = $mysqli->real_escape_string($paramType);
    $paramValue1 = $mysqli->real_escape_string($paramValue1);
    $paramValue2 = $mysqli->real_escape_string($paramValue2);
    $paramValue3 = $mysqli->real_escape_string($paramValue3);
    $paramValue4 = $mysqli->real_escape_string($paramValue4);

    if ($stmt = $mysqli->prepare($query)) {

        /* ligar parámetros para marcadores */
        $stmt->bind_param($paramType, $paramValue1, $paramValue2, $paramValue3, $paramValue4);

        /* ejecutar la consulta */
        $stmt->execute();

        /* obtenemos resultado consulta */
        $result = $stmt->get_result();

        /* obtener valor */
        $array = array();
        while ($row = @$result->fetch_assoc()) {
            $array[] = $row;
        }

        /* cerrar sentencia */
        $stmt->close();

        return $array;
    }else
        die("Fallo la preparacion: (" . $mysqli->errno . ") " . $mysqli->error);
}
/*require_once('database.php');
echo "conectando...";
echo "</br>";
$db = db_conn($host, $user, $pass, $db);
echo "Llamando funcion...";
echo "</br>";
$result = db_query_one_param($db, "SELECT * FROM dicctionary WHERE english LIKE ?","s", "pear");
echo "Resultado consulta: ";
print_r($result);*/
?>