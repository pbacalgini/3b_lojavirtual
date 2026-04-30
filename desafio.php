<?php
$nomeAluno = "João"; //string
$idadeAluno = 20; //int
$cursoAluno = "Engenharia"; //string
?>
<?php
echo ("meu nome e " . $nomeAluno . ", minha idade e " . $idadeAluno . " e curso " . $cursoAluno . ".");
?>
<br>
<?php
$nota1 = 8.5; //float
$nota2 = 7.0; //float
$media = ($nota1 + $nota2) / 2; //float
echo ("A média das notas é " . $media . ".");
?>
<br>
<?php
$idade = 18;
if ($idade >=18) {
    echo("voce e maior de idade.");
    } else {
    echo("voce e menor de idade.");
    }
?>
<br>
