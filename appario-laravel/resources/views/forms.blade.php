<!-- frontend-test/pages/form.html -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Formulário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h2>Cadastro de Usuário</h2>
    <form>
      <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" placeholder="Digite seu nome">
      </div>
      <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" class="form-control" placeholder="email@exemplo.com">
      </div>
      <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" class="form-control" placeholder="********">
      </div>
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
  </div>
</body>
</html>
