<?php

 /*
  *   FONCTION RELATIVES AU CHIFFREMENT AES-256 
  *   A chaque fct, on fournit text(clair ou chiffré), clé et Vecteur init
  */

// global $key = '12345678901234567890123456789012';
// global $iv =  '';

function encrypt($text,$key,$iv) {
//$text = 'la communication marche';
 
    //Fonction init qui ouvre le module de l'algorithme (kind of file descriptor)
    $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
    $iv_size = mcrypt_enc_get_iv_size($cipher);

/* 
 * Lors des tests on utilisait les valeurs ci dessous
 *  
 * $key = '12345678901234567890123456789012';
 * $iv =  '';
*/

   if (mcrypt_generic_init($cipher, $key, $iv) != -1)
   {
     $encrypted = mcrypt_generic($cipher, $text);
     mcrypt_generic_deinit($cipher);
 
        //echo '<strong>After encryption:</strong> ' . bin2hex($encrypted) . '<br />';
    }else{
          echo '<strong>Encryption failed</strong> <br />';
    }

   mcrypt_module_close ($cipher);
   return $encrypted;
   // ou peut-être : return bin2hex($encrypted);
}

/********************************************************/
/********************************************************/
/********************************************************/

function decrypt($encrypted,$key,$iv) {
   
   $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
   $iv_size = mcrypt_enc_get_iv_size($cipher);

   /* 
    * Lors des tests on utilisait les valeurs ci dessous
    *  
    * $key = '12345678901234567890123456789012';
    * $iv =  '';
   */

   if (mcrypt_generic_init($cipher, $key, $iv) != -1)
   {
       $decrypted = mdecrypt_generic($cipher, $encrypted);
       mcrypt_generic_deinit($cipher);
   }else{
       echo '<strong>Decryption failed</strong> <br />';
   }
   mcrypt_module_close ($cipher);
   return $decrypted;
}


/********************************************************/
?>
