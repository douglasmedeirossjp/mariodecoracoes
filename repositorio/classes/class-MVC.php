<?php

/**
 * TutsupMVC - Gerencia Models, Controllers e Views
 *
 * @package TutsupMVC
 * @since 0.1
 */
class MVC {

    /**
     * $controlador
     *
     * Receberá o valor do controlador (Vindo da URL).
     * exemplo.com/controlador/
     *
     * @access private
     */
    private $controlador;

    /**
     * $acao
     *
     * Receberá o valor da ação (Também vem da URL):
     * exemplo.com/controlador/acao
     *
     * @access private
     */
    private $acao;

    /**
     * $parametros
     *
     * Receberá um array dos parâmetros (Também vem da URL):
     * exemplo.com/controlador/acao/param1/param2/param50
     *
     * @access private
     */
    private $parametros;

    /**
     * $not_found
     *
     * Caminho da página não encontrada
     *
     * @access private
     */
    private $not_found = '/views/_erros/404.php';

    /**
     * Construtor para essa classe
     *
     * Obtém os valores do controlador, ação e parâmetros. Configura 
     * o controlado e a ação (método).
     */
    public function __construct() {

        // Obtém os valores do controlador, ação e parâmetros da URL.
        // E configura as propriedades da classe.
        $this->get_url_data();
         
        /**
         * Verifica se o controlador existe. Caso contrário, adiciona o
         * controlador padrão (controllers/home-controller.php) e chama o método index().
         */
        if (!$this->controlador) {

            // Adiciona o controlador padrão
            require_once ABSPATH . '/controllers/HomeController.php';

            // Cria o objeto do controlador "HomeController.php"
            // Este controlador deverá ter uma classe chamada HomeController
            $this->controlador = new HomeController();

            $this->controlador->nome_controlador = "HomeController";
            // Executa o método index()
            $this->controlador->index();

            // FIM :)
            return;
        }

        // Se o arquivo do controlador não existir 
        if (!file_exists(ABSPATH . '/controllers/' . $this->controlador . '.php')) {

            // Tenta achar a controladora "pagina"        
            if (file_exists(ABSPATH . '/controllers/PaginaController.php')) {
                $this->controlador = "PaginaController";
            } else {
                require_once ABSPATH . $this->not_found;
                return;
            }
        }

        // Inclui o arquivo do controlador
        require_once ABSPATH . '/controllers/' . $this->controlador . '.php';

        // Remove caracteres inválidos do nome do controlador para gerar o nome
        // da classe. Se o arquivo chamar "news-controller.php", a classe deverá
        // se chamar NewsController.
        $this->controlador = preg_replace('/[^a-zA-Z]/i', '', $this->controlador);

        // Se a classe do controlador indicado não existir, não faremos nada
        if (!class_exists($this->controlador)) {
            // Página não encontrada
            require_once ABSPATH . $this->not_found;
            return;
        } // class_exists
        // Cria o objeto da classe do controlador e envia os parâmentros
        $this->controlador = new $this->controlador($this->parametros, $this->controlador);

        // Remove caracteres inválidos do nome da ação (método)
        $this->acao = preg_replace('/[^a-zA-Z0-9-]/i', '', $this->acao);

        // echo $this->acao;
        // Se o método indicado existir, executa o método e envia os parâmetros        
        //Exemplo: Pagina/Index        
        if (method_exists($this->controlador, $this->acao)) {
            $this->controlador->{$this->acao}($this->parametros);
            return;
        }

        // Sem ação, chamamos o método index        
        //Exemplo: Pagina/    
        if (!$this->acao && method_exists($this->controlador, 'index')) {
            $this->controlador->index($this->parametros);
            return;
        }

        //Se existe a controladora página, executa o método 'index' e passa por parametro a acao
        // Exemplo: Pagina/Empresa  (index.php?pagina=empresa)
        if (method_exists($this->controlador, 'index')) {
            $this->controlador->index($this->acao);
            return;
        }

        // Página não encontrada
        require_once ABSPATH . $this->not_found;

        return;
    }

// __construct

    /**
     * Obtém parâmetros de $_GET['path']
     *
     * Obtém os parâmetros de $_GET['path'] e configura as propriedades 
     * $this->controlador, $this->acao e $this->parametros
     *
     * A URL deverá ter o seguinte formato:
     * http://www.example.com/controlador/acao/parametro1/parametro2/etc...
     */
    public function get_url_data() {

        // Verifica se o parâmetro path foi enviado
        if (isset($_GET['path'])) {

            // Captura o valor de $_GET['path']
            $path = $_GET['path'];

            // Limpa os dados
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);

            // Cria um array de parâmetros
            $path = explode('/', $path);
 
            // Configura as propriedades
            $this->controlador = chk_array($path, 0);
            $this->controlador .= 'Controller';
            $this->acao = chk_array($path, 1);

            // Configura os parâmetros
            if (chk_array($path, 2)) {
                unset($path[0]);
                unset($path[1]);

                // Os parâmetros sempre virão após a ação
                $this->parametros = array_values($path);
            }
 
            $this->controlador = ucwords($this->controlador);
            
            // DEBUG
            if (DEBUG == TRUE) { 
              /*  echo $this->controlador . '<br>';
                echo $this->acao . '<br>';
                echo '<pre>';
                print_r($this->parametros);
                echo '</pre>';*/
            }
        }
    }

    public function go_to($url) {
        echo '<meta http-equiv="Refresh" content="0; url=' . $url . '">';
        //echo '<script type="text/javascript">window.location.href = "' . $url . '";</script>';
    }

}

function chk_array($array, $key) {
    // Verifica se a chave existe no array
    if (isset($array[$key]) && !empty($array[$key])) {
        // Retorna o valor da chave
        return $array[$key];
    }

    // Retorna nulo por padrão
    return null;
}
