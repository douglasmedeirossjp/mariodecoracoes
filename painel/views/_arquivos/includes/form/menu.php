<?php if (!defined('ABSPATH')) exit; ?>
 
<div id="sidebar"> 
    <div class="sidebar-inner"> 
        <ul id="sideNav" class="nav nav-pills nav-stacked">
            <li class="top-search">
                <form>
                    <input type="text" name="search" placeholder="Pesquisar ...">
                    <button type="submit"><i class="ec-search s20"></i>
                    </button>
                </form>
            </li>
            <li><a href="<?= URL_PAINEL ?>">Painel <i class="im-screen"></i></a>
            </li> 
            <li><a href="#"><i class="im-images"></i> Banner </a>
                <ul class="nav sub">
                    <li><a href="<?= URL_PAINEL ?>banner/cadastrar"><i class="ec-pencil"></i> Cadastrar Banner </a>
                    </li>
                    <li><a href="<?= URL_PAINEL ?>banner/"><i class="en-list"></i> Listar Banners</a>
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class="im-images"></i> Galeria de Foto </a>
                <ul class="nav sub">
                    <li><a href="<?= URL_PAINEL ?>galeria/cadastrar"><i class="ec-pencil"></i> Cadastrar Galeria </a>
                    </li>
                    <li><a href="<?= URL_PAINEL ?>galeria/"><i class="en-list"></i> Listar Galerias</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= URL_PAINEL ?>pagina/">Páginas <i class="st-files"></i></a> 
            </li> 
            <li>
                <a href="<?= URL_PAINEL ?>informacao/">Informação <i class="im-info"></i></a> 
            </li> 
        </ul> 
    </div> 
</div> 



