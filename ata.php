<?php

include_once('include/header.php');
?>
<br>
    <!--Conteudo da pagina-->
<main role="main" class="flex-shrink-0">

    <div class="container">

        <h1>Ata reunião</h1>
        
        <?php
        require './Conn.php';

        $Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $conn = new Conn();
        $result_user = "SELECT * FROM cad_reuniao";

        $resultado_user = $conn->getConn()->prepare($result_user);
        $resultado_user->execute();


        ?>
        <form name="CadReuniao" action="envia_ata.php" method="POST">
        <div class="row">
        <label>Reunião:</label>
        <select class="form-control" name="reu_titulo" id="reu_titulo">
       <?php while ($row_user = $resultado_user->fetch(PDO::FETCH_ASSOC)): ?> 
            <option value="<?php echo $row_user['reu_titulo']?>"><?php echo $row_user['reu_titulo']?> </option>
            <?php 
            endwhile;

            ?>
        </select>
        </div>

        <div class="row">
            <div class="col">
                <label>Ata: </label>  
                <textarea class="form-control" id="ata_descricao" value="ata_descricao" name="ata_descricao" rows="7"></textarea>
            </div>
        </div>

      
        <!--<div class="row">
            <div class="col">
                <label>Local: </label>   
                <input type="text" name="reu_titulo" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Data</label>   
                <input type="date" name="reu_data_inicio" class="form-control">
            </div>
            
        </div>
        <div class="row">
        <div class="col">
                <label>Horário de início: </label>   
                <input type="time" name="reu_hora_inicio" class="form-control">
            </div>
            <div class="col">
                <label>Horário Final: </label>   
                <input type="time" name="reu_hora_fim" class="form-control">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col">
                <label>Colaboradores: </label>  
                <textarea class="form-control" id="reu_descricao" value="reu_descricao" name="reu_descricao" rows="3"></textarea>
            </div>
        </div>
        
       
        <div class="row">
            <div class="col">
                <label>Discussões e decisões </label>  
                <textarea class="form-control" id="reu_descricao" value="reu_descricao" name="reu_descricao" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Atividades propostas: </label>   
                <input type="text" name="email" class="form-control">
            </div>
        </div>-->
        <br>
            <input type="submit" value="Cadastrar" class="btn btn-primary" name="SendCadReuniao">
        </form>
        <br> 
            
            
        
    </div>
        
</main>
<?php
include_once('include/footer.php');
?>
