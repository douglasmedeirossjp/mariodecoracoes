<?php

/**
 * MainController - Todos os controllers deverão estender essa classe
 *
 * @package 
 * @since 0.1
 */
class MainController extends Login {

    /**
     * ViewBag
     *
     * Inicia a ViewBag
     *
     * @access public
     */
    public $ViewBag;

    /**
     * $phpass
     *
     * Classe phpass 
     *
     * @see http://www.openwall.com/phpass/
     * @access public
     */
    public $phpass;

    /**
     * $title
     *
     * Título das páginas 
     *
     * @access public
     */
    public $title;

    /**
     * $parametros
     *
     * @access public
     */
    public $parametros = array();

    /**
     * $nome_controlador
     *
     * @access public
     */
    public $nome_controlador;

    /**
     * $login_required
     *
     * Se a página precisa de login
     *
     * @access public
     */
    public $login_required = true;

    /**
     * $permission_required
     *
     * Permissão necessária
     *
     * @access public
     */
    public $permission_required = 'any';

    /**
     * Construtor da classe
     *
     * Configura as propriedades e métodos da classe.
     *
     * @since 0.1
     * @access public
     */
    public function __construct($parametros = array(), $nome_controlador = "") {

        // Se precisa de login, verifica se está logado 
        if ($this->login_required) {
            $this->check_login();
        }

        // Instancia do DB
        $this->db = new DB();

        // nome do controlador atual 
        $this->nome_controlador = $nome_controlador;

        // instancia ViewBag
        $this->ViewBag = new ViewBag();

        // Phpass
        $this->phpass = new PasswordHash(8, false);

        // Parâmetros        
        if ($parametros != null) {
            $this->parametros = $parametros;
        } else {
            $this->parametros = $_REQUEST;
        }

        //verificar token é valido
        if (!$this->VerificarToken($this->phpass->HashPassword(time()))) {
            $this->goto_login();
        }
    }

    public function carregarView($nomeview, $tipoview = null) {

        if ($this->login_required) {

            if (empty($_SESSION["Logado"])) {
                
            }
        }

        if ($this->ViewBag->titulo == "" || $this->ViewBag->titulo == null) {
            $this->ViewBag->titulo = "Página sem título";
        }

        $nome_controlador = strtolower(str_replace("Controller", "", $this->nome_controlador));

        // Carrega o views 

        switch ($tipoview) {


            case "Login":

                require ABSPATH . '/views/_arquivos/includes/login/header.php';

                require_once ABSPATH . '/views/' . $nome_controlador . '/' . $nomeview . ".php";

                require ABSPATH . '/views/_arquivos/includes/login/footer.php';

                break;

            case "Site":
                
                require ABSPATH . '/views/_arquivos/includes/header.php';
                
                require ABSPATH . '/views/_arquivos/includes/menu.php';
                
                require_once ABSPATH . '/views/' . $nome_controlador . '/' . $nomeview . ".php";
                
                require ABSPATH . '/views/_arquivos/includes/footer.php';
                
                break;

            case "Form":

                require ABSPATH . '/views/_arquivos/includes/form/header.php';

                require ABSPATH . '/views/_arquivos/includes/form/top-bar.php';

                require ABSPATH . '/views/_arquivos/includes/form/menu.php';

                require ABSPATH . '/views/_arquivos/includes/form/content.php';

                require_once ABSPATH . '/views/' . $nome_controlador . '/' . $nomeview . ".php";

                require ABSPATH . '/views/_arquivos/includes/form/footer.php';

                break;

            default:

                require ABSPATH . '/views/_arquivos/includes/default/header.php';

                require ABSPATH . '/views/_arquivos/includes/default/top-bar.php';

                require ABSPATH . '/views/_arquivos/includes/default/menu.php';

                require ABSPATH . '/views/_arquivos/includes/default/content.php';

                require_once ABSPATH . '/views/' . $nome_controlador . '/' . $nomeview . ".php";

                require ABSPATH . '/views/_arquivos/includes/default/footer.php';

                break;
        }
    }

}
