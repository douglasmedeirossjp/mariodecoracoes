<?php

require_once ABSPATH_REPOSITORIO . '/models/Informacao.php';
require_once ABSPATH_REPOSITORIO . '/dao/InformacaoDAO.php';

class InformacaoController extends MainController {

    public function index() {

        $this->ViewBag->titulo = "Informação";

        if(!empty($this->parametros[1]) && $this->parametros[1] == "true"){   
            $this->ViewBag->Msg = "Informação atualizada com sucesso!";
        }
        
        try {

            $dao = new InformacaoDAO();

            $informacao = $dao->BuscarInformacao();
             
            $this->ViewBag->informacao = $informacao;
            
        } catch (Exception $ex) {
            
            $this->ViewBag->Exception = $ex->getMessage();
        }

        $this->carregarView("index");
    }
    
     public function salvar() {

        $informacao = new Informacao();        
       
        $informacao->id = $this->parametros['id']; 
        $informacao->telefone = $this->parametros['telefone']; 
        $informacao->celular = $this->parametros['celular']; 
        $informacao->endereco = $this->parametros['endereco']; 
        $informacao->numero = $this->parametros['numero']; 
        $informacao->bairro = $this->parametros['bairro']; 
        $informacao->cidade = $this->parametros['cidade']; 
        $informacao->estado = $this->parametros['estado']; 
        $informacao->horario_atendimento = $this->parametros['horario_atendimento']; 
        $informacao->email = $this->parametros['email']; 
        $informacao->googlemaps  = $this->parametros['googlemaps']; 
        $informacao->mensagem_contato = $this->parametros['mensagem_contato']; 
        $informacao->facebook = $this->parametros['facebook']; 
        $informacao->instagram = $this->parametros['instagram']; 

        $dao = new InformacaoDAO();

        $dao->Editar($informacao);
        
        $this->goto_page(URL_PAINEL."informacao/index/1/true");
    }
}
