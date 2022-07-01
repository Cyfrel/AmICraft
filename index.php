<?php
  require_once('config.php');

  $conexaoDbPostgres = new Conexao();

  $conexaoPg = $conexaoDbPostgres->conexaoPostgres();
  $nada = 0;
  $id = 0;

  if(isset($_POST['submit1']))
  { 

    // Valores do formulário Selecionados pelo usuario (imagens)               
    $item_select = $_POST['item_select'];
    $tier_select = $_POST['tier_select'];
    $enchant_select = $_POST['enchant_select'];
    $cod_img = substr($item_select, 4, 2);

    //Valores do Formulario Inseridos pelo usuário
    $porcentagem_retorno = $_POST['porcentagem_retorno'];
    $qnt_primario = $_POST['qnt_primario'];
    $qnt_secundario = $_POST['qnt_secundario'];
    $vl_item = $_POST['vl_item'];
    $qnt_item = $_POST['qnt_item'];
    $porcentagem_retorno = $porcentagem_retorno*0.01;

    //CALCULAR QUANTIDADE DE MATERIAIS UTILIZADOS
    $materiais = apenas_item($qnt_item, $porcentagem_retorno, $item_select);
    $qnt_primario = $materiais[0];
    $qnt_secundario = $materiais[1];


    //CALCULAR VALOR DOS MATERIAIS UTILIZADOS
    $aux = descobrirMateriais($item_select,$tier_select,$enchant_select);

    //PEGA TODOS OS VLORES DO BANCO

    $banco_de_valores = "SELECT * FROM valor_materiais";

    $todosValoresBanco = pg_query($conexaoPg, $banco_de_valores);

    // SELECIONA APENAS OS QUE EU NECESSITO

    while($pega = pg_fetch_array($todosValoresBanco))
      {
       
        $vl_primario = $pega[$aux[0]];
        $vl_secundario = $pega [$aux[1]];

      }

    $vl_primario = $qnt_primario * $vl_primario;
    $vl_secundario = $qnt_secundario * $vl_secundario;
    
    $vl_item = $vl_item * $qnt_item;

    $lucro = calcularLucro($vl_primario,$vl_secundario,$vl_item);


    //CADASTRA TODOS OS DADOS NA TABELA CADASTRADOS

    $porcentagem_retorno = $porcentagem_retorno*100;
    $cadastrar = "INSERT INTO cadastrados(tier_select,enchant_select,vl_item,cod_img,porcentagem_retorno,qnt_primario,vl_primario,qnt_secundario,vl_secundario,lucro,qnt_item) 
    VALUES('$tier_select','$enchant_select','$vl_item','$cod_img','$porcentagem_retorno','$qnt_primario','$vl_primario','$qnt_secundario','$vl_secundario','$lucro','$qnt_item')";
    

    $cadastrarItem = pg_query($conexaoPg, $cadastrar);

  } 
  
  $sql = "SELECT * FROM cadastrados ORDER BY id ASC";

  $result = pg_query($conexaoPg, $sql);

  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Scripts -->
    <script src="trocaimg.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>AmICrafter</title>

  </head>
  <body style ="background: #5d1c0c">

  <header class="navbar navbar-expand-sm navbar-dark  sticky-top  "> 
    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
          AmICrafter
        </a>
      </div>
    </nav>

  </header>

  <div class="container-lg" style ="background: #5d1c0c">
     <!-- Seção Receber Valores-->
      <div class="col">
        <div class="card card-cover  h-800 overflow-hidden text-black rounded-5 " style="background: #ec552c">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <!-- ESCREVER CODIGO AQUI DENTRO-->
            <form action="oldindex.php" method="POST">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <!-- Sanfona 1 (ITENS) -->
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Selecionar Item
                    </button>
                  </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          <!-- Selecionar item por imagem -->
                          <img src="itens/select1/oh_mace_t8_pt0.png" class="img-thumbnail" alt="imagem alterada" id ="trocarimgitem" >
                          <figcaption class="figure-caption">Item que quer craftar</figcaption>
                          <table class="table">
                            <tbody>
                              <fieldset class = "form-group">
                                <tr>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160801MB" onclick="item1();" checked> <img src="itens/select1/oh_mace_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201202MT" onclick="item2();"> <img src="itens/select1/th_cursed0_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000803AC" onclick="item3();"> <img src="itens/select1/capacete_cacador_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="001604AT" onclick="item4();"> <img src="itens/select1/peito_clerico_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000805AB" onclick="item5();"> <img src="itens/select1/bota_guardiao_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160806MB" onclick="item6();"> <img src="itens/select1/oh_frost_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160807MB" onclick="item7();"> <img src="itens/select1/oh_nature_t8_pt0.png" class="img-thumbnail"></input></th>
                                  
                                </tr>
                                <tr>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201208MB" onclick="item8();"> <img src="itens/select1/th_fire0_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201209MB" onclick="item9();"> <img src="itens/select1/th_frost0_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201210MB" onclick="item10();"> <img src="itens/select1/th_nature1_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201211MC" onclick="item11();"> <img src="itens/select1/th_sagrado1_t8_pt0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="001612AT" onclick="item12();"> <img src="itens/select1/peito_t8_flat/b2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="001613AC" onclick="item13();"> <img src="itens/select1/peito_t8_flat/c2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="001614AB" onclick="item14();"> <img src="itens/select1/peito_t8_flat/p2.png" class="img-thumbnail"></input></th>
                                </tr>
                                <tr>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000815AT" onclick="item15();"> <img src="itens/select1/capacete_t8_flat/b2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000816AC" onclick="item16();"> <img src="itens/select1/capacete_t8_flat/c0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000817AB" onclick="item17();"> <img src="itens/select1/capacete_t8_flat/p0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000818AT" onclick="item18();"> <img src="itens/select1/bota_t8_flat/b0.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000819AC" onclick="item19();"> <img src="itens/select1/bota_t8_flat/c1.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000820AC" onclick="item20();"> <img src="itens/select1/bota_t8_flat/c2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000821AB" onclick="item21();"> <img src="itens/select1/bota_t8_flat/p0.png" class="img-thumbnail"></input></th>
                                </tr>
                              </fieldset>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                <!-- Sanfona 2 (TIER) -->
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingdois">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsedois" aria-expanded="false" aria-controls="flush-collapsedois">
                      Selecionar Tier Item
                    </button>
                  </h2>
                  <div id="flush-collapsedois" class="accordion-collapse collapse" aria-labelledby="flush-headingdois" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <img src="tiers/t4.png" class="img-thumbnail" alt="imagem alterada" id ="trocarimgtier" >
                      <figcaption class="figure-caption">Tier do Item</figcaption>
                      <table class="table">
                        <tbody>
                          <fieldset class = "form-group">
                            <tr>
                              <th scope="col"><input class="form-check-input" type="radio" name="tier_select" id="t4" value="t4" onclick="tier4();" checked> <img src="tiers/t4.png" class="img-thumbnail"></input></th>
                              <th scope="col"><input class="form-check-input" type="radio" name="tier_select" id="t5" value="t5" onclick="tier5();"> <img src="tiers/t5.png" class="img-thumbnail"></input></th>
                              <th scope="col"><input class="form-check-input" type="radio" name="tier_select" id="t6" value="t6" onclick="tier6();"> <img src="tiers/t6.png" class="img-thumbnail"></input></th>
                              <th scope="col"><input class="form-check-input" type="radio" name="tier_select" id="t7" value="t7" onclick="tier7();"> <img src="tiers/t7.png" class="img-thumbnail"></input></th>
                              <th scope="col"><input class="form-check-input" type="radio" name="tier_select" id="t8" value="t8" onclick="tier8();"> <img src="tiers/t8.png" class="img-thumbnail"></input></th>                           
                            </tr>
                          </fieldset>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Sanfona 3 (ENCANTAMENTO) -->
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Selecionar Encantamento Item #3
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <img src="enchant/0.png" class="img-thumbnail" alt="imagem alterada" id ="trocarimgenchant" >
                      <figcaption class="figure-caption">Encantamento do Item</figcaption>
                      <table class="table">
                        <tbody>
                          <fieldset class = "form-group">
                            <tr>
                              <th scope="col"><input class="form-check-input" type="radio" name="enchant_select" id="pt0" value="pt0" onclick="enchant0();" checked> <img src="enchant/0.png" class="img-thumbnail"></input></th>
                              <th scope="col"><input class="form-check-input" type="radio" name="enchant_select" id="pt1" value="pt1" onclick="enchant1();"> <img src="enchant/1.png" class="img-thumbnail"></input></th>
                              <th scope="col"><input class="form-check-input" type="radio" name="enchant_select" id="pt2" value="pt2" onclick="enchant2();"> <img src="enchant/2.png" class="img-thumbnail"></input></th>
                              <th scope="col"><input class="form-check-input" type="radio" name="enchant_select" id="pt3" value="pt3" onclick="enchant3();"> <img src="enchant/3.png" class="img-thumbnail"></input></th>                           
                            </tr>
                          </fieldset>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Sanfona 4 (QNT MATERIAIS) -->
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Inserir Valores Material
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                      <!-- Primeira caixa choose -->
                        
                        <!-- select material : Mais Madeira > Menos Barra,Mais Barra > Menos Madeira,Mais Madeira > Menos Couro,Mais Couro > Menos Madeira,Mais Mais Madeira > Menos Tecido,Mais Tecido > Menos Madeira,Apenas um Material -->
                        <!-- Segunda caixa choose  -->
                        <!-- <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupSelect01">Com Artefato</label>
                          <select class="form-select" id="material_select" name="material_select">
                            <option value="Mais Madeira > Menos Barra">Mais Madeira > Menos Barra</option>
                            <option value="Mais Barra > Menos Madeira">Mais Barra > Menos Madeira</option>
                            <option value="Mais Madeira > Menos Couro">Mais Madeira > Menos Couro</option>
                            <option value="Mais Couro > Menos Madeira">Mais Couro > Menos Madeira</option>
                            <option value="Mais Mais Madeira > Menos Tecido">Mais Madeira > Menos Tecido</option>
                            <option value="Mais Tecido > Menos Madeira">Mais Tecido > Menos Madeira</option>
                            <option value="Apenas um Material">Apenas um Material</option>                
                          </select>
                        </div> -->

                        <div class="input-group mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-default">Valor do Item que quer Produzir: </span>
                          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="vl_item" required>
                        </div>
                        <!-- Teste Artefatos

                        <div class="input-group mb-3">
                          <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                          </div>
                          <input type="text" class="form-control" aria-label="Text input with checkbox" value="Valor artefatos" name="vl_artefato">
                        </div>
                        -->

                        <!-- Primeira caixa -->
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-default">Valor do Retorno de Recursos(%)</span>
                          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"name="porcentagem_retorno" required>
                        </div>

                        <!-- Segunda caixa -->
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-default">Quantidade de Itens a serem produzidos: </span>
                          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="qnt_item" required>
                        </div>

                        <!-- Terceira Caixa -->
                        <div class="row g-3">
                          <label  class="form-label">Recursos já Possuidos:</label>
                          <div class="col">
                            <label for="">Material que mais usa</label>
                            <input type="text" class="form-control" placeholder="Exemplo: 20" value= "0" aria-label="inputGroup-sizing-default" name="qnt_primario" required>
                          </div>

                        <!-- Quarta Caixa -->
                          <div class="col">
                            <label for="">Material que menos usa</label>
                            <input type="text" class="form-control" placeholder="Exemplo: 12" value= "0" aria-label="inputGroup-sizing-default" name="qnt_secundario" required>
                          </div>
                        </div>
                        <br>

                        <!-- Quinta Caixa 
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-default">Valor do Item</span>
                          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="vl_item">
                        </div>
                        -->

                        <!-- Sexta Caixa 
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-default">Valor do Material Primário</span>
                          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="vl_primario">
                        </div>
                        
                        -->
                      
                        <!-- Setima Caixa 
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="inputGroup-sizing-default">Valor do Material Secundário</span>
                          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="vl_secundário">
                        </div>
                        
                        -->
                        
                        

                        <!-- Botão -->
                        <button type="submit" class="btn btn-primary btn-lg" name="submit1" style ="background: #531405">Cadastrar</button>

                        

                        <ul class="d-flex list-unstyled mt-auto">
                          <li class="me-auto">
                            
                          </li>
                          <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                            <small>Geraldo Bisneto</small>
                          </li>
                          <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                            <small>Senac</small>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>        
          </div>
        
      </div>
      <br><br>

    <!-- Seção mostrar Resultados-->
    <div class="col">
      <div class="card card-cover  overflow-hidden text-white rounded-5 " style="background: #ec552c">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
          <!-- Escrever Codigo Aqui-->
          

          <table id ='tabela_itens' class="table text-white">
          <thead>
            <tr>
              <th scope="col"> ID</th>
              <th scope="cool">Imagem do Item</th> <!-- ainda n inserida-->
              <th scope="col">Porcentagem De
                Retorno</th>
              <th scope="col">Quantidade de 
                Itens
              </th>
              <th scope="col">Quantidade de 
                Materiais Primários
              </th>
              <th scope="col">Valor de 
                Materiais Primarios
              </th>
              <th scope="col">Quantidade de 
                Materiais Secundários
              </th>
              <th scope="col">Valor de 
                Materiais Secundarios</th>
              <th scope="col">Lucro</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($user_data = pg_fetch_array($result))
              {
                echo "<tr>";
                $lucro = $user_data['lucro'];
                $cod_img = $user_data['cod_img'];
                $tier_select = $user_data['tier_select'];
                $enchant_select = $user_data['enchant_select'];
                echo "<td class =".lucro_cor($lucro).">". $user_data['id']."</td>";
                echo "<td class =".lucro_cor($lucro).">". " <img src=".inserir_img($cod_img,$enchant_select,$tier_select).">" ."</td>"; 
                echo "<td class =".lucro_cor($lucro).">". $user_data['porcentagem_retorno']. "%</td>";
                echo "<td class =".lucro_cor($lucro).">". $user_data['qnt_item']."</td>";
                echo "<td class =".lucro_cor($lucro).">". $user_data['qnt_primario']."</td>";
                echo "<td class =".lucro_cor($lucro).">$". $user_data['vl_primario']."</td>";
                echo "<td class =".lucro_cor($lucro).">". $user_data['qnt_secundario']."</td>";
                echo "<td class =".lucro_cor($lucro).">$". $user_data['vl_secundario']."</td>";
                echo "<td class =".lucro_cor($lucro).">". $user_data['lucro']."</td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>

          <ul class="d-flex list-unstyled mt-auto">
            <li class="me-auto">
            
            </li>
            <li class="d-flex align-items-center me-3">
              <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
              <small>Geraldo Bisneto</small>
            </li>
            <li class="d-flex align-items-center">
              <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
              <small>Senac</small>
            </li>
          </ul>
        </div>
      </div>
    </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
</body>
<br><br>  
</body>
</html>
