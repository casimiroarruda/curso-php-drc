<?php
require __DIR__."/../vendor/autoload.php";
//invoco o loader
$loader = new Twig_Loader_Filesystem(__DIR__."/templates");
//configuro e instancio o twig de fato
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

//configuro variaveis/atributos
$variables = [
    "title" => "PHP na DRC",
    "turtles" => [
        ["name"=>"Leonardo","weapon"=>"katana"],
        ["name"=>"Donatello","weapon"=>"bo"],
        ["name"=>"Michelangelo","weapon"=>"nunchaku"],
        ["name"=>"Rafael","weapon"=>"sai"]
    ]
];

//echo $twig->render('index.twig', $variables);
echo $twig->render('main.twig', $variables);
