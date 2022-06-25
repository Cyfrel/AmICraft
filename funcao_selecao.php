<?php

// EXEMPLO DE CODIGO : (qnt_recursos+img_item)+(porcentagem_retorno)+(qnt_item)+(tier_item)+(enchant_item) = (201201)+(04)+(00)  // $item_select,$porcentagem_retorno,$qnt_item,$tier_select,$enchant_select
// CODIGO INDEX : SELECTS_DO_ITEM[0], PORCENTAGEM[1], QNT_ITEM[2],TIER_SELECT[3], ENCHANT_SELECT[4]
// FUNCAO CASO O USUARIO APENAS INSIRA A QUANTIDADE DE ITENS

function quantidade_total($qnt_item, $porcentagem_retorno, $valor_quantidades){
    if($tipo_item == 'One hand'){
      //one hand(8:16)
      $primario = ($qnt_item*16)*$porcentagem_retorno;
      $secundario = ($qnt_item*8)*$porcentagem_retorno;
      $primario = ceil($primario);
      $secundario = ceil($secundario);
      
    }elseif($tipo_item == 'Two Handed'){
      //two handed(12:20)
      $primario = ($qnt_item*20)*$porcentagem_retorno;
      $secundario = ($qnt_item*12)*$porcentagem_retorno;
      $primario = ceil($primario);
      $secundario = ceil($secundario);
      
    }elseif($tipo_item == 'head/boots'){
      //head/boots(8)
      $primario = ($qnt_item*8)*$porcentagem_retorno;
      $primario = ceil($primario);
      $secundario = 0;
      
    }else{
      //chest(16)
      $primario = ($qnt_item*16)*$porcentagem_retorno;
      $primario = ceil($primario);
      $secundario = 0;
        

    }
  return [$primario, $secundario];
  }

// FUNCAO CALCULO DE MATERIAIS FINAIS E VALORES PARA INSERCAO NA TABELA
function seleciona_item($codigo_do_item[]){
    if(substr($codigo_do_item[0], 0, -2) == "1608"){
        //one hand
        if($qnt_primario == 0 && $qnt_secundario == 0){
          $materiais = aquantidade_total($codigo_do_item[]);
          $qnt_primario = $materiais[0];
          $qnt_secundario = $materiais[1];
        }else{
          $materiais = quantidade_total($codigo_do_item[]);
          $qnt_primario = $materiais[0] - $qnt_primario;
          $qnt_secundario = $materiais[1] - $qnt_secundario;
        
        }
      }elseif(substr($codigo_do_item[0], 0, -2) == '2012'){
        //two handed
        if($qnt_primario == 0 && $qnt_secundario == 0){
          $materiais = quantidade_total($codigo_do_item[]);
          $qnt_primario = $materiais[0];
          $qnt_secundario = $materiais[1];
        }else{
          $materiais = quantidade_total($codigo_do_item[]);
          $qnt_primario = $materiais[0] - $qnt_primario;
          $qnt_secundario = $materiais[1] - $qnt_secundario;
        
        }
      }elseif(substr($codigo_do_item[0], 0, -2) == '0008'){
        //head/boots
        if($qnt_primario == 0){
          $materiais = quantidade_total($codigo_do_item[]);
          $qnt_primario = $materiais[0];
        }else{
          $materiais = quantidade_total($codigo_do_item[]);
          $qnt_primario = $materiais[0] - $qnt_primario;
        
        }
  
      }else{
        //chest 0016
        if($qnt_primario == 0){
          $materiais = quantidade_total($codigo_do_item[]);
          $qnt_primario = $materiais[0];
        }else{
          $materiais = quantidade_total($codigo_do_item[]);
          $qnt_primario = $materiais[0] - $qnt_primario;
        
        }
  
  
      }
  

}


?>

