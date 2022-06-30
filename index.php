<?php
  require_once('config.php');

  $conexaoDbPostgres = new Conexao();

  $conexaoPg = $conexaoDbPostgres->conexaoPostgres();
  $nada = 0;

  if(isset($_POST['submit1']))
  { 

    // Valores do formulário Selecionados pelo usuario (imagens)               
    $item_select = $_POST['item_select'];
    $tier_select = $_POST['tier_select'];
    $enchant_select = $_POST['enchant_select'];

    $cod_img = substr($item_select, 4, 2);
    //Valores do Formulario Inseridos pelo usuário
    //$vl_artefato = $_POST['vl_artefato'];
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
    $cadastrar = "INSERT INTO cadastrados(vl_item,cod_img,porcentagem_retorno,qnt_primario,vl_primario,qnt_secundario,vl_secundario,lucro,qnt_item) 
    VALUES('$vl_item','$cod_img','$porcentagem_retorno','$qnt_primario','$vl_primario','$qnt_secundario','$vl_secundario','$lucro','$qnt_item')";
    

    $cadastrarItem = pg_query($conexaoPg, $cadastrar);

  }

  // if(isset($_POST['excluir']))
  // {
  //   $id = $_GET['id'];

  //   $verificarTabela = "SELECT * FROM cadastrados WHERE id=$id";

  //   $result = pg_query($conexaoPg, $sql);

  //   if($result->num_rows > 0)
  //   {
  //     $excluir_item = $_POST['excluir_item'];
  
  //     $excluirEspecifico = "DELETE FROM cadastrados
  //     WHERE id = '$excluir_item' ";
  
  //     $excluido = pg_query($conexaoPg, $excluirEspecifico);
  //   }

  // } 

  $sql = "SELECT * FROM cadastrados ORDER BY lucro DESC";

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
        <div class="card card-cover  h-800 overflow-hidden text-white rounded-5 " style="background: #ec552c">
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
                          <img src="itens/a1.png" class="img-thumbnail" alt="imagem alterada" id ="trocarimgitem" >
                          <figcaption class="figure-caption">Item que quer craftar</figcaption>
                          <table class="table">
                            <tbody>
                              <fieldset class = "form-group">
                                <tr>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201201MB" onclick="item1();" checked> <img src="itens/a1.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201202MT" onclick="item2();"> <img src="itens/a2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201203MC" onclick="item3();"> <img src="itens/b1.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201204MB" onclick="item4();"> <img src="itens/b2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201205MT" onclick="item5();"> <img src="itens/f1.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201206MC" onclick="item6();"> <img src="itens/f2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="201207MB" onclick="item7();"> <img src="itens/g1.png" class="img-thumbnail"></input></th>
                                  
                                </tr>
                                <tr>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160808MT" onclick="item8();"> <img src="itens/g2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160809MC" onclick="item9();"> <img src="itens/h1.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160810MB" onclick="item10();"> <img src="itens/h2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160811MT" onclick="item11();"> <img src="itens/m1.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160812MB" onclick="item12();"> <img src="itens/m2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160813MT" onclick="item13();"> <img src="itens/n1.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="160814MC" onclick="item14();"> <img src="itens/n2.png" class="img-thumbnail"></input></th>
                                </tr>
                                <tr>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="001615AB" onclick="item15();"> <img src="itens/a2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="001616AC" onclick="item16();"> <img src="itens/b2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="001617AT" onclick="item17();"> <img src="itens/f2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="001618AB" onclick="item18();"> <img src="itens/g2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000819AC" onclick="item19();"> <img src="itens/h2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000820AT" onclick="item20();"> <img src="itens/m2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="item_select"  value="000821AB" onclick="item21();"> <img src="itens/n2.png" class="img-thumbnail"></input></th>
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
                            <input type="text" class="form-control" placeholder="Material que mais usa" aria-label="inputGroup-sizing-default" name="qnt_primario" required>
                          </div>

                        <!-- Quarta Caixa -->
                          <div class="col">
                            <input type="text" class="form-control" placeholder="Material que menos usa" aria-label="inputGroup-sizing-default" name="qnt_secundario" required>
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
                            <small>5d</small>
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
                echo "<td class =".lucro_cor($lucro).">". $user_data['id']."</td>";
                echo "<td class =".lucro_cor($lucro).">". " <img src=".inserir_img($cod_img).">" ."</td>"; 
                echo "<td class =".lucro_cor($lucro).">". $user_data['porcentagem_retorno']. "%</td>";
                echo "<td class =".lucro_cor($lucro).">". $user_data['qnt_item']."</td>";
                echo "<td class =".lucro_cor($lucro).">". $user_data['qnt_primario']."</td>";
                echo "<td class =".lucro_cor($lucro).">". $user_data['vl_primario']."</td>";
                echo "<td class =".lucro_cor($lucro).">". $user_data['qnt_secundario']."</td>";
                echo "<td class =".lucro_cor($lucro).">". $user_data['vl_secundario']."</td>";
                
                echo "<td class =".lucro_cor($lucro).">". $user_data['lucro']."</td>";
                echo "<td class =".lucro_cor($lucro).">
                  <a class='btn btn-primary' style ='background: #531405' type='submit' name='excluir' >
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-magic' viewBox='0 0 16 16'>
                    <path d='M9.5 2.672a.5.5 0 1 0 1 0V.843a.5.5 0 0 0-1 0v1.829Zm4.5.035A.5.5 0 0 0 13.293 2L12 3.293a.5.5 0 1 0 .707.707L14 2.707ZM7.293 4A.5.5 0 1 0 8 3.293L6.707 2A.5.5 0 0 0 6 2.707L7.293 4Zm-.621 2.5a.5.5 0 1 0 0-1H4.843a.5.5 0 1 0 0 1h1.829Zm8.485 0a.5.5 0 1 0 0-1h-1.829a.5.5 0 0 0 0 1h1.829ZM13.293 10A.5.5 0 1 0 14 9.293L12.707 8a.5.5 0 1 0-.707.707L13.293 10ZM9.5 11.157a.5.5 0 0 0 1 0V9.328a.5.5 0 0 0-1 0v1.829Zm1.854-5.097a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L8.646 5.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0l1.293-1.293Zm-3 3a.5.5 0 0 0 0-.706l-.708-.708a.5.5 0 0 0-.707 0L.646 13.94a.5.5 0 0 0 0 .707l.708.708a.5.5 0 0 0 .707 0L8.354 9.06Z'/>
                  </svg>
                </td>";
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
              <small>5d</small>
            </li>
          </ul>
        </div>
      </div>
    </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  -->
</body>
<br><br>  





    
  </body>
</html>


    
  

</body>
</html>
