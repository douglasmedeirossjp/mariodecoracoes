<?php
 
function CopiarDiretorio($dirFont, $dirDest) {

    if (!file_exists($dirDest)) {
        mkdir($dirDest);
    }
    if ($dd = opendir($dirFont)) {
        while (false !== ($arq = readdir($dd))) {
            if ($arq != "." && $arq != "..") {
                $pathIn = "$dirFont/$arq";
                $pathOut = "$dirDest/$arq";
                if (is_dir($pathIn)) {
                    self::copiaDir($pathIn, $pathOut);
                } elseif (is_file($pathIn)) {
                    copy($pathIn, $pathOut);
                }
            }
        }
        closedir($dd);
        return true;
    }
}

function DeletarDiretorio($dir) {
    
    if (!file_exists($dir))
        return true;
    if (!is_dir($dir) || is_link($dir))
        return unlink($dir);
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..')
            continue;
        if (!DeletarDiretorio($dir . "/" . $item)) {
            chmod($dir . "/" . $item, 0777);
            if (!DeletarDiretorio($dir . "/" . $item))
                return false;
        };
    }
    return rmdir($dir);
}
