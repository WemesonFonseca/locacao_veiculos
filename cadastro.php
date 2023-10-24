<!-- Página formulário de cadastro -->
<div class="row">
	<div class="offset-lg-4 col-lg-4 mt-5 p-5 card" style="background-color: #dcdcdb">
		<!-- Ação "?page=salvar-cadastro" para onde o formulário vai ser enviado -->
		<form action="?page=salvar-cadastro" method="POST">
			<input type="hidden" name="acao" value="cadastrar">
			<h3>Cadastre-se</h3>
			<div class="mb-3">
			    <label>Nome:</label>
			    <input type="text" name="nome_usuario" class="form-control" placeholder="Nome e Sobrenome" autocomplete="off" required oninput="this.value = this.value.replace(/[0-9]/g, '')">
			</div>
		  	<div class="mb-3">
		    	<label>E-mail:</label>
	   			<input type="email" name="email_usuario" class="form-control" placeholder="Seu email" autocomplete="off" required>
		    	<small id="emailHelp" class="form-text text-muted">Não compartilharemos seu e-mail com ninguém.</small>
		 	</div>
		  	<div class="mb-3">
		    	<label>Senha:</label>
				<input type="password" class="form-control" id="senha" name="senha_usuario" placeholder="Senha" minlength="8" required>
				<span class="error">A senha deve ter no mínimo 8 caracteres.</span>
		  	</div>
		  	<div class="mb-3">
		    	<label>Confirme a senha:</label>
				<input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" placeholder="Confirmar senha" required>
		  	</div>
	  			<button type="submit" class="btn btn-success btn-sm mb-1">Cadastrar</button>
	  		<div class="mb-3">
				<!-- Link "?page=login" para voltar a pagina de login -->
				<a href="?page=login">Já sou cadastrado</a>
			</div>
		</form>
	</div>
</div>
<!-- Rodapé -->
    <div class="container" style="margin-top: 100px;">
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