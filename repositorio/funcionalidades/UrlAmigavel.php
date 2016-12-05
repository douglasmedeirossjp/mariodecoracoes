<?php

class UrlAmigavel {

    static function GerarUrlAmigavel($nom_tag, $slug = "-") {

        // substitui espaços por "-"
        $title = preg_replace('#\s+#', '-', $nom_tag);

        // faz a transliteração pra ASCII
        $title = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $title);

        // remove qualquer outra coisa inválida da url
        $title = preg_replace('#[^a-zA-Z0-9_-]+#', '', $title);
        
        // transforma em minúsculo
        $title = strtolower($title);

        return $title;
    }

}
