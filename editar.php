<?php
include_once('include/header.php');
?>
<main role="main" class="flex-shrink-0">
    <div class="container">
        
        <h1>Editar Reunião</h1>
        
        <?php
        require './Conn.php';
        $conn = new Conn();

        //Editar reuniao
        $Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($Dados);
        if (!empty($Dados['SendEditReuniao'])):
            unset($Dados['SendEditReuniao']);
            $result_up_user = "UPDATE cad_reuniao SET reu_titulo=:reu_titulo, reu_data_inicio=:reu_data_inicio, reu_hora_inicio=:reu_hora_inicio, reu_data_fim=:reu_data_fim, reu_hora_fim=:reu_hora_fim, reu_descricao=:reu_descricao, reu_pauta=:reu_pauta, reu_atualizado_rem=NOW(), email=:email WHERE reu_id=:reu_id";
            $resultado_up_user = $conn->getConn()->prepare($result_up_user);
            $resultado_up_user->bindParam(':reu_titulo', $Dados['reu_titulo']);
            $resultado_up_user->bindParam(':reu_data_inicio', $Dados['reu_data_inicio']);
            $resultado_up_user->bindParam(':reu_hora_inicio', $Dados['reu_hora_inicio']);
            $resultado_up_user->bindParam(':reu_data_fim', $Dados['reu_data_fim']);
            $resultado_up_user->bindParam(':reu_hora_fim', $Dados['reu_hora_fim']);
            $resultado_up_user->bindParam(':reu_descricao', $Dados['reu_descricao']);
            $resultado_up_user->bindParam(':reu_pauta', $Dados['reu_pauta']);
            $resultado_up_user->bindParam(':email', $Dados['email']);
            $resultado_up_user->bindParam(':reu_id', $Dados['reu_id']);

            //$resultado_up_user->execute();

            if ($resultado_up_user->execute()):
                header("Location: index.php");
            else:
                echo "<p style='color:red;'>Registro não foi editado</p>";
            endif;
        endif;


        //Pesquisado os dados do usuario
        $id = filter_input(INPUT_GET, "reu_id", FILTER_SANITIZE_NUMBER_INT);
        $limit = 1;
        $result_user = "SELECT * FROM cad_reuniao WHERE reu_id=:reu_id LIMIT :limit";
        $resultado_user = $conn->getConn()->prepare($result_user);
        $resultado_user->bindParam(':reu_id', $id, PDO::PARAM_INT);
        $resultado_user->bindParam(':limit', $limit, PDO::PARAM_INT);
        $resultado_user->execute();
        $row_user = $resultado_user->fetch(PDO::FETCH_ASSOC);
        ?>

    <form name="EditReuniao" action="" method="POST">
        <div class="row">
            <div class="col">
                <input type="hidden" name="reu_id" value="<?php echo $row_user['reu_id']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Título da reunião: </label>   
                <input type="text" name="reu_titulo" value="<?php echo $row_user['reu_titulo']; ?>" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Data de início: </label>   
                <input type="text" name="reu_data_inicio"  value="<?php echo $row_user['reu_data_inicio']; ?>" class="form-control">
            </div>
            <div class="col">
                <label>Horário de início: </label>   
                <input type="text" name="reu_hora_inicio" value="<?php echo $row_user['reu_hora_inicio']; ?>" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Data de Fim: </label>   
                <input type="text" name="reu_data_fim"  value="<?php echo $row_user['reu_data_fim']; ?>" class="form-control">
            </div>
            <div class="col">
                <label>Horário Final: </label>   
                <input type="text" name="reu_hora_fim" value="<?php echo $row_user['reu_hora_fim']; ?>" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Descricao: </label>   
                <input type="text" name="reu_descricao" value="<?php echo $row_user['reu_descricao']; ?>" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Pauta: </label>   
                <input type="text" name="reu_pauta" value="<?php echo $row_user['reu_pauta']; ?>" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>E-mail: </label>   
                <input type="text" name="email" value="<?php echo $row_user['email']; ?>" class="form-control">
            </div>
        </div>
            <br>
            <input type="submit" value="Editar" class="btn btn-primary" name="SendEditReuniao">
        </form>
        <br> 
            
            
        
            </div>
        
        </main>
<?php
include_once('include/footer.php');
?>
