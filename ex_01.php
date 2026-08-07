<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex_1</title>
</head>
<body>
    <h2>Analisador de senhas</h2>

    <form method="POST">
        <label for="senha">Senha:</label> 
        <input type="password" name="senha" placeholder="Insira aqui sua senha" minlength="8">
        <br>
        <br>
        <button type="submit">Entrar</button>

    </form>
    <br>
</body>
</html>


<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST["senha"];

    function  ContarMaiusculas($texto){

            preg_match_all('/[A-Z]/', $texto, $maiusculas);
            return count($maiusculas[0]);
            
    }

        function  ContarMinusculas($texto){

            preg_match_all('/[a-z]/', $texto, $minusculas);
            return count($minusculas[0]);
            
    }
    function  ContarNumeros($texto){

            preg_match_all('/\d/', $texto, $numeros);
            return count($numeros[0]);
            
    }
       function  ContarEspeciais($texto){

            preg_match_all('/[^\p{L}\p{N}\s]/u', $texto, $especiais);
            return count($especiais[0]);
            
    }

        function ContarTamanho($texto){
            return mb_strlen($texto , 'UTF-8'); 
        }

        function NivelSeguranca($texto){
            $ContarSeguranca = 0;
            if (ContarEspeciais($texto) > 0){
                $ContarSeguranca += 1;
            } if (ContarNumeros($texto) > 0 ){
                $ContarSeguranca += 1;
            } if (ContarMinusculas($texto) > 0){
                $ContarSeguranca += 1;
            } if (ContarTamanho($texto) >= 8){
                $ContarSeguranca += 1;
            }
        
        switch($ContarSeguranca){

            case '0':
            case '1': 
                  $seguranca = "Fraca";
                 break;
            case '2':
                $seguranca = "Média";
                break;
            case '3':
                $seguranca = "Forte";
                break;
            case '4':
                $seguranca = "Muito Forte";
                break;
        }
            return $seguranca;
        }

    function AnalisarSenha($texto){   
    echo "Senha recebida: " . $texto . "<br>";

    echo "Especiais: " . ContarEspeciais($texto) . "<br>";
    echo "Números: " . ContarNumeros($texto) . "<br>";
    echo "Minúsculas: " . ContarMinusculas($texto) . "<br>";
    echo "Maiúsculas: " . ContarMaiusculas($texto) . "<br>";
    echo "Tamanho: " . ContarTamanho($texto) . "<br>";
    echo "Resultado: " . NivelSeguranca($texto);
    } 

    echo AnalisarSenha($senha);
    }
?>
