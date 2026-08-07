<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex_1</title>
</head>
<body>
    <h2>Analisador de Textos</h2>

    <form method="POST">
        <label for="texto">Texto:</label> 
        <input type="text" name="texto" placeholder="Insira aqui seu texto">
        <br>
        <br>
        <button type="submit">Entrar</button>

    </form>
    <br>
</body>
</html>


<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto = $_POST["texto"];

    function ContarCaracteres($string){
        return mb_strlen($string, 'UTF-8');
    }

     function ContarPalavras($string){
        return str_word_count($string);
     }

    echo "Texto: " . $texto . "<br>";

    echo "Caracteres: " . ContarCaracteres($texto) . "<br>";
    echo "Palavras: " . ContarPalavras($texto) . "<br>";











    }