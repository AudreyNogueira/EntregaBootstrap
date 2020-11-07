<?php 
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "fseletro";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn) {
    die("A conexão ao BD falhou:" . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" type="text/css" href="./CSS/estilo.css" media="screen" />
    <meta charset="UTF-8">
    <title>Produtos-Full Stack Eletro</title>
    <script src="index.js"></script>
    <link rel="stylesheet"
     href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
       crossorigin="anonymous">

    <script type="text/javascript">
    	
        function aumentaImagem(nome){
       nome.width = nome.width+50;
       nome.height = nome.height+50;
        }
        function tamanhoNormal(nome){
            if (nome.width+50 &&  nome.height+50){
       nome.width = 150;
       nome.height = 220;	
      alert("clique duas vezes para redimencionar e diminuir a imagem ampliada.");
        }
    }
    
        </script>
</head>

<body>

  
    <?php include ('menu.html');
    ?>
   
    <div class="jumbotron jumbotron-fluid">

    <h1 class="display-4">Os melhores produtos você encontra aqui !</h1>
    <p class="lead">Realize sua compra e ganhe 20% de desconto no valor total.</p>
  </div>

 
<!-- nova categoria -->
<div style="align-items: right;" class="d-flex flex-column bd-highlight mb-3">
  <div class="categoria" onclick="exibirTodos()" class="p-2 bd-highlight">Exibir todos(12)</div>
  <div class="categoria" onclick="exibirCat('geladeira')"class="p-2 bd-highlight">Geladeira (3)</div>
  <div class="categoria" onclick="exibirCat('fogão')"class="p-2 bd-highlight">Fogões (2)</div>
  <div class="categoria" onclick="exibirCat('microondas')"class="p-2 bd-highlight">Micro-ondas (3)</div>
  <div class="categoria" onclick="exibirCat('maquina')"class="p-2 bd-highlight">Lavadora de roupas (2)</div>
  <div class="categoria" onclick="exibirCat('lavalouca')"class="p-2 bd-highlight">Lava louças (2)</div>
</div>    
</div>

        <?php 
        $sql = "select * from produto";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        while($rows = $result->fetch_assoc()){
        // echo $rows["categoria"];
        ?>
<div class="boxProduto">
         <div class="produto" id="<?php echo $rows["categoria"]; ?>">
            <img class="imge" src="<?php echo $rows["imagem"]; ?>" width="120px" height="170" 
            onclick="aumentaImagem(this);"  
           ondblclick="tamanhoNormal(this);"
            style="cursor:pointer" />
            <br>
            <p class="descricao"><?php echo $rows["descricao"]; ?></p>
            <p class="preco"><strike>R$<?php echo $rows["preco"]; ?></strike></p>
            <p class="precofinal">R$<?php echo $rows["precofinal"]; ?></p>
            <button type="button" class="btn btn-success">Comprar</button>
           <hr>
            </div>
        <?php
        }} else{
            echo "nenhum produto foi encontrado";
        }
        
        ?>
         </section>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
      
        <footer id="rodape">
            <p id="formasPagamento">
                <b>Formas de pagamento:</b>
            
                <div class="text-center">
  <img src="./img/Cartao.jpeg" class="rounded" alt="...">
</div>
<footer><p>&copy; Recode Pro </p>
</footer>

      
</body>

</html>