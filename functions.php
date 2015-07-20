<?php
function all_element_texts1($record, $options = array())
{
    return get_view()->allElementTexts($record, $options);
}

//Resumo dos textos 
function resumo($string,$chars) {  
     if (strlen($string) > $chars) {  
        while (substr($string,$chars,1) <> ' ' && ($chars < strlen($string))){  
             $chars++;  
        };  
     };  
  return substr($string,0,$chars);  
};  

