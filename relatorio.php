<?php

require_once('conexao.php');
try{
    $stmte = $pdo->query("SELECT * FROM emprestimo");
    $executa = $stmte->execute();
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $stmte = $pdo->query("SELECT * FROM emprestimo WHERE id LIKE '%$data%' or curso LIKE '%$data%' or nomeAluno LIKE '%$data%' or dataEmprestimo LIKE '%$data%' or tituloLivro LIKE '%$data%' or dataDevolucao LIKE '%$data%' or status LIKE '%$data%' ORDER BY id DESC");
    }
    else
    {
        $stmte = $pdo->query("SELECT * FROM emprestimo");
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Relatórios</title>
    <style>
body{
    background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    text-align: center;
    color: white;
 }
h3{
    color: white;
    text-decoration: none;
}
.table-bg{
    background: rgba(0,0,0,0.4);
    border-radius: 15px 15px 0 0;
}   
.box-search{
    display: flex;
    justify-content: center;
    gap: .1%;
}
.bttn{
    display: flex;
    flex-direction: row-reverse;
}


</style> 

</head>

<body>
    <nav class="">
  
        <a class="navbar-brand" href="#">
            <img src="img/Encoding-removebg-preview.png" alt="" width="200" height="164" class="d-inline-block align-text-top">
        </a>
    </nav>
<br>
    
<div class="box-search">
    <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
    <button onclick="searchData()" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
    </button>
</div>
<br>

<div class="bttn">
    <a href="index.html" class="btn btn-danger me-5">Sair</a>
</div>
 
<div class="m-5"> 
<table class="table text-white table-bg" >
<thead>
    <tr>     
      
    
    <th scope="col">Nome</th>
    <th scope="col">Data de Empréstimo</th>
    <th scope="col">Titulo do Livro</th>
    <th scope="col">Data de Devolução</th>
    <th scope="col">Status</th>
    <th colspan="2" align="center">Opções</th>
    </tr>
</thead>
<tbody>
 <?php
    if($executa){
        while($reg = $stmte->fetch(PDO::FETCH_OBJ)){ // Para recuperar um ARRAY utilize PDO::FETCH_ASSOC 
?>
    <tr>
        
		
        <td><?=$reg->nomeAluno?></td>
        <td><?=$reg->dataEmprestimo?></td>
        <td><?=$reg->tituloLivro?></td>
        <td><?=$reg->dataDevolucao?></td>
        <td><?=$reg->status?></td>
		<td><a class='btn btn-sm btn-primary' href="editar.php?id=<?=$reg->id?>">Editar</a>
        <a class='btn btn-sm btn-danger' href="dar_baixa.php?id=<?=$reg->id?>">Dar Baixa</a></td>
    </tr>
  </tbody>

</div>
    </body>
    <script>
        var search = document.getElementById('pesquisar');
        search.addEventListener("keydown", function(event){
            if (event.key === "Enter")
            {
                searchData();
            }
        });
        
        function searchData()
        {
            window.location = 'relatorio.php?search='+search.value;
        }
    
</script>
</html>

<?php
}
    print '</table>';
}else{
    echo 'Erro ao inserir os dados';
}

}catch(PDOException $e){
    echo $e->getMessage();
}
?>

