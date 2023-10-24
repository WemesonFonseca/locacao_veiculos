<!-- Formulário de recuperar senha -->
<div class="row">
    <div class="offset-lg-4 col-lg-4 mt-5 p-5 card" style="background-color: #dcdcdb">
    	<h4>Recuperar senha</h4>
	    <form action="recuperar-senha.php" method="POST">
		    <div class="mb-3">
			    <label class="mb-1">Digite seu e-mail:</label>
			    <input type="text" name="email_usuario" class="form-control" placeholder="E-mail" required>
		    </div>
            <div class="mb-3">
			    <button type="submit" class="btn btn-success btn-sm">Enviar</button>
		    </div>
            <div class="mb-3">
            	<!-- Link para voltar a página de login -->
			    <a href="?page=dashboard">Voltar</a>
		    </div>
        </form>
    </div>
</div>    
