<?php

// Caminho para a raiz
define('ABSPATH_REPOSITORIO', dirname(__FILE__));

if ($_SERVER['HTTP_HOST'] == "localhost") {

    // URL da home
    define('HOME_URL', 'http://localhost/mariodecoracoes/');

    define('URL_PAINEL', 'http://localhost/mariodecoracoes/painel/');

    // Nome do host da base de dados
    define('HOSTNAME', 'localhost');

    // Nome do DB
    define('DB_NAME', 'mariodecoracoes');

    // Usuário do DB
    define('DB_USER', 'root');

    // Senha do DB
    define('DB_PASSWORD', '');
    
} else {
    
    // URL da home
    define('HOME_URL', 'http://mariodecoracoes.empreendedorrural.com.br/');

    define('URL_PAINEL', 'http://mariodecoracoes.empreendedorrural.com.br/painel/');

    // Nome do host da base de dados
    define('HOSTNAME', '216.172.172.70');

    // Nome do DB
    define('DB_NAME', 'empre392_mariodecoracoes');

    // Usuário do DB
    define('DB_USER', 'empre392');

    // Senha do DB
    define('DB_PASSWORD', 'Sen@rpr123'); 
 
}

// Charset da conexão PDO
define('DB_CHARSET', 'utf8');

// Se você estiver desenvolvendo, modifique o valor para true
define('DEBUG', true);


?>