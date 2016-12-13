<?php

require_once ABSPATH_REPOSITORIO . '/models/Galeria.php';
require_once ABSPATH_REPOSITORIO . '/models/Categoria.php';
require_once ABSPATH_REPOSITORIO . '/models/Fotos.php';
require_once ABSPATH_REPOSITORIO . '/dao/CategoriaDAO.php';

class GaleriaDAO extends DAO {

    /**
     * Busca um determinado usuário através do ID
     * @param type $id
     * @return \Exception|\Banner
     */
    public function BuscarPorID($id) {

        $galeria = new Galeria();

        try {

            $query = $this->db->query(
                    "SELECT * FROM galeria WHERE id = ? LIMIT 1", array($id)
            );

            foreach ($query->fetchAll() as $value) {

                $galeria->ToObject($value);
                
                $dao = new CategoriaDAO();
                $galeria->categoria = $dao->BuscarPorID($galeria->categoria);
                
            }
        } catch (Exception $ex) {
            return $ex;
        }

        return $galeria;
    }
     
    public function BuscarPorUrlAmigavel($url_amigavel) {

        $galeria = new Galeria();

        try {

            $query = $this->db->query(
                    "SELECT * FROM galeria WHERE url_amigavel = ? LIMIT 1", array($url_amigavel)
            );

            foreach ($query->fetchAll() as $value) {

                $galeria->ToObject($value); 
                $dao = new CategoriaDAO();
                $galeria->categoria = $dao->BuscarPorID($galeria->categoria);
                
            }
        } catch (Exception $ex) {
            return $ex;
        }

        return $galeria;
    }

    /**
     * 
     * @return \Exception|\ArrayObject
     */
    public function BuscarTodos() {

        $lista = new ArrayObject();

        try {

            $query = $this->db->query("SELECT * FROM galeria ORDER BY id DESC");

            foreach ($query->fetchAll() as $value) {

                $galeria = new Galeria();
                $galeria->ToObject($value);

                $dao = new CategoriaDAO();
                $galeria->categoria = $dao->BuscarPorID($galeria->categoria);

                $lista->append($galeria);
            }
        } catch (Exception $ex) {
            return $ex;
        }

        return $lista;
    }

    /**
     * 
     * @return \Exception|\ArrayObject
     */
    public function BuscarTodosAtivos() {

        $lista = new ArrayObject();

        try {

            $query = $this->db->query("SELECT * FROM galeria WHERE ativo = 'S' ORDER BY id DESC");

            foreach ($query->fetchAll() as $value) {

                $galeria = new Galeria();
                $galeria->ToObject($value);

                $dao = new CategoriaDAO();
                $galeria->categoria = $dao->BuscarPorID($galeria->categoria);

                $lista->append($galeria);
            }
        } catch (Exception $ex) {
            return $ex;
        }

        return $lista;
    }
    
     /**
     * 
     * @return \Exception|\ArrayObject
     */
    public function BuscarTopAtivos($qtde = 10) {

        $lista = new ArrayObject();

        try {

            $query = $this->db->query("SELECT * FROM galeria WHERE ativo = 'S' ORDER BY id DESC LIMIT 0, $qtde ");

            foreach ($query->fetchAll() as $value) {

                $galeria = new Galeria();
                $galeria->ToObject($value);

                $dao = new CategoriaDAO();
                $galeria->categoria = $dao->BuscarPorID($galeria->categoria);
                
                $galeria->fotocapa = $this->BuscarCapaPorGaleria($galeria->id);

                $lista->append($galeria);
            }
        } catch (Exception $ex) {
            return $ex;
        }

        return $lista;
    }
    
     public function BuscarTodosAtivosPorCategoria($id) {

        $lista = new ArrayObject();

        try {

            $query = $this->db->query("SELECT * FROM galeria WHERE ativo = 'S' and categoria = ?  ORDER BY id DESC", array($id) );

            foreach ($query->fetchAll() as $value) {

                $galeria = new Galeria();
                
                $galeria->ToObject($value);

                $dao = new CategoriaDAO();
                
                $galeria->categoria = $dao->BuscarPorID($galeria->categoria);
                 
                $galeria->fotocapa = $this->BuscarCapaPorGaleria($galeria->id);

                $lista->append($galeria);
            }
        } catch (Exception $ex) {
            return $ex;
        }

        return $lista;
    }
    
    
    public function BuscarFotosPorGaleria($id) {

        $lista = new ArrayObject();

        try {

            $query = $this->db->query("SELECT * FROM fotos WHERE ativo = 'S' and galeria = ? ORDER BY ordem DESC", array($id));

            foreach ($query->fetchAll() as $value) {

                $foto = new Fotos();
                $foto->ToObject($value); 
                
                $foto->galeria = $this->BuscarPorID($foto->galeria);
                                
                $lista->append($foto);
            }
            
            
        } catch (Exception $ex) {
            return $ex;
        }

        return $lista;
    }
    
    
    public function BuscarFotoPorID($id) {

        $foto = new Fotos();

        try {

            $query = $this->db->query(
                    "SELECT * FROM fotos WHERE id = ? LIMIT 1", array($id)
            );

            foreach ($query->fetchAll() as $value) {

                $foto = new Fotos();
                $foto->ToObject($value); 
                
                $foto->galeria = $this->BuscarPorID($foto->galeria);                  
            }
            
        } catch (Exception $ex) {
            return $ex;
        }

        return $foto;
    }
    
     public function BuscarCapaPorGaleria($id) {
 
        $foto = new Fotos();

        try {

            $query = $this->db->query(
                    "SELECT * FROM fotos WHERE galeria = ? LIMIT 1", array($id)
            );

            foreach ($query->fetchAll() as $value) {

                $foto = new Fotos();
                $foto->ToObject($value);    
                
            }
            
        } catch (Exception $ex) {
            return $ex;
        }

        return $foto;
    }

}
