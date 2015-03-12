<?php
$alunos = [
  'instrutor' => 'Anderson',
  'aluno1' => 'Bruno',
  'aluno2' => 'Marcos',
  'alunoInstrutor' => 'Ricardo'
];

function listagem($lista){
    $saida = '';
    for($i = 0,$t = count($lista);$i < $t;$i++)
    {
        $item = $i.": ".$lista[$i].PHP_EOL;
        $saida .= $item;
        //$saida = $saida.$item;
    }
    return $saida;
}

echo listagem($alunos);
echo listagem([1,2,3]);