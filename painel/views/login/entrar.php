<?php if (!defined('ABSPATH')) exit; ?>


<div id=login class="animated bounceIn"> 
    <div class=login-wrapper>
        <div id=myTabContent class="tab-content bn">
            <div class="tab-pane fade active in" id=log-in>
                <div class="col-lg-12 logo-login">
                    <div align="center">
                        <h3>Realizar Login</h3><Br /> 
                    </div>
                </div>

                <?php
                if ($this->ViewBag->msgLogin != null) {

                    echo '<p class="text-center color-red">'. $this->ViewBag->msgLogin .'</p>';
                }
                ?>

                <div class="col-lg-12 form-login">
                    <form action="<?= URL_PAINEL; ?>login/entrar/" class="form-horizontal mt10" id="login-form" method="post">

                        <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>" />                            

                        <div class=form-group>
                            <div class=col-lg-12>
                                <input autofocus="" class="form-control left-icon" data-val="true" required="required" id="USLogin" name="USLogin" placeholder="Seu CPF ou e-mail" type="text" value="" />
                                <i class="ec-user s16 left-input-icon"></i>                               
                            </div>
                        </div>
                        <div class=form-group>
                            <div class=col-lg-12>
                                <input class="form-control left-icon" data-val="true" required="required" id="USSenha" name="USSenha" placeholder="Sua senha" type="password" />
                                <i class="ec-locked s16 left-input-icon"></i>
                            </div>
                        </div>
                        <div class=form-group> 
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <button class="btn btn-success pull-right" type=submit>Entrar</button>
                            </div>
                        </div>
                        <div class=form-group>
                            <div class="col-lg-12" align="left">
                                <span class="help-block"> </span>
                            </div>
                        </div>
                        <div class=form-group>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="/Usuario/EsqueceuSenha"><small>Esqueceu a senha?</small></a>
                            </div>
                        </div>
                    </form>
                    <br /><br /> 
                </div>
            </div>
        </div>
    </div>
</div>
