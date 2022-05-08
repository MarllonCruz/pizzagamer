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
    return (new DateTime($date))->format($formatDate) . " ás " . (new DateTime($date))->format($formatHour) . "h" . (new DateTime($date))->format($formatMin);
}

/**
 * @param string $date
 * @return string
 */
function date_fmt_ago(string $date): string
{
    $d1   = new DateTime($date);
    $d2   = new DateTime(now());
    
    $diff = $d2->diff($d1);

    if ($diff->y >= 1) {
        return ($diff->y > 1) ? $diff->y . ' anos atrás' : $diff->y . ' ano atrás';
    }

    if ($diff->m >= 1) {
        return $diff->m  . ' mês atrás';
    }

    if ($diff->d >= 1) {
        return ($diff->d > 1) ? $diff->d . ' dias atrás' : $diff->d . ' dia atrás';
    }

    if ($diff->h >= 1) {
        return ($diff->h > 1) ? $diff->h . ' horas atrás' : $diff->h . ' hora atrás';
    }

    if ($diff->i >= 1) {
        return ($diff->i > 1) ? $diff->i . ' minutos atrás' : $diff->i . ' minuto atrás';
    }

    if ($diff->s >= 1) {
        return ($diff->s > 1) ? $diff->s . ' segundos atrás' : $diff->s . ' segundo atrás';
    }
}