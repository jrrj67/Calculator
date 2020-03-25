<?php

$input = $_POST['input'];
$values = explode(" ", $input);
$strValues = str_replace('x', '*', implode($values));
validate($strValues);

class Result {
    public $result;
    public $history;

    public function __construct($result, $history, $strValues)
    {
        $this->result = $result;
        $this->history = $strValues . " = " . $history;
    }
}

function validate($strValues)
{
    if (!strpbrk($strValues, '1234567890+-*/')) {
        $result = 'Valor inválido';
        $objResult = new Result($result, $result, $strValues);
        $objResult->history = "";
        echo json_encode($objResult);
    } else {
        try {
            $result = @eval("return $strValues;");
            if($result === INF) {
                $result = 'Divisão por zero é impossível';
                $objResult = new Result($result, $result, $strValues);
                $objResult->history = "";
                echo json_encode($objResult);
            } else {
                $objResult = new Result($result, $result, $strValues);
                echo json_encode($objResult);
            }
        } catch (ParseError $error) {
            $result = 'Valor inválido';
            $objResult = new Result($result, $result, $strValues);
            $objResult->history = "";
            echo json_encode($objResult);
        }
    }
}