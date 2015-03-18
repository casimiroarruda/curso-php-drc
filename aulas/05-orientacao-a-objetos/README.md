# Curso PHP

## Orientação a Objetos

> Orientação a Objetos é um paradigma de programação que originalmente tenta traduzir construtos do mundo físico para
> lógica de programação. Esse paradigma permite, entre outros benefícios, melhor legibilidade e manutenção de 
> código, além de permitir que estruturas mais complexas possam ser usadas como entidades dos programas, 
> melhorando, e muito, a comunicação entre as entidades computacionais.

## Classe

Definição de tipo

ex: Cachorro

 * **caracteristicas**
   * tamanho
   * idade
   * sexo
   * raça
   * ferocidade
 * **ações**
   * correr
   * latir
   * andar
   * comer
   * beber
   * fazerXixi
  
Max é uma instância de Cachorro
Blaze é uma instância de Cachorro

Em PHP

```php
<?php
/**
  * Nova classe
  */
class Cachorro {
  $tamanho;
  $idade;
  $sexo;
  $raca;
  $ferocidade;
  
  function correr(){
  
  }
  
  function latir(){
  
  }
  
  function andar(){
  
  }
  
  function comer(){
  
  }
  
  function beber(){
  
  }
  
  function fazerXixi(){
  
  }
}

$Max = new Cachorro;
$Blaze = new Cachorro;
```