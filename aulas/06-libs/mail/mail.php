<?php
require __DIR__."/vendor/autoload.php";
date_default_timezone_set('America/Sao_Paulo');
/*$naoUsar = mail(
    'duodraco@gmail.com',
    'Teste da Aula da DRC',
    'Oia nois aqui traveis',
    '',
    "-t duodraco@gmail.com");
*/
//http://swiftmailer.org/docs/messages.html

$message = Swift_Message::newInstance()
    ->setSubject('TESTE curso PHP DRC')
    ->setFrom(['duodraco@gmail.com' => 'Anderson'])
    ->setTo([
        'brunopupp@globo.com' => 'Bruno',
        'ricardo@ricardocardoso.net' => 'Ricardo',
        'duodraco@gmail.com'])
    ->setBody('Oia nois aqui traveis')
// cont. alternativo   ->addPart('<p>Loren Ipsum dolor sit amet.</p>', 'text/html')
// anexo    ->attach(Swift_Attachment::fromPath('my-document.pdf'))
;
$ini = parse_ini_file("settings2.ini");
$transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
    ->setUsername('duodraco')
    ->setPassword($ini['pw']);
$mailer = Swift_Mailer::newInstance($transporter);
var_dump($mailer->send($message));