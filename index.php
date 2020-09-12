<?php
include_once('include/header.php');
?>


    <!--Conteudo da pagina-->
<main role="main" class="flex-shrink-0">
    <div class="container">
    <?php
        if (isset($_SESSION['msg'])) :
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        endif;
        
        require './Conn.php';

        $conn = new Conn();
        $result_user = "SELECT * FROM cad_reuniao";

        $resultado_user = $conn->getConn()->prepare($result_user);
        $resultado_user->execute();

echo "<br><br>";
echo "<h1>Reuniões agendadas</h1>";  
while ($row_user = $resultado_user->fetch(PDO::FETCH_ASSOC)): ?>
    <div class="card" style="width: 800px;">
        <div class="card-body">
            <h5 class="card-title"> <?php echo $row_user['reu_titulo'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"> Data: <?php echo $row_user['reu_data_inicio'] ?></h6>
            <p class="card-text">Descrição: <?php echo $row_user['reu_descricao'] ?></p>
            <a href="editar.php?reu_id=<?=$row_user['reu_id']?>"  class="card-link"><i class="fas fa-edit"></i> Editar</a>
            <a href="visualizar.php?reu_id=<?=$row_user['reu_id']?>" class="card-link"><i class="fas fa-file-alt"></i> Ver pauta</a>
            <a href="apagar.php?reu_id=<?=$row_user['reu_id']?>" class="card-link"><i class="far fa-window-close"></i> Excluir</a>
        </div>
    </div>
        <br>
<?php 
endwhile;

?>
<br> 
            
            
        
    </div>

</main>
<?php
include_once('include/footer.php');
?>
