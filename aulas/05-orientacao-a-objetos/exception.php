<?php
$url = 'http://uol.com.brf';
try {
    $host = parse_url($url, PHP_URL_HOST);
    if (!gethostbynamel($host)) {
        throw new MukekaException("The $url cannot be resolved");
    }
    $html = file_get_contents($url);
} catch (MukekaException $e){
    echo "Peguei uma mukeka, codigo: [{$e->getCode()}]";
} catch (InvalidArgumentException $e) {
    echo "Nao foi possivel resolver o endereco";
} catch (Exception $e) {
    echo $e->getMessage();
    echo "[{$e->getCode()}]";
}

class MukekaException extends Exception
{
    public function __construct($message = '', $code = 0,Exception $previous = null){
        $this->message = "Nao foi possivel xpto o endereco";
        $this->code = 666;
    }
}
