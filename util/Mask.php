<?php
// PHP Máscara CNPJ, CPF, Data e qualquer outra coisa
// http://blog.clares.com.br/php-mascara-cnpj-cpf-data-e-qualquer-outra-coisa/
// ver em funcionamento ~~> https://ideone.com/wP7zN2


function mask($val, $mask)
{
    $maskared = '';
    $k = 0;
    for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
        if ($mask[$i] == '#') {
            if (isset($val[$k])) {
                $maskared .= $val[$k++];
            }
        } else {
            if (isset($mask[$i])) {
                $maskared .= $mask[$i];
            }
        }
    }

    return $maskared;
}