<?php

session_start();
require './Conn.php';
$reu_id = filter_input(INPUT_GET, 'reu_id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($reu_id)):
    $conn = new Conn();
    $result_user = "DELETE FROM cad_reuniao WHERE reu_id=:reu_id";

    $resultado_del_user = $conn->getConn()->prepare($result_user);
    $resultado_del_user->bindParam(':reu_id', $reu_id);

    if ($resultado_del_user->execute()):
        $_SESSION['msg'] = "<p style='color:green;'>Registro apagado com sucesso</p>";
        header("Location: index.php");
    else:
        $_SESSION['msg'] = "<p style='color:red;'>Registro não foi apagado com sucesso</p>";
        header("Location: index.php");
    endif;
else:
    $_SESSION['msg'] = "<p style='color:red;'>Registro não encontrado</p>";
    header("Location: index.php");    
endif;
 