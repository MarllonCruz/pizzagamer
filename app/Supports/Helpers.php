<?php

date_default_timezone_set('America/Sao_Paulo');

/**
 * ################
 * ###   DATE   ###
 * ################
 */

/**
 * @param string|null $date
 * @param string $format
 * @return string
 */
function date_fmt(string $date = null, string $format = "d/m/Y H\hi"): string
{   
    $date = (empty($date) ? "now" : $date);
    return (new DateTime($date))->format($format);
}

/**
 * @param string|null $date
 * @return string
 */
function date_fmt_br(?string $date): string
{   
    $date = (empty($date) ? "now" : $date);
    return (new DateTime($date))->format("d/m/Y H:i:s");
}

/**
 * @param string|null $date
 * @return string
 * @throws Exception
 */
function date_fmt_custom(string $date = null): string
{   
    $formatDate = "d/m/Y";
    $formatHour = "H";
    $formatMin  = "i";

    $date = (empty($date) ? "now" : $date);
    return (new DateTime($date))->format($formatDate) . " - " . (new DateTime($date))->format($formatHour) . "h" . (new DateTime($date))->format($formatMin) . "m";
}