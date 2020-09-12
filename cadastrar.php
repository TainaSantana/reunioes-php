<?php

include_once('include/header.php');
?>
<br>
    <!--Conteudo da pagina-->
<main role="main" class="flex-shrink-0">

    <div class="container">

        <h1>Cadastrar reunião</h1>
        
        <?php
        require './Conn.php';

        $Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($Dados);
        if (!empty($Dados['SendCadReuniao'])):
            unset($Dados['SendCadReuniao']);
            $conn = new Conn();

            $result_cadastrar = "INSERT INTO cad_reuniao (reu_titulo, reu_data_inicio, reu_hora_inicio, reu_data_fim, reu_hora_fim, reu_descricao, reu_pauta, email, reu_criado_em) VALUES (:reu_titulo, :reu_data_inicio, :reu_hora_inicio, :reu_data_fim, :reu_hora_fim, :reu_descricao, :reu_pauta, :email, NOW())";
            $cadastrar = $conn->getConn()->prepare($result_cadastrar);

            $cadastrar->bindParam(':reu_titulo', $Dados['reu_titulo'], PDO::PARAM_STR);
            $cadastrar->bindParam(':reu_data_inicio', $Dados['reu_data_inicio'], PDO::PARAM_STR);
            $cadastrar->bindParam(':reu_hora_inicio', $Dados['reu_hora_inicio'], PDO::PARAM_STR);
            $cadastrar->bindParam(':reu_data_fim', $Dados['reu_data_fim'], PDO::PARAM_STR);
            $cadastrar->bindParam(':reu_hora_fim', $Dados['reu_hora_fim'], PDO::PARAM_STR);
            $cadastrar->bindParam(':reu_descricao', $Dados['reu_descricao'], PDO::PARAM_STR);
            $cadastrar->bindParam(':reu_pauta', $Dados['reu_pauta'], PDO::PARAM_STR);
            $cadastrar->bindParam(':email', $Dados['email'], PDO::PARAM_STR);

            $cadastrar->execute();

            if ($cadastrar->rowCount()):
                //$_SESSION['msg'] = "<p style='color:green;'>Registro cadastro com sucesso</p>";
                header("Location: index.php");
            endif;
        endif;
        ?>        
        <form name="CadReuniao" action="" method="POST">
        <div class="row">
            <div class="col">
                <label>Título da reunião: </label>   
                <input type="text" name="reu_titulo" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Data de início: </label>   
                <input type="date" name="reu_data_inicio" class="form-control">
            </div>
            <div class="col">
                <label>Horário de início: </label>   
                <input type="time" name="reu_hora_inicio" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Data de Fim: </label>   
                <input type="date" name="reu_data_fim" class="form-control">
            </div>
            <div class="col">
                <label>Horário Final: </label>   
                <input type="time" name="reu_hora_fim" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Descricao: </label>  
                <textarea class="form-control" id="reu_descricao" value="reu_descricao" name="reu_descricao" rows="3"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Pauta: </label>  
                <textarea class="form-control" id="reu_pauta" value="reu_pauta" name="reu_pauta" rows="7"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>E-mail: </label>   
                <input type="text" name="email" class="form-control">
            </div>
        </div>
        <br>
            <input type="submit" value="Cadastrar" class="btn btn-primary" name="SendCadReuniao">
        </form>
        <br> 
            
            
        
    </div>
        
</main>
<?php
include_once('include/footer.php');
?>
