<!-- Página formulário para alterar a senha -->
<div class="container">
    <div class="row">
        <div class="offset-lg-4 col-lg-4 mt-5 p-5 card">
            <h3 class="text-center" style="margin-bottom: 25px;">Alterar senha</h3>
            <form action="?page=dashboard&pag=salvar-dados" method="post">
                <input type="hidden" name="acao" value="alterar_senha">
                <div class="mb-3">
                    <label>Senha atual:</label>
                    <input type="password" class="form-control" id="senha" name="senha_atual" placeholder="Senha atual" required>
                </div>
                <div class="mb-3">
                    <label>Nova senha:</label>
                    <input type="password" class="form-control" id="senha" name="nova_senha" placeholder="Nova senha" minlength="8" required>
                    <span class="error">A senha deve ter no mínimo 8 caracteres.</span>
                </div>
                <div class="mb-3">
                    <label>Confirme a senha:</label>
                    <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" placeholder="Confirmar senha" required>
                </div>
                <div class="container-fluid">
                    <div class="row my-3">
                        <div>
                            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                            <a href="?page=dashboard&pag=perfil" class="mx-3  btn btn-danger btn-sm"></i>Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
