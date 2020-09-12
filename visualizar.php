<?php
include_once('include/header.php');
?>
<main role="main" class="flex-shrink-0">
    <div class="container">
        <br>
        
        <?php
        require './Conn.php';
        
        $id = filter_input(INPUT_GET, "reu_id", FILTER_SANITIZE_NUMBER_INT);
        $limit = 1;
        $conn = new Conn();
        $result_user = "SELECT * FROM cad_reuniao WHERE reu_id=:reu_id LIMIT :limit";
        
        $resultado_user = $conn->getConn()->prepare($result_user);
        $resultado_user->bindParam(':reu_id', $id, PDO::PARAM_INT);
        $resultado_user->bindParam(':limit', $limit, PDO::PARAM_INT);
        $resultado_user->execute();
        
        $row_user = $resultado_user->fetch(PDO::FETCH_ASSOC); ?>
        <div class="card">
            <div class="card-header">
            <h5 class="card-title"><?php echo $row_user['reu_titulo'] ?></h5>
            </div>
            <div class="card-body">
               <p class="card-text"><b>Descrição: </b><?php echo $row_user['reu_descricao'] ?></p>
               <p class="card-text"><b>Pauta: </b><?php echo $row_user['reu_pauta'] ?></p>
               <p class="card-text"><b>Data de Início: </b><?php echo $row_user['reu_data_inicio'] ?> | Hora de Início: <?php echo $row_user['reu_hora_inicio']  ?></p>
               <p class="card-text"><b>Data de Término: </b><?php echo $row_user['reu_data_fim'] ?> | Hora de Término: <?php echo $row_user['reu_hora_fim']  ?></p>
               <?php
               if(!empty($row_user['reu_atualizado_rem'])):?>
                <p class="card-text"><b>Última atualização:</b> <?php echo $row_user['reu_atualizado_rem'] ?> </p><br>
               <?php endif;
                ?>
                <a href="editar.php?reu_id=<?=$row_user['reu_id']?>" class="btn btn-primary">Editar</a>
            </div>
        </div>
        
    </div>
 
</main>
<?php
include_once('include/footer.php');
?>
