<?php
/**
 * Relatorios OOP-way
 */

/**
 * Class DataProcessor
 *
 */
class DataProcessor
{
    protected $path = '';

    /**
     * @param $filePath
     */
    public function __construct($filePath)
    {
        $this->path = $filePath;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    protected function normalizador($item)
    {
        return trim(strtolower($item));
    }

    protected function obterCabecalho($primeiraLinha)
    {
        $colunas = explode(',', $primeiraLinha);
        $colunasLimpas = array_map('trim', $colunas);
        $colunasNormalizadas = array_map([$this, 'normalizador'], $colunasLimpas);
        return array_filter($colunasNormalizadas);
    }

    protected function limpaCelula($linha)
    {
        $celulas = explode(',', $linha);
        return array_map('trim', $celulas);
    }

    protected function eliminaErradas($linha)
    {
        if (!is_array($linha)) {
            return false;
        }
        return 12 === count($linha);
    }

    /**
     * Processa a informação do csv
     * @return array
     */
    public function processa()
    {
        $data = file($this->path);
        $primeiraLinha = array_shift($data);
        $columnNames = $this->obterCabecalho($primeiraLinha);
        $data = array_map([$this, 'limpaCelula'], $data);
        $data = array_filter($data, [$this, 'eliminaErradas']);
        $report = [];
        foreach ($data as $celulasLimpas) {
            $celulaEstruturada = array_combine($columnNames, $celulasLimpas);
            $report[$celulaEstruturada['payment_type']] += $celulaEstruturada['price'];
        }
        return array_filter($report);
    }

}

class Report
{
    /**
     * @var DataProcessor
     */
    protected $processor;
    /**
     * @var Printable
     */
    protected $output;

    public function __construct(DataProcessor $processor, Printable $output)
    {
        $this->processor = $processor;
        $this->output = $output;
    }

    public function gerar()
    {
        return $this->output->show($this->processor);
    }
}

interface Printable
{
    public function show(DataProcessor $processor);
}

class Shell implements Printable
{
    protected $title = 'Relatório de faturamento / bandeira';
    protected $reportWidth = 40;

    protected function montaLinha($nome, $valor, $formatarMoeda)
    {
        return '|' . str_pad($nome, 15, ' ', STR_PAD_BOTH) .
        '|' . str_pad($formatarMoeda($valor), $this->reportWidth - 15 - 3, ' ', STR_PAD_LEFT) . '|' . PHP_EOL .
        str_repeat('-', $this->reportWidth) . PHP_EOL;
    }

    public function show(DataProcessor $processor)
    {
        $report = $processor->processa();

        $output = PHP_EOL . $this->title . PHP_EOL;
        $output .= str_repeat('-', $this->reportWidth) . PHP_EOL;
        $output .= '|' . str_pad(strtoupper('Bandeira'), 15, ' ', STR_PAD_BOTH);
        $output .= '|' . str_pad(strtoupper('Faturamento'), $this->reportWidth - 15 - 3, ' ', STR_PAD_BOTH) . '|' . PHP_EOL;
        $output .= str_repeat('-', $this->reportWidth) . PHP_EOL;
        $total = 0;
        foreach ($report as $bandeira => $valor) {
            $output .= $this->montalinha($bandeira, $valor, [MoneyFormater, 'br']);
            $total += $valor;
        }
        $output .= $this->montalinha('TOTAL', $total, [MoneyFormater, 'br']);
        return $output;
    }

}

class HTML implements Printable
{
    public function show(DataProcessor $processor)
    {
        $report = $processor->processa();
        $title = 'Relatório de faturamento / bandeira';
        $output = '<html><head><title></title></head><meta charset="utf-8"/>';
        $output .= '<body>';
        $output .= '<table>';
        $output .= PHP_EOL . "<caption>$title</caption>" . PHP_EOL;
        $output .= '<tr>' . PHP_EOL;
        $output .= "<th>Bandeira</th><th>Faturamento</th>" . PHP_EOL;
        $output .= '</tr>' . PHP_EOL;
        foreach ($report as $bandeira => $valor) {
            $output .= '<tr>' . PHP_EOL;
            $output .= "<td>$bandeira</td>";
            $output .= "<td>" . MoneyFormater::br($valor) . "</td>" . PHP_EOL;
            $output .= '</tr>' . PHP_EOL;
        }
        $output .= '</table></body></html>';
        return $output;
    }

}

class CSV implements Printable
{

    public function show(DataProcessor $processor)
    {
        $report = $processor->processa();
        $output = 'Bandeira;Faturamento' . PHP_EOL;
        $total = 0;
        foreach ($report as $bandeira => $valor) {
            $total += $valor;
            $valor = MoneyFormater::br($valor);
            $output .= "$bandeira;$valor" . PHP_EOL;
        }
        $total = MoneyFormater::br($total);
        $output .= "TOTAL;$total" . PHP_EOL;
        return $output;
    }

}

class MoneyFormater
{
    public static function br($item)
    {
        return 'R$ ' . number_format($item * M_PI, 2, ',', '');
    }

    public static function us($item)
    {
        return 'US$ ' . number_format($item, 2, '.', ',');
    }
}

$processor = new DataProcessor(__DIR__ . '/../04-arrays/sales.csv');
$outputShell = new Shell();
$outputHTML = new HTML();
$outputCSV = new CSV();
$report = new Report($processor, $outputCSV);
echo $report->gerar();
