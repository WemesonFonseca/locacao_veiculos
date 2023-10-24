<!-- Barra de navegação -->
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand"><i class="bi bi-car-front"></i></a> <!-- Icon na barra de navegação -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <!-- Página início -->
        <a class="nav-link active" aria-current="page" href="?page=dashboard&pag=inicio">Início</a>
        <!-- Página aluguel -->
        <a class="nav-link active" href="?page=dashboard&pag=carros">Alugar Carros</a>
        <!-- Página histórico -->
        <a class="nav-link active" href="?page=dashboard&pag=historico">Histórico</a>
        <!-- Página sobre -->
        <a class="nav-link active" href="?page=dashboard&pag=sobre">Sobre</a>
      </div>
    </div>
    <span class="navbar-text d-flex">
        <!-- Botão para ir ao perfil -->
      	<strong class="me-2">Olá, <?php print $_SESSION["nome"]; ?> </strong> <a href="?page=dashboard&pag=perfil"  style="text-decoration: none;" class="me-4"> <i class="bi bi-person-circle" style="font-size: 1.2rem;"></i>
        <!-- Botão para sair do sistema -->
      	<a href="?page=logout" class='btn btn-danger btn-sm'><strong>Sair</strong></a>
    </span>	
  </div>
</nav>
