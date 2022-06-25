<?php
  require_once('config.php');

  $conexaoDbPostgres = new Conexao();

  $conexaoPg = $conexaoDbPostgres->conexaoPostgres();
  $nada = 0;
  
  function apenas_item($qnt_item, $porcentagem_retorno, $tipo_item){
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
  

  if(isset($_POST['submit1']))
  { 
    $gridRadios = $_POST['gridRadios'];
    $tipo_item = $_POST['tipo_item'];
    $material_select = $_POST['material_select'];
    //$vl_artefato = $_POST['vl_artefato'];
    $porcentagem_retorno = $_POST['porcentagem_retorno'];
    $qnt_primario = $_POST['qnt_primario'];
    $qnt_secundario = $_POST['qnt_secundario'];
    //$vl_item = $_POST['vl_item'];
    $qnt_item = $_POST['qnt_item'];
    $porcentagem_retorno = $porcentagem_retorno*0.01;
    if($tipo_item == "One hand"){
      //one hand
      if($qnt_primario == 0 && $qnt_secundario == 0){
        $materiais = apenas_item($qnt_item, $porcentagem_retorno, $tipo_item);
        $qnt_primario = $materiais[0];
        $qnt_secundario = $materiais[1];
      }else{
        $materiais = apenas_item($qnt_item, $porcentagem_retorno, $tipo_item);
        $qnt_primario = $materiais[0] - $qnt_primario;
        $qnt_secundario = $materiais[1] - $qnt_secundario;
      
      }
    }elseif($tipo_item == 'Two Handed'){
      //two handed
      if($qnt_primario == 0 && $qnt_secundario == 0){
        $materiais = apenas_item($qnt_item, $porcentagem_retorno, $tipo_item);
        $qnt_primario = $materiais[0];
        $qnt_secundario = $materiais[1];
      }else{
        $materiais = apenas_item($qnt_item, $porcentagem_retorno, $tipo_item);
        $qnt_primario = $materiais[0] - $qnt_primario;
        $qnt_secundario = $materiais[1] - $qnt_secundario;
      
      }
    }elseif($tipo_item == 'head/boots'){
      //head/boots
      $qnt_secundario = 0;
      $material_select = "Apenas um Material";
      if($qnt_primario == 0){
        $materiais = apenas_item($qnt_item, $porcentagem_retorno, $tipo_item);
        $qnt_primario = $materiais[0];
      }else{
        $materiais = apenas_item($qnt_item, $porcentagem_retorno, $tipo_item);
        $qnt_primario = $materiais[0] - $qnt_primario;
      
      }

    }else{
      //chest
      $qnt_secundario = 0;
      $material_select = "Apenas um Material";
      if($qnt_primario == 0){
        $materiais = apenas_item($qnt_item, $porcentagem_retorno, $tipo_item);
        $qnt_primario = $materiais[0];
      }else{
        $materiais = apenas_item($qnt_item, $porcentagem_retorno, $tipo_item);
        $qnt_primario = $materiais[0] - $qnt_primario;
      
      }


    }
    echo $gridRadios;
    $porcentagem_retorno = $porcentagem_retorno*100;
    $cadastrar = "INSERT INTO cadastrados(tipo_item,material_select,porcentagem_retorno,qnt_primario,qnt_secundario,qnt_item) 
    VALUES('$tipo_item','$material_select','$porcentagem_retorno','$qnt_primario','$qnt_secundario','$qnt_item')";
    
    //$_POST['submit1'] = ""; 

    $cadastrarItem = pg_query($conexaoPg, $cadastrar);

    // echo "Tipo de Item:". $_POST["tipo_item"]<br>;
    // echo "Artefato:". $_POST["artefato_sn"]<br>;
    // echo "Valor do Artefato:". $_POST["vl_artefato"]<br>;
    // echo "Porcentagem do Retorno:". $_POST["porcentagem_retorno"]<br>;
    // echo "Valor Primário:". $_POST["vl_primario"]<br>;
    // echo "Valor Secundario:". $_POST["vl_secundario"]<br>;
    // echo "Valor do Item:". $_POST["vl_item"]<br>;
    // echo "Quantidade de Itens:". $_POST["qnt_item"]<br>;
  }

  $sql = "SELECT * FROM cadastrados ORDER BY qnt_item DESC";

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

    <title>AmI</title>
  </head>
  <body>

    <div class="container" style ="background: #531405">
      <div class="row align-items-start">
        <div class="col">
         
        </div>
        <div class="col">
          
        </div>
        <div class="col">
          
        </div>
      </div>

      <!-- Seção Receber Valores-->
      <div class="col">
        <div class="card card-cover  overflow-hidden text-white rounded-5 " style="background: #ec552c">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <!-- ESCREVER CODIGO AQUI DENTRO-->
            <!-- Sanfona 1 -->
            <form action="oldindex.php" method="POST">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Selecionar Item
                    </button>
                  </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          <!-- Selecionar item por imagem -->
                          <img src="itens/black.png" class="img-thumbnail" alt="imagem alterada" id ="trocarimg" >
                          <figcaption class="figure-caption">Item que quer craftar</figcaption>
                          <table class="table">
                            <tbody>
                              <fieldset class = "form-group">
                                <tr>
                                  <th scope="col"><input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option1" onclick="$nada = a1();" > <img src="itens/a1.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option2" onclick="$nada = a2();"> <img src="itens/a2.png" class="img-thumbnail"></input></th>
                                  <th scope="col"><img src="itens/b1.png" class="img-thumbnail" alt="..." name ="testeimg3" type ="button" onclick = "value = 'terceira3'"></th>
                                  <th scope="col"><img src="itens/b2.png" class="img-thumbnail" alt="..." name ="testeimg4" type ="button" onclick = "value = 'quarta4'"></th>
                                  <th scope="col"><img src="itens/f1.png" class="img-thumbnail" alt="..."></th>
                                  <th scope="col"><img src="itens/f2.png" class="img-thumbnail" alt="..."></th>
                                  <th scope="col"><img src="itens/g1.png" class="img-thumbnail" alt="..."></th>
                                  
                                </tr>
                                <tr>
                                  <td><img src="itens/g1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/g2.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/h1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/h2.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/m1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/m2.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/n1.png" class="img-thumbnail" alt="..."></td>
                                </tr>
                                <tr>
                                  <td><img src="itens/n2.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                </tr>
                                <tr>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                  <td><img src="itens/b1.png" class="img-thumbnail" alt="..."></td>
                                </tr>
                              </fieldset>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
              <!-- Sanfona 2 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Inserir valores item
                  </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <!-- Primeira caixa choose -->
                      <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Tipo de Item</label>
                        <select class="form-select" id="tipo_item" name="tipo_item">
                          <option value="One hand">One hand</option>
                          <option value="Two Handed">Two Handed</option>
                          <option value="head/boots">head/boots</option>
                          <option value="chest">chest</option>
                        </select>
                      </div>
                      <!-- select material : Mais Madeira > Menos Barra,Mais Barra > Menos Madeira,Mais Madeira > Menos Couro,Mais Couro > Menos Madeira,Mais Mais Madeira > Menos Tecido,Mais Tecido > Menos Madeira,Apenas um Material -->
                      <!-- Segunda caixa choose  -->
                      <div class="input-group mb-3">
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
            </form>        
          </div>
        </div>
      </div>
      <br><br>

    <!-- Seção mostrar Resultados-->
    <div class="col">
      <div class="card card-cover  overflow-hidden text-white rounded-5 " style="background: #ec552c">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
          <!-- Escrever Codigo Aqui-->
          

          <table class="table text-white">
          <thead>
            <tr>
              <th scope="col">tipo_item</th>
              <th scope="col">tipo de material</th>
              <th scope="col">porcentagem_retorno</th>
              <th scope="col">qnt_item</th>
              <th scope="col">qnt_primario</th>
              <th scope="col">qnt_secundario</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($user_data = pg_fetch_array($result))
              {
                echo "<tr>";
                echo "<td>". $user_data['tipo_item']."</td>";
                echo "<td>". $user_data['material_select']."</td>";
                echo "<td>". $user_data['porcentagem_retorno']."</td>";
                echo "<td>". $user_data['qnt_item']."</td>";
                echo "<td>". $user_data['qnt_primario']."</td>";
                echo "<td>". $user_data['qnt_secundario']."</td>";
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





    <!-- Seção Exemplo -->
      <div class="col">
        <div class=" h-100 text-white " style="background: #ec552c">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h2>
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
              
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                <small>California</small>
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
</html>


    
  

</body>
</html>
