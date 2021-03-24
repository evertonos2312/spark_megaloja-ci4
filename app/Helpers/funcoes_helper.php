<?php

/*
Formata o valor para o padrão brasileiro
@param [type] $valor
@return void
*/

function formata_valor($valor)
{
    return number_format($valor, 2, ',', '.');
}
/* 
Formata uma data para o padrão brasileiro
@param [type] $data
$return void
*/

function toDataBR($data)
{
    return date('d/m/Y H:i:s', strtotime($data));
}