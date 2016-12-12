<?php

require_once ABSPATH_REPOSITORIO . '/models/Galeria.php';
require_once ABSPATH_REPOSITORIO . '/models/Fotos.php';
require_once ABSPATH_REPOSITORIO . '/dao/GaleriaDAO.php';
require_once ABSPATH_REPOSITORIO . '/dao/CategoriaDAO.php';
require_once ABSPATH_REPOSITORIO . '/funcionalidades/UrlAmigavel.php';
require_once ABSPATH_REPOSITORIO . '/funcionalidades/Diretorio.php';

class GaleriaController extends MainController {

    public function index() {

        $this->ViewBag->titulo = "Listar Galerias";

        try {

            $dao = new GaleriaDAO();
            $lista = $dao->BuscarTodos();
            $this->ViewBag->lista = $lista;
        } catch (Exception $ex) {
            $this->ViewBag->Exception = $ex;
        }

        $this->carregarView("index");
    }

    public function cadastrar() {

        $this->ViewBag->titulo = "Cadastrar Galeria";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            try {

                $dao = new GaleriaDAO();
                $ua = new UrlAmigavel();

                $galeria = new Galeria();
                $galeria->titulo = $this->parametros["titulo"];
                $galeria->url_amigavel = $ua->GerarUrlAmigavel($galeria->titulo);
                $galeria->descricao = $this->parametros["descricao"];
                $galeria->ordem = 1;
                $galeria->categoria = $this->parametros["categoria"];
                $galeria->ativo = $this->parametros["ativo"];

                $daoCat = new CategoriaDAO();
                $categoria = $daoCat->BuscarPorID($galeria->categoria);

                $galeria->pasta = $galeria->url_amigavel;

                $dao->Cadastrar($galeria);

                // cria a pasta no repositorio                
                $diretorio = ABSPATH_REPOSITORIO . "/arquivos/enviados/galeria/" . $categoria->url_amigavel;

                // cria a pasta da categoria se não existir
                if (!is_dir($diretorio)) {
                    mkdir($diretorio, 0777);
                }

                $diretorio .= "/" . $galeria->pasta;

                // cria a pasta com a url amigavel da galeria
                mkdir($diretorio, 0777);

                $galeria->id = $dao->last_id;

                $this->goto_page(URL_PAINEL . "galeria/fotos/" . $galeria->id);
            } catch (Exception $ex) {
                $this->ViewBag->Exception = $ex;
            }
        }

        $catdao = new CategoriaDAO();
        $this->ViewBag->categorias = $catdao->BuscarTodosAtivos();

        $this->carregarView("cadastrar", "Form");
    }

    public function editar() {

        $this->ViewBag->titulo = "Editar Galeria";

        $id = $this->parametros[0];

        if (!empty($this->parametros[1]) && $this->parametros[1] == "true") {
            $this->ViewBag->Msg = "Galeria atualizada com sucesso!";
        }

        if (!empty($this->parametros[1]) && $this->parametros[1] == "false") {
            $this->ViewBag->Msg = "Erro ao atualizar a galeria, tente novamente!";
        }

        try {

            $dao = new GaleriaDAO();

            $galeria = $dao->BuscarPorID($id);

            $this->ViewBag->galeria = $galeria;
        } catch (Exception $ex) {

            $this->ViewBag->Exception = $ex->getMessage();
        }

        $catdao = new CategoriaDAO();
        $this->ViewBag->categorias = $catdao->BuscarTodosAtivos();

        $this->carregarView("editar", "Form");
    }

    public function salvar() {

        try {

            $dao = new GaleriaDAO();
            $ua = new UrlAmigavel();

            $galeria = new Galeria();

            $galeria->id = $this->parametros["id"];
            $galeria->titulo = $this->parametros["titulo"];
            $galeria->url_amigavel = $ua->GerarUrlAmigavel($galeria->titulo);
            $galeria->pasta = $galeria->url_amigavel;
            $galeria->descricao = $this->parametros["descricao"];
            $galeria->categoria = $this->parametros["categoria"];
            $galeria->ordem = 1;
            $galeria->ativo = $this->parametros["ativo"];

            $galeria_antiga = $dao->BuscarPorID($galeria->id);

            // diretorio antes de editar
            $diretorio = ABSPATH_REPOSITORIO . "/arquivos/enviados/galeria/" . $galeria_antiga->categoria->url_amigavel;
            $diretorio .= "/" . $galeria_antiga->pasta;

            // verifica se mudou o titulo, 
            // se mudou o nome do titulo, altera o nome da pasta
            if ($galeria->titulo != $galeria_antiga->titulo) {

                // novo diretorio
                $novo_diretorio = ABSPATH_REPOSITORIO . "/arquivos/enviados/galeria/" . $galeria_antiga->categoria->url_amigavel;
                $novo_diretorio .= "/" . $galeria->pasta;

                // renomeia o diretorio
                if (rename($diretorio, $novo_diretorio)) {
                    $diretorio = $novo_diretorio;
                }
            }

            // verifica se mudou a categoria 
            // se mudou a categoria, move a pasta para a nova categoria
            if ($galeria_antiga->categoria->id != $galeria->categoria) {

                //pega as informações da nova categoria
                $daoCat = new CategoriaDAO();
                $categoria = $daoCat->BuscarPorID($galeria->categoria);

                $novo_diretorio = ABSPATH_REPOSITORIO . "/arquivos/enviados/galeria/" . $categoria->url_amigavel;

                // cria a pasta da categoria se não existir
                if (!is_dir($novo_diretorio)) {
                    mkdir($novo_diretorio, 0777);
                }

                $novo_diretorio .= "/" . $galeria->pasta;

                // cria a pasta com a url amigavel da galeria
                if (!is_dir($novo_diretorio)) {
                    mkdir($novo_diretorio, 0777);
                }

                if (CopiarDiretorio($diretorio, $novo_diretorio)) {
                    if (DeletarDiretorio($diretorio)) {
                        $diretorio = $novo_diretorio;
                    }
                }
            }

            if ($dao->Editar($galeria)) {
                $this->goto_page(URL_PAINEL . "galeria/fotos/" . $galeria->id);
            } else {
                $this->goto_page(URL_PAINEL . "galeria/editar/" . $galeria->id . "/false/");
            }
        } catch (Exception $ex) {
            $this->ViewBag->Exception = $ex;
        }
    }

    public function fotos() {

        $this->ViewBag->titulo = "Fotos";

        try {

            $dao = new GaleriaDAO();
            $lista = $dao->BuscarFotosPorGaleria($this->parametros[0]);

            $this->ViewBag->id = $this->parametros[0];
            $this->ViewBag->lista = $lista;
        } catch (Exception $ex) {
            $this->ViewBag->Exception = $ex;
        }

        $this->carregarView("fotos", "Galeria");
    }

    public function Upload() {

        if (isset($_FILES['files']['name'][0])) {

            $arquivo_tmp = $_FILES['files']['tmp_name'][0];
            $nome = $_FILES['files']['name'][0];

            $galeria = new Galeria();
            $dao = new GaleriaDAO();
            $galeria = $dao->BuscarPorID($this->parametros[0]);

            $categoria = new Categoria();
            $categoria = $galeria->categoria;

            $diretorio = ABSPATH_REPOSITORIO . '/arquivos/enviados/galeria/' . $categoria->url_amigavel . '/' . $galeria->pasta;
            $destino = $diretorio . '/' . $nome;

            if (@move_uploaded_file($arquivo_tmp, $destino)) {

                list($largura, $altura, $tipo) = getimagesize($destino);

                $imagem = imagecreatefromjpeg($destino);

                $Thumbnail = imagecreatetruecolor(250, 180);

                imagecopyresampled($Thumbnail, $imagem, 0, 0, 0, 0, 250, 180, $largura, $altura);

                $diretorio_thumbs = $diretorio . "/thumbs/";
                // cria a pasta com a url amigavel da galeria
                if (!is_dir($diretorio_thumbs)) {
                    mkdir($diretorio_thumbs, 0777);
                }

                imagejpeg($Thumbnail, $diretorio_thumbs . $nome);

                $foto = new Fotos();
                $foto->galeria = $galeria->id;
                $foto->imagem = $nome;
                $foto->ordem = 1;
                $foto->ativo = 'S';

                $dao->Cadastrar($foto);

                echo json_decode(true);
            } else {
                echo json_decode(false);
            }
        } else {
            echo json_decode(false);
        }
    }

    public function removerfoto() {

        $id = $this->parametros['id'];

        $dao = new GaleriaDAO();


        $foto = $dao->BuscarFotoPorID($id);
        /*
      
        $diretorio = ABSPATH_REPOSITORIO . '/arquivos/enviados/galeria/' . $foto->galeria->categoria->url_amigavel . '/' . $foto->galeria->pasta;
        $arquivo = $diretorio . '/' . $foto->imagem;

        $diretorio_thumbs = ABSPATH_REPOSITORIO . '/arquivos/enviados/galeria/' . $foto->galeria->categoria->url_amigavel . '/' . $foto->galeria->pasta . "/thumbs";
        $arquivo_thumbs = $diretorio_thumbs . '/' . $foto->imagem;*/

        $foto_del = new Fotos();
        $foto_del->id = $foto->id;
        $foto_del->imagem = $foto->imagem;
        $foto_del->ativo = 'N';
        $foto_del->galeria = $foto->galeria->id;
        $foto_del->ordem = $foto->ordem;
         
        $dao->Editar($foto_del);
         
        echo json_decode(true);
        
       /*
        if (!unlink($arquivo)) {
            echo json_decode(false);
        } else {
            if (!unlink($arquivo_thumbs)) {
                $dao->Editar($foto_del); 
            }
        }*/
    }
}
