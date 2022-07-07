<?php

    class Conexao{
        function __construct(){
            $this->dbHost = 'ec2-54-159-22-90.compute-1.amazonaws.com';
            $this->dbPort = 5432;
            $this->dbUsername = 'ziwbfsymrneawi';
            $this->dbPassword = '185883be937d48252ed824353c3fdc6ec8edd499b7665ed189c973758bae931b';
            $this->dbName = 'dcs59clq7s5jq7';
        }
            // $this->dbHost = 'localhost';
            // $this->dbPort = 5432;
            // $this->dbUsername = 'postgres';
            // $this->dbPassword = 'admin';
            // $this->dbName = 'postgres';

        function conexaoPostgres(){
            $this->conexao = pg_connect("host=$this->dbHost port=$this->dbPort dbname=$this->dbName user=$this->dbUsername password=$this->dbPassword");
            // if($this->conexao->connect_errno)
            // {
            //     echo "ERRO de Conexão";
            // }
            // else
            // {
                return $this->conexao;
            // }
        }

        function testeClass(){
            echo "funcionando";
        }
    
    }

    // CALCULAR QUANTIDADE TOTAL DE MATERIAIS NECESSARIOS
    function apenas_item($qnt_item, $porcentagem_retorno, $item_select){
        if(substr($item_select, 0, 4) == '1608'){
          //one hand(8:16)
          $total_recursos_primario = $qnt_item*16;
          $total_recursos_secundario = $qnt_item*8;
          $primario = $total_recursos_primario-($total_recursos_primario*$porcentagem_retorno);
          $secundario = $total_recursos_secundario-($total_recursos_secundario*$porcentagem_retorno);
          $primario = ceil($primario);
          $secundario = ceil($secundario);
          
        }elseif(substr($item_select, 0, 4) == '2012'){
          //two handed(12:20)
          $total_recursos_primario = $qnt_item*20;
          $total_recursos_secundario = $qnt_item*12;
          $primario = $total_recursos_primario-($total_recursos_primario*$porcentagem_retorno);
          $secundario = $total_recursos_secundario-($total_recursos_secundario*$porcentagem_retorno);
          $primario = ceil($primario);
          $secundario = ceil($secundario);
          
        }elseif(substr($item_select, 0, 4) == '0008'){
          //head/boots(8)
          $total_recursos_primario = $qnt_item*8;
          $primario = $total_recursos_primario-($total_recursos_primario*$porcentagem_retorno);
          $primario = ceil($primario);
          $secundario = 0;
          
        }else{
          //chest(16)
          $total_recursos_primario = $qnt_item*16;
          $primario = $total_recursos_primario-($total_recursos_primario*$porcentagem_retorno);
          $primario = ceil($primario);
          $secundario = 0;
            
    
        }
      return [$primario, $secundario];
      }

    // DESCOBRIR QUAL ITEM QUE FOI SELECIONADO E CALCULAR O VALOR DOS MATERIAIS INDIVIDUAIS
    function descobrirMateriais($item_select,$tier_select,$enchant_select){
        
        if(substr($item_select, 6,2) == 'MB'){
        //MADEIRA E BARA
        $stringMadeira = "vl_tabua_".$tier_select."_".$enchant_select;

        $stringBarra = "vl_barra_".$tier_select."_".$enchant_select;
        
        return[$stringMadeira, $stringBarra];
        
        }elseif(substr($item_select, 6,2) == 'MT'){
        // MADEIRA E TECIDO

        $stringMadeira = "vl_tabua_".$tier_select."_".$enchant_select;

        $stringTecido = "vl_tecido_".$tier_select."_".$enchant_select;

        return[$stringMadeira, $stringTecido];

        }elseif(substr($item_select, 6,2) == 'MC'){
        //MADEIRA E COURO

        $stringMadeira = "vl_tabua_".$tier_select."_".$enchant_select;

        
        $stringCouro = "vl_couro_".$tier_select."_".$enchant_select;

        
        return[$stringMadeira, $stringCouro];

        }elseif(substr($item_select, 6,2) == 'AB'){
        // APENAS BARRA

        $stringBarra = "vl_barra_".$tier_select."_".$enchant_select;

        
        return[$stringBarra];

        }elseif(substr($item_select, 6,2) == 'AT'){
        //APENAS TECIDO

        $stringTecido = "vl_tecido_".$tier_select."_".$enchant_select;

        
        return[$stringTecido];

        }else{
        //APENAS COURO

        $stringCouro = "vl_couro_".$tier_select."_".$enchant_select;

        $CouroSQL="SELECT $stringCouro FROM valor_materiais";


        return[$stringCouro];

        }

    }
    
    //FUNCAO PARA CALCULAR O LUCRO DE PRODUÇÃO
    function calcularLucro($vl_primario,$vl_secundario,$vl_item){

      $vl_lucro = $vl_item - ($vl_primario + $vl_secundario);


      return $vl_lucro;
    }

    function lucro_cor($lucro){ 
      if($lucro>=0){
       return 'bg-success';
     }else{
      return 'bg-danger';
     }
    }


    // FUNCAO PRINTAR IMAGEM NA TABELA
    function inserir_img($cod_img,$tier_select,$enchant_select){
      switch($cod_img){

        case '01':
          // OH MACE
          $stringCaminhoImg = $enchant_select."_".$tier_select;
          return "itens/oh_mace/$stringCaminhoImg.png";
          break;
          
        case '02':
          //DEMONIC CURSED
          $stringCaminhoImg = $enchant_select."_".$tier_select;
          return "itens/th_cursed/$stringCaminhoImg.png";
          break;
          
        case '03':
          //HUNTER HELMET
          $stringCaminhoImg = $enchant_select."_".$tier_select;
          return "itens/capacete_cacador/$stringCaminhoImg.png";
          break;
          
        case '04':
          //CLERIC ROBE
          $stringCaminhoImg = $enchant_select."_".$tier_select;
          return "itens/peito_clerico/$stringCaminhoImg.png";
          break;
          
        case '05':
          //GUARDIAN BOOTS
          $stringCaminhoImg = $enchant_select."_".$tier_select;
          return "itens/bota_guardiao/$stringCaminhoImg.png";
          break;
          
        case '06':
          return "itens/select1/oh_frost_t8_pt0.png";
          break;
          
        case '07':
          return "itens/select1/oh_nature_t8_pt0.png";
          break;
          
        case '08':
          return "itens/select1/th_fire0_t8_pt0.png";
          break;
          
        case '09':
          return "itens/select1/th_frost0_t8_pt0.png";
          break;
          
        case '10':
          return "itens/select1/th_nature1_t8_pt0.png";
          break;
          
        case '11':
          return "itens/select1/th_sagrado1_t8_pt0.png";
          break;
          
        case '12':
          return "itens/select1/peito_t8_flat/b2.png";
          break;
          
        case '13':
          return "itens/select1/peito_t8_flat/c2.png";
          break;
          
        case '14':
          return "itens/select1/peito_t8_flat/p2.png";
          break;
          
        case '15':
          return "itens/select1/capacete_t8_flat/b2.png";
          break;
          
        case '16':
          return "itens/select1/capacete_t8_flat/c0.png";
          break;
          
        case '17':
          return "itens/select1/capacete_t8_flat/p0.png";
          break;

        case '18':
          return "itens/select1/bota_t8_flat/b0.png";
          break;

        case '19':
          return "itens/select1/bota_t8_flat/c1.png";
          break;

        case '20':
          return "itens/select1/bota_t8_flat/c2.png";
          break;

        case '21':
          return "itens/select1/bota_t8_flat/p0.png";
          break;
                              
        
          
      }
    }

    
?>

