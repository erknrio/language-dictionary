<?php
    if (!empty($_GET['word'])) {
        require_once('db/database.php');
        require_once('db/database-functions.php');

        $db = db_conn($host, $user, $pass, $db);

        if ($db === -1) {
            echo json_encode(array('error'=>'Error de conexion'));
        }else{
            $result = db_get($db, '`dicctionary`', '*', '`english` LIKE "'.$_GET['word'].'%"');

            if ($result !== -1)
                echo json_encode(array('ok'=>$result));
            else
                echo json_encode(array('error'=>'Error al buscar la palabra'));
        }
        $db->close();
    }else
        echo json_encode(array('error'=>'Faltan Datos'));
?>