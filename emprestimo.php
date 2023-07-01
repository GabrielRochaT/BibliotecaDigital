
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Empréstimo</title>
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
    top: 55%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    background-color: rgba(0, 0, 0, 0.6);
    padding: 15px;
    border-radius: 15px;
    width: 20%;       
}

.inputBox{
    position: relative;
}

#Enviar{
    background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;
}
#Enviar:hover{
    background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
}
.bttn{
    display: flex;
    flex-direction: row;
}



    
</style>

</head>
<body>
<header class="barra">
<div class="bttn">
<a href="index.html" class="btn btn-danger me-5">Sair</a>
</div>
        <img class="img_barra" src="img/Encoding-removebg-preview.png" alt="">
    <br>
</header>
    <main class="conteudo">
    <form name="formEmprestimo" method="POST" action="emprestimo.php">
        <fieldset>
            <legend>Adicionar Emprestimo</legend>
        
            <br>
            Nome: <input class="form-control form-control-sm" type="text" name="nomeAluno" required>
            <br>
            Data de Empréstimo: <input class="form-control form-control-sm" type="date" name="dataEmprestimo" required>
            <br>
            Título do Livro: <input class="form-control form-control-sm" type="text" name="tituloLivro" required>
            <br>
            Data de Devolução: <input class="form-control form-control-sm" type="date" name="dataDevolucao" required>
            <br>
        
        <button name= "Enviar" id="Enviar" class= "submit">Enviar</button>
    
        </fieldset>
    </form>
</main>

</body>

</html>


<?php 
    require_once('conexao.php');
        if(isset($_POST['Enviar'])){
            $curso=$_POST['curso'];
            $nomeAluno=$_POST['nomeAluno'];
            $dataEmprestimo=$_POST['dataEmprestimo'];
            $tituloLivro=$_POST['tituloLivro'];
            $dataDevolucao=$_POST['dataDevolucao'];

        try{
            $stmte = $pdo->prepare("INSERT INTO emprestimo(curso, nomeAluno, dataEmprestimo, tituloLivro, dataDevolucao) VALUES(?, ?, ?, ?, ?)");
            $stmte -> bindParam(1, $curso, PDO::PARAM_STR);
            $stmte -> bindParam(2, $nomeAluno, PDO::PARAM_STR);
            $stmte -> bindParam(3, $dataEmprestimo, PDO::PARAM_STR);
            $stmte -> bindParam(4, $tituloLivro, PDO::PARAM_STR);
            $stmte -> bindParam(5, $dataDevolucao, PDO::PARAM_STR);
            $executa = $stmte->execute();

            if($executa){
                echo 'Dados inseridos com sucesso';
                header('location: relatorio.php');
            }else{
                echo "erro ao inserir dados";
            }

        
        
        
        }catch(PDOException $e){
            echo $e->GetMessage();
        }
        
        }
    

?>
