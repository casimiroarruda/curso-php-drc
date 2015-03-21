# Curso PHP

## Orientação a Objetos \ Namespaces

Zend_Service_Api_Twitter_Auth_Login_User

Zend\Service\Twitter\Api\Auth\Login\User;

```php
<?php
namespace Zend\Service\Twitter\Api\Auth\Login;

class User
{

}


```

<?php
//Fully Qualified Name - FQN
namespace Zend\Service\Twitter\Entity;

use Zend\Service\Twitter\Api\Auth;



class User
{
    public function __construct(){
        $this->xpto = new Login\User;
        
    }

}

* 2 Bibliotecas (Composer)
* 3 Swiftmailer + Twig + Monolog 
* 4 BD 
* 5 WebServices (REST) + Autenticacao
* 6 Projeto