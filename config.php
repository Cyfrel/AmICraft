<?php

    class Conexao{
        function __construct(){
            $this->dbHost = 'localhost';
            $this->dbPort = 5432;
            $this->dbUsername = 'postgres';
            $this->dbPassword = 'admin';
            $this->dbName = 'postgres';
        }


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
          $primario = ($qnt_item*16)*$porcentagem_retorno;
          $secundario = ($qnt_item*8)*$porcentagem_retorno;
          $primario = ceil($primario);
          $secundario = ceil($secundario);
          
        }elseif(substr($item_select, 0, 4) == '2012'){
          //two handed(12:20)
          $primario = ($qnt_item*20)*$porcentagem_retorno;
          $secundario = ($qnt_item*12)*$porcentagem_retorno;
          $primario = ceil($primario);
          $secundario = ceil($secundario);
          
        }elseif(substr($item_select, 0, 4) == '0008'){
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

      $vl_item = $vl_item - ($vl_primario + $vl_secundario);


      return $vl_item;
    }

    function lucro_cor($lucro){ 
      if($lucro>=0){
       return 'bg-success';
     }else{
      return 'bg-danger';
     }
    }

    function inserir_img($cod_img){
      switch($cod_img){

        case '01':
          return "itens/a1.png";
          break;
          
        case '02':
          return "itens/a2.png";
          break;
          
        case '03':
          return "itens/b1.png";
          break;
          
        case '04':
          return "itens/b2.png";
          break;
          
        case '05':
          return "itens/f1.png";
          break;
          
        case '06':
          return "itens/f2.png";
          break;
          
        case '07':
          return "itens/g1.png";
          break;
          
        case '08':
          return "itens/g2.png";
          break;
          
        case '09':
          return "itens/h1.png";
          break;
          
        case '10':
          return "itens/h2.png";
          break;
          
        case '11':
          return "itens/m1.png";
          break;
          
        case '12':
          return "itens/m2.png";
          break;
          
        case '13':
          return "itens/n1.png";
          break;
          
        case '14':
          return "itens/n2.png";
          break;
          
        case '15':
          return "itens/a2.png";
          break;
          
        case '16':
          return "itens/b2.png";
          break;
          
        case '17':
          return "itens/f2.png";
          break;

        case '18':
          return "itens/g2.png";
          break;

        case '19':
          return "itens/h2.png";
          break;

        case '20':
          return "itens/m2.png";
          break;

        case '21':
          return "itens/n2.png";
          break;
                              
        
          
      }
    }

    
?>

