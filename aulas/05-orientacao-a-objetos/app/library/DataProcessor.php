<?php

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
            $this->adicionarAoRelatorio($report, $celulasLimpas, $columnNames);
        }
        return array_filter($report);
    }

    protected function adicionarAoRelatorio(array &$report, $linhaASerProcessada, &$columnNames)
    {
        $celulaEstruturada = array_combine($columnNames, $linhaASerProcessada);
        if (!isset($report[$celulaEstruturada['payment_type']])) {
            $report[$celulaEstruturada['payment_type']] = 0;
        }
        $report[$celulaEstruturada['payment_type']] += $celulaEstruturada['price'];
    }

}