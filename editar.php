<?php 
    require_once('conexao.php');

    $id=$_GET['id'];

    $sth = $pdo->prepare("SELECT id, curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao from emprestimo WHERE id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
    $sth->execute();

    $reg = $sth->fetch(PDO::FETCH_OBJ);
    $curso = $reg->curso;
    $nomeAluno = $reg->nomeAluno;
    $dataEmprestimo = $reg->dataEmprestimo;
    $tituloLivro = $reg->tituloLivro;
    $dataDevolucao = $reg->dataDevolucao;
    

?>
<title>Editar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<header class="barra">
<div class="bttn">
<a href="relatorio.php" class="btn btn-danger me-5">Voltar</a>
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
    top: 55%;
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
    <form class="" method="post" action="">
       <legend>Editar Registro</legend>

        <input name="id"  type="hidden" value="<?=$id?> required"> 
        <br>
        Nome<input type="text" class="form-control form-control-sm" name="nomeAluno" value="<?=$nomeAluno?>">
        <input name="id" type="hidden" value="<?=$id?>"> 
        <br>
        Data deEmpréstimo<input type="date" class="form-control form-control-sm" name="dataEmprestimo" value="<?=$dataEmprestimo?>">
        <input name="id" type="hidden" value="<?=$id?>"> 
        <br>
        Título do Livro<input type="text" class="form-control form-control-sm" name="tituloLivro" value="<?=$tituloLivro?>">
        <input name="id" type="hidden" value="<?=$id?>">
        <br>
       Data de Devolução<input type="date" class="form-control form-control-sm" name="dataDevolucao" value="<?=$dataDevolucao?>">
        <input name="id" type="hidden" value="<?=$id?>">
        <br>
        <button name= "enviar" id="enviar"class= "submit">Enviar</button>

    </form>
</div>

<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $curso = $_POST['curso'];
    $nomeAluno = $_POST['nomeAluno'];
    $dataEmprestimo = $_POST['dataEmprestimo'];
    $tituloLivro = $_POST['tituloLivro'];
    $dataDevolucao = $_POST['dataDevolucao'];

    $sql = "UPDATE emprestimo SET curso = :curso, nomeAluno = :nomeAluno, dataEmprestimo = :dataEmprestimo, tituloLivro = :tituloLivro, dataDevolucao = :dataDevolucao WHERE id = :id";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $sth->bindParam(':curso', $_POST['curso'], PDO::PARAM_INT);
    $sth->bindParam(':nomeAluno', $_POST['nomeAluno'], PDO::PARAM_INT);
    $sth->bindParam(':dataEmprestimo', $_POST['dataEmprestimo'], PDO::PARAM_INT);
    $sth->bindParam(':tituloLivro', $_POST['tituloLivro'], PDO::PARAM_INT);
    $sth->bindParam(':dataDevolucao', $_POST['dataDevolucao'], PDO::PARAM_INT);   
   if($sth->execute()){
        print "<script>alert('Registro alterado com sucesso!');location='relatorio.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
?>
