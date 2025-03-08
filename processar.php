<?php

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$email = $_POST['email'];
$cidade = $_POST['cidade'];
$matematica = $_POST['matematica'];
$portugues = $_POST['portugues'];
$historia = $_POST['historia'];

// Inclui a classe do aluno
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

// Transforma o objeto em JSON
$json = json_encode($aluno, JSON_PRETTY_PRINT);

// Salva o JSON num arquivo
file_put_contents('aluno.json', $json);

// Redireciona para o formulário
header("Location: formulario.html");
exit();

?>

