
<?php
//correção do erro
$dbname = "udemy_loja_online";
$username = "user_loja_web";
$password = "123";

$ligacao = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $username, $password);

try{
  //beginTransaction funcionará como ponto de partida. Inicia uma transação e as alterações ficam “pendentes” até completarem o block
  $ligacao->beginTransaction();    
  $ligacao->exec("INSERT INTO usuarios VALUES(0,'user1','111')");
  $ligacao->exec("INSERT INTO usuarios VALUES(0,'user2','222')");
  $ligacao->exec("INSERT INTO usuarios VALUES(0,'user3','333')"); 
  //erro programado abaixo para uma tabela que NAO EXISTE
  $ligacao->exec("INSERT INTO user VALUES(0,'user4','444')"); 
  $ligacao->commit();
  //commit confirma tudo que foi feito e salva no banco, se algo der errado usará o rollback

}
catch(PDOException $erro){
    $ligacao->rollBack();
    echo "<script>console.log(" . json_encode($erro->getMessage()) . ")</script>";
    echo "algo não saiu como esperado";
}


?>
