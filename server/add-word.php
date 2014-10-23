<?php
if (!empty($_POST['english-word']) || !empty($_POST['spanish-word'])) {
    require_once('db/database.php');
    require_once('db/database-functions.php');

    $db = db_conn($host, $user, $pass, $db);
    if ($db === -1) {
        echo json_encode(array('ok'=>FALSE));
    }else{
        $result = db_post($db,'`dicctionary`', '`english`, `spanish`,`pronunciation`, `extra`', '"'.$_POST['english-word'].'", "'.$_POST['spanish-word'].'", "'.$_POST['pronunciation-word'].'", "'.$_POST['extra-word'].'"');

        if($result === -1) {
            echo json_encode(array('ok'=>FALSE));
        }else{
            echo json_encode(array('ok'=>TRUE));
        }
    }

    $db->close();
}else
    echo json_encode(array('ok'=>FALSE));
?>