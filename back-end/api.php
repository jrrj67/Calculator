<?php

$input = $_POST['input'];
$values = explode(" ", $input);
$strValues = str_replace('x', '*', implode($values));
validate($strValues);

function validate($strValues)
{
    if (!strpbrk($strValues, '1234567890+-*/')) {
        echo 'Valor inválido';
    } else {
        try {
            $result = @eval("return $strValues;");
            if($result === INF) {
                echo 'Divisão por zero é impossível';
            } else {
                echo $result;
            }
        } catch (ParseError $error) {
            echo 'Valor inválido';
        }
    }
}