<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function MostrarTituloSimNao($status){
    
    switch ($status) {
        
        case 'S':
            
            return "Sim";

            break;
        
        case 'N':
            
            return "Não";

            break;

        default:
            break;
    }
        
}