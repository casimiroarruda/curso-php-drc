<?php
error_reporting(E_ALL);
/**
 * Nova classe
 */
class Cachorro
{
    /**
     * caracteristicas
     * atributos/attribute
     */
    /**
     * @var string
     */
    protected $nome;
    /**
     * @var int
     */
    protected $tamanho;
    /**
     * @var int
     */
    protected $idade;
    /**
     * @var string
     */
    protected $sexo;
    /**
     * @var string
     */
    protected $raca;
    /**
     * @var int
     */
    private $ferocidade;

    /**
     * @return int
     */
    public function getTamanho()
    {
        return $this->tamanho;
    }

    /**
     * @param int $tamanho
     */
    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;
    }

    /**
     * @return int
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @param int $idade
     */
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    /**
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return string
     */
    public function getRaca()
    {
        return $this->raca;
    }

    /**
     * @param string $raca
     */
    public function setRaca($raca)
    {
        $this->raca = $raca;
    }

    /**
     * @return int
     */
    public function getFerocidade()
    {
        return $this->ferocidade;
    }

    /**
     * @param int $ferocidade
     */
    public function setFerocidade($ferocidade)
    {
        $this->ferocidade = $ferocidade;
    }




    /**
     * ações
     * métodos/method
     */


    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    function correr()
    {

    }

    /**
     * exemplo de type hint (Cachorro $paraquem)
     * @param Cachorro $paraQuem
     * @return string
     */
    public function latir(Cachorro $paraQuem)
    {
        $acao = $this->nome. " está latindo para ". $paraQuem->nome.PHP_EOL;
        if($paraQuem->ferocidade >= 3){
            $acao .= $paraQuem->nome. ' latiu de volta'.PHP_EOL;
        }
        return $acao;
    }

    public function andar()
    {

    }

    public function comer(array $coisas = [])
    {

    }

    public function beber()
    {

    }

    public function fazerXixi()
    {

    }
}

class CaoDeGuarda extends Cachorro{
    function latir(Cachorro $paraQuem){
        //sem efeito pois está private na classe pai
        //$this->ferocidade = 5;
        return $this->nome.' está rosnando'.PHP_EOL;
    }

}

$Max = new Cachorro;
$Blaze = new Cachorro;
$Puppy = new CaoDeGuarda;


$Max->setNome('Max');
$Max->setFerocidade(0);

$Blaze->setNome('Blaze');
$Blaze->setFerocidade( 5);

$Puppy->setNome('Puppy');

echo $Max->latir($Blaze);
echo $Blaze->latir($Max);
echo $Puppy->latir($Max);

var_dump($Max instanceof Cachorro);
var_dump($Max instanceof CaoDeGuarda);
var_dump($Puppy instanceof Cachorro);
var_dump($Puppy instanceof CaoDeGuarda);

var_dump($Puppy);
var_dump($Puppy->getFerocidade());
exit;
// pipoco!
$Blaze->nome = 'Asdrubal';
var_dump($Blaze);
