<?php
$dbname = "udemy_loja_online";
$username = "user_loja_web";
$password = "123";

$ligacao = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $username, $password);

try {
    //EXEC
    //Usado para INSERT, UPDATE, DELETE
    // Não retorna dados
    // Retorna o número de linhas afetadas  
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user1','111')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user2','222')");
    $ligacao->exec("INSERT INTO usuarios VALUES(0,'user3','333')");
    //erro programado abaixo para uma tabela que NAO EXISTE
    $ligacao->exec("INSERT INTO user VALUES(0,'user4','444')");
    // User 3, 2 e 1 serão cadastrados normalmente porém o 4 não, e a partir daqui o codigo não é mais exibido e nãocai no catch
    echo "deu tudo certo";

} catch (Exception $erro) {
    echo "<script> console.log('<?= . json_encode($erro) ?>') </>";
    echo "algo não saiu como esperado";
}
