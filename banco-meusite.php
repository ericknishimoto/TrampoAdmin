<?php

function listaMeusite($conexao) {
    $infos = array();
    $query = "select * from meusite";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function alteraMeusite ($conexao,
$tema,
$titulo,
$brand,
$cabecalho_imagem,
$titulo_banner,
$subtitulo_banner,
$subtitulo_servicos,
$servico1_icone,
$servico1_titulo,
$servico1_texto,
$servico2_icone,
$servico2_titulo,
$servico2_texto,
$servico3_icone,
$servico3_titulo,
$servico3_texto,
$subtitulo_trabalhos,
$imagem3,
$trabalho3_titulo,
$trabalho3_subtitulo,
$trabalho3_texto,
$imagem2,
$trabalho2_titulo,
$trabalho2_subtitulo,
$trabalho2_texto,
$imagem1,
$trabalho1_titulo,
$trabalho1_subtitulo,
$trabalho1_texto,
$subtitulo_sobre,
$sobre_texto,
$subtitulo_contato)
{ 
$query = "UPDATE meusite set
tema = '{$tema}',
titulo = '{$titulo}',
brand = '{$brand}',
cabecalho_imagem = '{$cabecalho_imagem}',
titulo_banner = '{$titulo_banner}',
subtitulo_banner = '{$subtitulo_banner}',
subtitulo_servicos = '{$subtitulo_servicos}',
servico1_icone = '{$servico1_icone}',
servico1_titulo = '{$servico1_titulo}',
servico1_texto = '{$servico1_texto}',
servico2_icone = '{$servico2_icone}',
servico2_titulo = '{$servico2_titulo}',
servico2_texto = '{$servico2_texto}',
servico3_icone = '{$servico3_icone}',
servico3_titulo = '{$servico3_titulo}',
servico3_texto = '{$servico3_texto}',
subtitulo_trabalhos = '{$subtitulo_trabalhos}',
trabalho3_imagem = '{$imagem3}',
trabalho3_titulo = '{$trabalho3_titulo}',
trabalho3_subtitulo = '{$trabalho3_subtitulo}',
trabalho3_texto = '{$trabalho3_texto}',
trabalho2_imagem = '{$imagem2}',
trabalho2_titulo = '{$trabalho2_titulo}',
trabalho2_subtitulo = '{$trabalho2_subtitulo}',
trabalho2_texto = '{$trabalho2_texto}',
trabalho1_imagem = '{$imagem1}',
trabalho1_titulo = '{$trabalho1_titulo}',
trabalho1_subtitulo = '{$trabalho1_subtitulo}',
trabalho1_texto = '{$trabalho1_texto}',
subtitulo_sobre = '{$subtitulo_sobre}',
sobre_texto = '{$sobre_texto}',
subtitulo_contato = '{$subtitulo_contato}'
";

return mysqli_query($conexao, $query);
}




function contaLancamentosDashboard($conexao, $mes, $ano) {

    $lancamentos = array();
    $resultado = mysqli_query($conexao, "
        select COUNT(*) as total
        from lancamentos 
        where MONTH(data) = $mes and YEAR(data)= $ano
        order by data desc;
        ");
  
    $lancamento = mysqli_fetch_assoc($resultado);
    return $lancamento;
}

function contaKmsDashboard($conexao, $mes, $ano) {

    $lancamentos = array();
    $resultado = mysqli_query($conexao, "
        select SUM(km_total) as total
        from lancamentos 
        where MONTH(data) = 10 and YEAR(data)= 2018
        order by data desc;
        ");
  
    $lancamento = mysqli_fetch_assoc($resultado);
    return $lancamento;
}

function contaValTotalDashboard($conexao, $mes, $ano) {

    $lancamentos = array();
    $resultado = mysqli_query($conexao, "
        select SUM(val_total) as total
        from lancamentos 
        where MONTH(data) = $mes and YEAR(data)= $ano
        order by data desc;
        ");
  
    $lancamento = mysqli_fetch_assoc($resultado);
    return $lancamento;
}

function contaValTotalEmpDashboard($conexao, $mes, $ano) {

    $lancamentos = array();
    $resultado = mysqli_query($conexao, "
        select SUM(val_total_empresa) as total
        from lancamentos 
        where MONTH(data) = $mes and YEAR(data)= $ano
        order by data desc;
        ");
  
    $lancamento = mysqli_fetch_assoc($resultado);
    return $lancamento;
}

function contaMotoristasDashboard($conexao, $mes, $ano) {

    $lancamentos = array();
    $resultado = mysqli_query($conexao, "
        select
        count(l.id) as total,
        l.data as data,
        m.nome as motorista_nome

        from
        motoristas as m

        join lancamentos as l
        on m.id = l.motoristas_id

        join empresas as e
        on e.id = l.empresas_id

        join produtos as p
        on p.id = l.produtos_id

        join servicos as s
        on s.id = l.servicos_id
        
        where MONTH(data) = $mes and YEAR(data)= $ano
        
        group by motorista_nome
        ");
  
        while ($lancamento = mysqli_fetch_assoc($resultado)) {
            array_push($lancamentos, $lancamento);
          }
          return $lancamentos;
}

function contaRendaDashboard($conexao,  $ano) {

    $lancamentos = array();
    $resultado = mysqli_query($conexao, "

        select
                
        Upper(substr(MONTHNAME(l.data), 1)) as data,
        sum(val_total) as val_total,
        sum(val_total_empresa) as val_total_empresa

        from
        motoristas as m

        join lancamentos as l
        on m.id = l.motoristas_id

        join empresas as e
        on e.id = l.empresas_id

        join produtos as p
        on p.id = l.produtos_id

        join servicos as s
        on s.id = l.servicos_id
        
        where YEAR(data)= $ano

        group by MONTHNAME(data)
        ORDER BY l.data
        ");
  
    while ($lancamento = mysqli_fetch_assoc($resultado)) {
        array_push($lancamentos, $lancamento);
        }
        return $lancamentos;
}

function listaLancamentos($conexao) {
    $lancamentos = array();
    $resultado = mysqli_query($conexao, "
      select
      l.id as id,
      l.data as data,
      m.nome as motorista_nome,
      e.nome as empresa_nome,
      p.nome as produto_nome,
      s.nome as servico_nome,
      val_total,
      val_total_empresa

      from
      motoristas as m
  
      join lancamentos as l
      on m.id = l.motoristas_id
  
      join empresas as e
      on e.id = l.empresas_id
  
      join produtos as p
      on p.id = l.produtos_id
  
      join servicos as s
      on s.id = l.servicos_id
      ");
  
    while ($lancamento = mysqli_fetch_assoc($resultado)) {
      array_push($lancamentos, $lancamento);
    }
    return $lancamentos;
}
  
function listaLancamento($conexao, $id) {
  
    $resultado = mysqli_query($conexao, "
    select
    l.id as id,
    l.data as data,
    m.nome as motorista_nome,
    e.nome as empresa_nome,
    p.nome as produto_nome,
    s.nome as servico_nome,
    
    l.motoristas_id,
    l.empresas_id,
    l.produtos_id,
    l.servicos_id,
    workorder,
    ref_externa,
    veiculo,
    placa,
    km_total,
    pedagio,
    extras,
    origem,
    destino,
    val_total,
    val_total_empresa,
    obs
    
    from
  
    motoristas as m
  
    join lancamentos as l
    on m.id = l.motoristas_id
  
    join empresas as e
    on e.id = l.empresas_id
  
    join produtos as p
    on p.id = l.produtos_id
  
    join servicos as s
    on s.id = l.servicos_id
  
    where
  
    l.id = $id
  
    ");
  
    return mysqli_fetch_assoc($resultado);
}

function listaLancamentosMotorista($conexao, $motorista) {

    if ($motorista == "todos") {

        $lancamentos = array();
        $resultado = mysqli_query($conexao, "
          select
          l.id as id,
          l.data as data,
          m.nome as motorista_nome,
          e.nome as empresa_nome,
          p.nome as produto_nome,
          s.nome as servico_nome,
          val_total,
          val_total_empresa
    
          from
          motoristas as m
      
          join lancamentos as l
          on m.id = l.motoristas_id
      
          join empresas as e
          on e.id = l.empresas_id
      
          join produtos as p
          on p.id = l.produtos_id
      
          join servicos as s
          on s.id = l.servicos_id
    
          ");
    } else {
        
    $lancamentos = array();
    $resultado = mysqli_query($conexao, "
      select
      l.id as id,
      l.data as data,
      m.nome as motorista_nome,
      e.nome as empresa_nome,
      p.nome as produto_nome,
      s.nome as servico_nome,
      val_total,
      val_total_empresa

      from
      motoristas as m
  
      join lancamentos as l
      on m.id = l.motoristas_id
  
      join empresas as e
      on e.id = l.empresas_id
  
      join produtos as p
      on p.id = l.produtos_id
  
      join servicos as s
      on s.id = l.servicos_id

      where 
      
      m.nome =  '$motorista'

      ");
    }
  
    while ($lancamento = mysqli_fetch_assoc($resultado)) {
      array_push($lancamentos, $lancamento);
    }
    return $lancamentos;
}
  
function insereLancamento ($conexao,$date_for_database,$motorista,$empresa,$produto,$servico,$workorder,
      $ref_externa,$veiculo,$placa,$km_total,$pedagio_decimal,$extras,$origem,$destino,$val_total,$val_total_empresa,$obs)
      { 
      $query = "INSERT INTO lancamentos (data,motoristas_id, empresas_id, produtos_id, servicos_id, workorder, ref_externa, veiculo, placa, km_total, pedagio, extras, origem, destino, val_total, val_total_empresa, obs)
      VALUES ('{$date_for_database}','{$motorista}','{$empresa}','{$produto}','{$servico}','{$workorder}',
      '{$ref_externa}','{$veiculo}','{$placa}','{$km_total}','{$pedagio_decimal}','{$extras}','{$origem}','{$destino}','{$val_total}','{$val_total_empresa}','{$obs}')"; 
  
      return mysqli_query($conexao, $query);
  }
  
  function alteraLancamento ($conexao,$id,$date_for_database,$motorista,$empresa,$produto,$servico,$workorder,
      $ref_externa,$veiculo,$placa,$km_total,$pedagio_decimal,$extras,$origem,$destino,$val_total,$val_total_empresa,$obs)
      { 
      $query = "UPDATE lancamentos set
      data = '{$date_for_database}',
      motoristas_id = '{$motorista}',
      empresas_id = '{$empresa}',
      produtos_id = '{$produto}',
      servicos_id = '{$servico}',
      workorder = '{$workorder}',
      ref_externa = '{$ref_externa}',
      veiculo = '{$veiculo}',
      placa = '{$placa}',
      km_total = '{$km_total}',
      pedagio = '{$pedagio_decimal}',
      extras = '{$extras}',
      origem = '{$origem}',
      destino = '{$destino}',
      val_total = '{$val_total}',
      val_total_empresa = '{$val_total_empresa}',
      obs = '{$obs}'
      
      where id = '{$id}'
      ";
  
      return mysqli_query($conexao, $query);
  }
  
  function excluiLancamento($conexao, $id) {
      $query = "delete from lancamentos where id = {$id}";
      return mysqli_query($conexao, $query);
}

function listaEmpresas($conexao) {
    $empresas = array();
    $query = "select * from empresas";
    $resultado = mysqli_query($conexao, $query);
    while ($empresa = mysqli_fetch_assoc($resultado)) {
        array_push($empresas, $empresa);
    }
    return $empresas;
}

function insereEmpresa($conexao,$nome) { 
    $query = "INSERT INTO empresas (nome)
    VALUES ('{$nome}') "; 

    return mysqli_query($conexao, $query);
}

function alteraEmpresa($conexao,$id,$nome) { 
    $query = "UPDATE empresas set
    nome = '{$nome}'
    
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}

function excluiEmpresa($conexao, $id) {
    $query = "delete from empresas where id = {$id}";
    return mysqli_query($conexao, $query);
}

function listaMotoristas($conexao) {
    $motoristas = array();
    $query = "select * from motoristas";
    $resultado = mysqli_query($conexao, $query);
    while ($motorista = mysqli_fetch_assoc($resultado)) {
        array_push($motoristas, $motorista);
    }
    return $motoristas;
}

function insereMotorista ($conexao,$nome,$cpf) { 
    $query = "INSERT INTO motoristas (nome, cpf)
    VALUES ('{$nome}','{$cpf}')"; 

    return mysqli_query($conexao, $query);
}

function alteraMotorista ($conexao,$id,$nome,$cpf) { 
    $query = "UPDATE motoristas set
    nome = '{$nome}',
    cpf= '{$cpf}'
    
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}

function excluiMotorista($conexao, $id) {
    $query = "delete from motoristas where id = {$id}";
    return mysqli_query($conexao, $query);
}

function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "

    select

    p.id as id,
    p.nome as nome,
    e.id as empresas_id,
    e.nome as empresas_nome
    
    from
    
    produtos as p
    
    join empresas as e
    on e.id = p.empresas_id

    ");
    
    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
      }
      return $produtos;
}

function insereProduto ($conexao,$nome,$empresas_id) { 
    $query = "INSERT INTO produtos (nome, empresas_id)
    VALUES ('{$nome}','{$empresas_id}')"; 

    return mysqli_query($conexao, $query);
}

function alteraProduto ($conexao,$id,$nome,$empresas_id) { 
    $query = "UPDATE produtos set
    nome = '{$nome}',
    empresas_id = '{$empresas_id}'
    
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}

function excluiProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function listaServicos($conexao) {
    $servicos = array();
    $query = "select * from servicos";
    $resultado = mysqli_query($conexao, $query);
    while ($servico = mysqli_fetch_assoc($resultado)) {
        array_push($servicos, $servico);
    }
    return $servicos;
}

function insereServico($conexao,$nome) { 
    $query = "INSERT INTO servicos (nome)
    VALUES ('{$nome}') "; 

    return mysqli_query($conexao, $query);
}

function alteraServico($conexao,$id,$nome)
    { 
    $query = "UPDATE servicos set
    nome = '{$nome}'
    
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}

function excluiServico($conexao, $id) {
    $query = "delete from servicos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function listaUsuarios($conexao) {
    $usuarios = array();
    $query = "select * from usuarios";
    $resultado = mysqli_query($conexao, $query);
    while ($usuario = mysqli_fetch_assoc($resultado)) {
        array_push($usuarios, $usuario);
    }
    return $usuarios;
}

function insereUsuario($conexao,$nome,$email,$senha,$permissao) { 
    $query = "INSERT INTO usuarios (nome, email, senha, permissao)
    VALUES ('{$nome}','{$email}','{$senha}','{$permissao}')"; 

    return mysqli_query($conexao, $query);
}

function alteraUsuario($conexao,$id,$senha,$permissao)
    { 
    $query = "UPDATE usuarios set
    senha = '{$senha}',
    permissao = '{$permissao}'
    
    where id = '{$id}'
    ";

    return mysqli_query($conexao, $query);
}

function excluiUsuario($conexao, $id) {
    $query = "delete from usuarios where id = {$id}";
    return mysqli_query($conexao, $query);
}

