<!-- Página de login -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>BSB Car</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
	<div class="row">
		<div class="offset-lg-4 col-lg-4 mt-5 p-5 card" style="background-color: #dcdcdb;">
			<!-- Ação para redirecionar para verificar o login -->
			<form action="?page=verificar" method="POST">
				<div class="mb-3">
					<h3>BSB Car <i class="bi bi-car-front" style="font-size: 3rem;"></i></h3>
					<label>Usuário:</label>
					<input type="text" name="nome_usuario" class="form-control" placeholder="Nome e Sobrenome" autocomplete="off" required>
				</div>
				<div class="mb-3">
					<label>Senha:</label>
					<input type="password" name="senha_usuario" class="form-control" placeholder="Senha" required>
				</div>
				<div class="mb-3">
	                <button type="submit" class="btn btn-success btn-sm">Entrar</button>
				</div>
				<div class="mb-3">
					<!-- Links para redirecionar para recuperar senha ou realizar cadastro de usuário -->
					<a href="?page=recuperar">Esqueceu a senha?</a>&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;<a href="?page=cadastro">Cadastre-se</a>
				</div>
			</form>
		</div>
	</div>
	<!-- Rodapé -->
	<div class="container" style="margin-top: 160px;">
        <footer class="text-center text-black" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="container">
                <section class="mb-2">
                    <p>Siga nas redes sociais</p>
                  <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.instagram.com/wc_fonseca/" target="_blank" rel="noopener noreferrer" role="button" data-mdb-ripple-color="dark">
                        <i class="bi bi-instagram"></i>
                    </a>
                  <!-- Linkedin -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://www.linkedin.com/in/wemeson-fonseca/" target="_blank" rel="noopener noreferrer" role="button" data-mdb-ripple-color="dark">
                        <i class="bi bi-linkedin"></i>
                    </a>
                  <!-- Github -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1"href="https://github.com/WemesonFonseca" target="_blank" rel="noopener noreferrer" role="button" data-mdb-ripple-color="dark">
                        <i class="bi bi-github"></i>
                    </a>
                </section>
            </div>
            <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 By Wemeson Fonseca 
            </div>
        </footer>
    </div>
</body>
</html>

