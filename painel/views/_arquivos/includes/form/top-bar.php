<?php if (!defined('ABSPATH')) exit; ?>  

<div id="header">
    <div class="container-fluid">
        <div class="navbar">
            <div class="navbar-header">
                <!-- logo -->
            </div>
            <nav class="top-nav" role="navigation">
                <ul class="nav navbar-nav pull-left">
                    <li id="toggle-sidebar-li">
                        <a href="#" id="toggle-sidebar"><i class="im-menu2"></i>
                        </a>
                    </li> 
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"><i class="ec-cog"></i><span class="notification"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#"><i class="en-database"></i> Banco de dados <span class="notification"></span></a>
                            </li>
                           
                        </ul>
                    </li> 
                </ul>
                <ul class="nav navbar-nav pull-right">

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown"><i class="br-alarm"></i> <span class="notification">5</span></a>
                        <ul class="dropdown-menu notification-menu right" role="menu">
                            <li class="clearfix">
                                <i class="ec-chat"></i> 
                                <a href="#" class="notification-user"> Ric Jones </a> 
                                <span class="notification-action"> replied to your </span> 
                                <a href="#" class="notification-link"> comment</a>
                            </li>
                            <li class="clearfix">
                                <i class="st-pencil"></i> 
                                <a href="#" class="notification-user"> SuggeElson </a> 
                                <span class="notification-action"> just write a </span> 
                                <a href="#" class="notification-link"> post</a>
                            </li>
                            <li class="clearfix">
                                <i class="ec-trashcan"></i> 
                                <a href="#" class="notification-user"> SuperAdmin </a> 
                                <span class="notification-action"> just remove </span> 
                                <a href="#" class="notification-link"> 12 files</a>
                            </li>
                            <li class="clearfix">
                                <i class="st-paperclip"></i> 
                                <a href="#" class="notification-user"> C. Wiilde </a> 
                                <span class="notification-action"> attach </span> 
                                <a href="#" class="notification-link"> 3 files</a>
                            </li>
                            <li class="clearfix">
                                <i class="st-support"></i> 
                                <a href="#" class="notification-user"> John Simpson </a> 
                                <span class="notification-action"> add support </span> 
                                <a href="#" class="notification-link"> ticket</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <img class="user-avatar" src="<?= URL_PAINEL; ?>views/_arquivos/assets/img/avatars/48.jpg"><?=$_SESSION["USLogin"];?></a>
                        <ul class="dropdown-menu right" role="menu">
                            <li>
                                <a href="<?=URL_PAINEL;?>usuario/perfil"><i class="st-user"></i> Perfil</a>
                            </li> 
                            <li>
                                <a href="<?=URL_PAINEL;?>usuario/configuracao"><i class="st-settings"></i> Configuração</a>
                            </li>
                            <li>
                                <a href="<?=URL_PAINEL;?>login/sair"><i class="im-exit"></i> Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

