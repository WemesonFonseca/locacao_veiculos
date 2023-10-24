<!-- Roteamento dos arquivos/páginas internas do sistema -->
<?php
// Iniciar a sessão
	session_start();

	if(empty($_SESSION)){
		print "<script>location.href='index.php';</script>";
	}

  include('menu.php');

  switch(@$_REQUEST['pag']){
    // Página de início
    case 'inicio':
      include('inicio.php');
      break;
    // Página de vizualização dos carros
    case 'carros':
      include('carros.php');
      break;
    // Página do perfil
    case 'perfil':
      include('perfil.php');
      break;
    // Página de alterar dados
    case 'alterar-dados':
      include('alterar-dados.php');
      break;
    // Página de alterar senha
    case 'alterar-senha':
      include('alterar-senha.php');
      break;
    // Página de salvar os dados e senha
    case 'salvar-dados':
      include('salvar-dados.php');
      break;
    case 'salvar-senha':
      include('salvar-senha.php');
      break;
    // Página do hitórico
    case 'historico':
      include('historico.php');
      break;
    // Página sobre
    case 'sobre':
      include('sobre.php');
      break;
    // Página de confirmação da reserva
    case 'confirmar_reserva':
      include('confirmar_reserva.php');
      break;
    // Página de cancelar a reserva
    case 'cancelar':
      include('cancelar.php');
      break;
    // Card dos carros , Obs: não consegui fazer uma condição tipo (For ou Foreach para os carros em um só arquivo)
    case 'carro1':
      include('carro1.php');
      break;
    case 'carro2':
      include('carro2.php');
      break;
    case 'carro3':
      include('carro3.php');
      break;
    case 'carro4':
      include('carro4.php');
      break;
    case 'carro5':
      include('carro5.php');
      break;
    case 'carro6':
      include('carro6.php');
      break;
    case 'carro7':
      include('carro7.php');
      break;
    case 'carro8':
      include('carro8.php');
      break;
    case 'carro9':
      include('carro9.php');
      break;
  }
?>
