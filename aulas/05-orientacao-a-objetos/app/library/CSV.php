<?php
class CSV extends Output implements Printable
{

    public function show(DataProcessor $processor)
    {
        $report = $processor->processa();
        $output = 'Bandeira;Faturamento' . PHP_EOL;
        $total = 0;
        foreach ($report as $bandeira => $valor) {
            $total += $valor;
            $valor = $this->report->getCurrency()->convert($valor);
            $output .= "$bandeira;$valor" . PHP_EOL;
        }
        $total = $this->report->getCurrency()->convert($total);
        $output .= "TOTAL;$total" . PHP_EOL;
        return $output;
    }

}