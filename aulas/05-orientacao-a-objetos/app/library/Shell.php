<?php

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
            $output .= $this->montalinha($bandeira, $valor, [$this->report->getCurrency(), 'convert']);
            $total += $valor;
        }
        $output .= $this->montalinha('TOTAL', $total, [$this->report->getCurrency(), 'convert']);
        return $output;
    }

}