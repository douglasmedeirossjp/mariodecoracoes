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
            <li>
                <a href="<?= URL_PAINEL ?>">Painel <i class="im-screen"></i></a>
            </li> 
            <li>
                <a href="<?= URL_PAINEL ?>banner/"><i class="im-images"></i> Banner </a> 
            </li>
            <li>
                <a href="<?= URL_PAINEL ?>galeria/"><i class="im-image"></i> Galeria de Foto </a> 
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



