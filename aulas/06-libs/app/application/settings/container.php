<?php
use DRC\Report\Application\Report;
use DRC\Report\Interaction\DataProcessor;
use DRC\Report\Service\Money\Service;
use DRC\Report\Service\Output\Shell;
use DRC\Report\Service\Output\HTML;
use Moltin\Currency\Currency;
use Moltin\Currency\Exchange\OpenExchangeRates;
use Moltin\Currency\Format\Runtime;

$container['runtime'] = function ($c) {
    return new Runtime();
};
$container['openexchange'] = function ($c) {
    return new OpenExchangeRates($c['ini']['openexchange.appid']);
};
$container['currency'] = function ($c) {
    return new Currency($c['openexchange'], $c['runtime']);
};
$container['money'] = function ($c) {
    return new Service($c['isosign']);
};
$container['processor'] = function ($c) {
    return new DataProcessor($c['ini']['data.source']);
};
$container['output.html'] = function ($c) {
    return new HTML();
};
$container['output.default'] = function ($c) {
    return new Shell();
};
$container['report'] = function ($c) {
    return new Report(
        $c['processor'],
        $c[$c['output']],
        $c['money']
    );
};