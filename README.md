
-Este código é exemplo prático para aprender sobre Transactions em PHP usando a extensão PDO.

Este repositório contém dois exemplos de manipulação de banco de dados MySQL via PHP (PDO). 
O foco é entender como o banco de dados reage quando ocorre um erro no meio de múltiplas inserções.

- O Problema: Execução Direta (conexao1.php)
As instruções são enviadas uma a uma.
Comportamento: O PHP insere user1, user2 e user3. Ao chegar no user4 (que aponta para uma tabela inexistente), o codigo para de ser executado e nao é direcionado para o catch.
Resultado: Os três primeiros usuários permanecem no banco de dados, criando uma "operação incompleta". 

-A Solução: Transações (conexao2.php)
Utiliza os métodos beginTransaction, commit e rollBack.
Comportamento: O PDO "segura" as alterações em um estado temporário.

Quando o erro no user4 ocorre, o bloco catch é acionado e executa o $ligacao->rollBack() que impede o envio para o banco.

Resultado: Nenhuma das inserções é salva. O banco de dados volta ao estado original de antes do início do script, garantindo que você não tenha dados parciais no sistema.
