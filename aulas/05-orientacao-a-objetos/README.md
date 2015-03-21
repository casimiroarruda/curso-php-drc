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


> Ler: Martin Fowler


## Por que Orientação a Objetos?

1. Usar elementos do mundo real no mundo lógico
2. Criação de novos Tipos
3. Melhorar o Desenvolvimento e a Manutenção
4. Facilitar o entendimento e comunicação entre as diversas entidades.
5. Reusabilidade