<?php
date_default_timezone_set('America/Sao_Paulo');
//$file = file_get_contents('SacramentocrimeJanuary2006.csv');
//$report = explode("\r",$file);
$report = file('crimes.csv');
$columns = current($report);
$columns = explode(',', $columns);
$columns = array_flip($columns);
$line = next($report);
$summary = [];
$daySummary = [];
$dict = [
    'us' => [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ],
    'br' => [
        'Domingo',
        'Segunda',
        'Terça',
        'Quarta',
        'Quinta',
        'Sexta',
        'Sábado'
    ]
];


/**
 * Obtem Info de uma linha
 * @param string $line
 * @return array
 */
function getInfoFromLine($line)
{
    global $columns; // referencia do escopo global
    $dado = explode(',', $line);
    $info = [];
    foreach ($columns as $column => $index) {
        $info[trim($column)] = trim($dado[$index]);
    }
    return $info;
}

/**
 * Adiciona um crime ao resumo
 * @param string $crime
 * @param array $summary
 */
function addCrimeToSummary($crime, &$summary)
{
    if (!isset($summary[$crime])) {
        $summary[$crime] = 0;
    }
    $summary[$crime]++;
    return;
}

/**
 * Adiciona um crime a um dia da semana no Resumo
 * @param string $crime
 * @param string $dateString
 * @param array $xpto
 * @internal param string $date
 */
function addCrimeFromWeekDayToSummary($crime, $dateString, & $xpto)
{
    $weekDay = getWeekDayByDate($dateString);
    if (!isset($xpto[$weekDay][$crime])) {
        $xpto[$weekDay][$crime] = 0;
    }
    $xpto[$weekDay][$crime]++;
}

/**
 * Extrai o dia da semana de uma determinada data
 * @param string $dateString
 * @return int
 */
function getWeekDayByDate($dateString)
{
    list($date, $time) = explode(' ', $dateString);
    list($month, $day, $year) = explode('/', $date);
    list($hour, $minute) = explode(':', $time);
    $timestamp = mktime(
        $hour,
        $minute,
        0,
        $month,
        $day,
        $year);
    return date('w', $timestamp);
}

while ($line) {
    $info = getInfoFromLine($line);
    addCrimeToSummary($info['crimedescr'], $summary);
    addCrimeFromWeekDayToSummary($info['crimedescr'], $info['cdatetime'], $daySummary);
    $line = next($report);
}

unset($report);
arsort($summary);
print_r($summary);
arsort($daySummary);
print_r($daySummary);
$simpleByDay = [];
foreach ($daySummary as $day => $crimes) {
    $simpleByDay[$day] = array_sum($crimes);
}
$language = 'br';
foreach($simpleByDay as $day => $nrOfCrimes){
    echo "{$dict[$language][$day]}: {$nrOfCrimes}",PHP_EOL;
}