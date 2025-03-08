<?php

// Recebendo os dados do formulário
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$email = $_POST['email'];
$cidade = $_POST['cidade'];

// Recebendo as notas e transformando-as em valores numéricos
$matematica = floatval($_POST['matematica']);
$portugues = floatval($_POST['portugues']);
$historia = floatval($_POST['historia']);

// Exibir os valores recebidos (para depuração)
echo "Matematica: $matematica<br>";
echo "Portugues: $portugues<br>";
echo "Historia: $historia<br>";

// Inclui a classe do aluno (certifique-se de que esta classe existe e está funcionando)
include "aluno.php";

// Criamos um objeto do tipo Aluno
$aluno = new Aluno();
$aluno->nome = $nome;
$aluno->idade = $idade;
$aluno->email = $email;
$aluno->cidade = $cidade;

// Verificamos o status de aprovação/reprovação em cada disciplina
$aluno->matematica_status = ($matematica >= 6) ? "Aprovado" : "Reprovado";
$aluno->portugues_status = ($portugues >= 6) ? "Aprovado" : "Reprovado";
$aluno->historia_status = ($historia >= 6) ? "Aprovado" : "Reprovado";

// Exibir o status (para depuração)
echo "Matematica Status: {$aluno->matematica_status}<br>";
echo "Portugues Status: {$aluno->portugues_status}<br>";
echo "Historia Status: {$aluno->historia_status}<br>";

// Transforma o objeto em JSON
$json = json_encode($aluno, JSON_PRETTY_PRINT);

// Salva o JSON num arquivo
file_put_contents('aluno.json', $json);

// Redireciona para o formulário
header("Location: formulario.html");
exit();

?>
