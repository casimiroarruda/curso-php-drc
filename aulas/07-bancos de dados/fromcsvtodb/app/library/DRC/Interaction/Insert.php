<?php
namespace DRC\Interaction;

class Insert
{
    public function run(\PDO $pdo)
    {
        $csv = file(__DIR__ . "/resources/sales.csv");
        $columnsLine = array_shift($csv);
        $columns = array_map('strtolower', explode(",", $columnsLine));
        $columns = array_map('trim', $columns);

        $insert = $pdo->prepare(<<<SQL
INSERT INTO sale
(transaction_date,product,price,payment_type,`name`,city,state,country,account_created,last_login,latitude,longitude)
VALUES
(:transaction_date,:product,:price,:payment_type,:name,:city,:state,:country,:account_created,:last_login,:latitude,:longitude)
SQL
        );
        $structuredCsv = array_map(
            function ($item) {
                return explode(',', $item);
            },
            $csv
        );
        foreach ($structuredCsv as $line) {
            $this->processLine($line,$insert,$columns);
        }


    }

    protected function processLine($line, \PDOStatement $insert, $columns)
    {
        if (count($line) != 12) {
            return false;
        }
        $row = array_combine($columns, $line);
        $row['transaction_date'] = $this->convertDate($row['transaction_date']);
        $row['account_created'] = $this->convertDate($row['account_created']);
        $row['last_login'] = $this->convertDate($row['last_login']);
        return $insert->execute($row);
    }

    protected function convertDate($string)
    {
        $obj = new DateTime($string);
        return $obj->format('Y-m-d H:i:s');
    }
}