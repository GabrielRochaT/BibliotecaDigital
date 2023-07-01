<?php 
    require_once('conexao.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, status from emprestimo WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $status = $reg->status;
    
    
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<header class="barra">
<div class="bttn">
<a href="realtorio.php" class="btn btn-danger me-5">Voltar</a>
</div>
        <img class="img_barra" src="img/Encoding-removebg-preview.png" alt="">
    <br>
</header>

<style>
*{
    margin: 0%;
    padding: 0%;
}
body{
    background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    width: 100vw;
    height: 100vh;
    background-size: cover;
    color: rgb(12, 3, 3);
    font-family: 'Ubuntu', sans-serif;
    text-align: center;
}
.conteudo{
    color: white;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: rgba(0, 0, 0, 0.6);
    padding: 15px;
    border-radius: 15px;
    width: 20%;
}
.inputBox{
    position: relative;
}

#enviar{
    background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;
}
#enviar:hover{
    background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
}
.bttn{
    display: flex;
    flex-direction: row;
}
    
</style>

<div class="conteudo" align="center">    

    <form method="post" action="">
        <legend>Retirar Pendência</legend>      
        
        <select class="form-select form-select-sm" name="status" value="<?=$status?>">
            <option name="Pendente" value="Pendente">Pendente</option>
            <option name="Devolvido" value="Devolvido">Devolvido</option>  
        </select>
        <input name="id" type="hidden" value="<?=$id?> required"> <br>

        <button name= "enviar" id="enviar" class= "submit">Enviar</button>
    </form>
</div>

<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $status = $_POST['status'];
    
    

    $sql = "UPDATE emprestimo SET status = :status WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':status', $_POST['status'], PDO::PARAM_INT);   
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='relatorio.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>