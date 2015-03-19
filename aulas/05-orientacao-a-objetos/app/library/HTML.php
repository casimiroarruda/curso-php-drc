<?php

class HTML extends Output implements Printable
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
            $output .= "<td>" . $this->report->getCurrency()->convert($valor) . "</td>" . PHP_EOL;
            $output .= '</tr>' . PHP_EOL;
        }
        $output .= '</table></body></html>';
        return $output;
    }

}