<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags padrão -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Link para os arquivos de CSS -->
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/app.css">

    <!-- Ícones -->
    <link rel="icon" href="/imagens/logo.png" sizes="16x24">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Título da guia -->
    <title> </title>
</head>

<body>
    <section class="filtro">
        <!-- logo -->
        <header class="logo">
            <img src="/imagens/logo.png">
        </header>
        <!-- pesquisa -->
        <div class="pesquisa">
            <h1>Pesquise pelos seus produtos</h1>
            <!-- input-group -->
            <label for="search" class="input-group">
                <i class="material-icons pesquisar">search</i>
                <input type="text" name="search" id="search" placeholder="Nome do produto">
                <i class="material-icons clear">close</i>
            </label>
        </div>
    </section>

    <!-- RESULTADOS -->
    <section class="resultados">
        <header class="header">
            <h4>Meus Produtos</h4>
            <div class="acoes">
                <a class="btn-acao" id="delete"><i class="material-icons">close</i>Excluir</a>
                <a class="btn-acao" id="create"><i class="material-icons">add</i>Novo</a>
            </div>
        </header>

        <!-- tabela -->
        <div class="tabela">
            @include('inc.table')
        </div>
    </section>

    <!-- CONTAINER-MODAL -->
    <section class="container-modal">
        <!-- Modal -->
        <div class="modal" tabindex="-1" id="modal_create">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Inclusão novo produto</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <label for="nome" class="label-input">Nome: </label>
                            <input type="text" name="nome" class="input-nome" placeholder="Nome">
                        </div>
                        <div class="input-group">
                            <label for="desc" class="label-input">Descrição: </label>
                            <input type="textarea" name="descricao" class="input-descricao" placeholder="Descrição">
                        </div>
                        <div class="input-group">
                            <label for="preco" class="label-input">Preço: </label>
                            <input type="text" name="preco" class="input-preco" placeholder="Preço">
                        </div>
                        <div class="input-group">
                            <label for="quantidade" class="label-input">Quantidade: </label>
                            <input type="textarea" name="quantidade" class="input-quantidade" placeholder="Quantidade">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-submit" id='btn_cadastrar'>Salvar Item</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" id="modal_edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Alterar produto</h5>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <label for="nome" class="label-input">Nome: </label>
                            <input type="text" name="nome" class="input-nome" placeholder="Nome">
                        </div>
                        <div class="input-group">
                            <label for="desc" class="label-input">Descrição: </label>
                            <input type="textarea" name="descricao" class="input-descricao" placeholder="Descrição">
                        </div>
                        <div class="input-group">
                            <label for="preco" class="label-input">Preço: </label>
                            <input type="text" name="preco" class="input-preco" placeholder="Preço">
                        </div>
                        <div class="input-group">
                            <label for="quantidade" class="label-input">Quantidade: </label>
                            <input type="textarea" name="quantidade" class="input-quantidade" placeholder="Quantidade">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-submit" id='btn_editar'>Salvar Item</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" id="modal_success">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-success-header">
                        <h5 class="modal-title modal-success-title">Sucesso !</h5>
                    </div>
                    <div class="modal-body">
                        <label class="modal-success"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- modalCreate -->
        <form class="modal" id="modalCreate">
            <!-- header -->
            <header class="header">
                <h4>Novo Produto</h4>
            </header>
            <!-- body -->
            <article class="body">
                <!-- input-group -->
                <label for="imagem-create" class="input-group file">
                    <input type="file" name="imagem" id="imagem-create" accept=".png,.jpeg,.jpg">
                    <span class="file-input">Selecione uma imagem</span>
                    <i class="material-icons btn-primary">save_alt</i>
                </label>
                <!-- input-group -->
                <label for="nome-create" class="input-group">
                    <input type="text" name="nome" id="nome-create" placeholder="Nome">
                </label>
                <!-- input-group -->
                <label for="descricao-create" class="input-group">
                    <textarea name="descricao" id="descricao-create" rows="5" placeholder="Descrição"></textarea>
                </label>
                <!-- input-group -->
                <label class="input-group multiple">
                    <input type="text" name="preco" id="preco-create" placeholder="Preço">
                    <input type="number" min="1" name="quantidade" id="quantidade-create" placeholder="Quantidade">
                </label>
            </article>
            <!-- footer -->
            <footer class="footer">
                <a class="btn-default exit">Cancelar</a>
                <input type="submit" class="btn-primary" value="Criar">
            </footer>
        </form>

        <!-- modalEdit -->
        <form class="modal" id="modalEdit">
            <!-- header -->
            <header class="header">
                <h4>Edição do <span>Item</span></h4>
            </header>
            <!-- body -->
            <article class="body">
                <!-- input hidden -->
                <input type="hidden" name="id" id="id-edit">
                <!-- input-group -->
                <label for="imagem-edit" class="input-group file">
                    <input type="file" name="imagem" id="imagem-edit" accept=".png,.jpeg,.jpg">
                    <span class="file-input">Selecione uma imagem</span>
                    <i class="material-icons btn-primary">save_alt</i>
                </label>
                <!-- input-group -->
                <label for="nome" class="input-group">
                    <input type="text" name="nome" id="nome-edit" placeholder="Nome">
                </label>
                <!-- input-group -->
                <label for="descricao" class="input-group">
                    <textarea name="descricao" id="descricao-edit" rows="5" placeholder="Descrição"></textarea>
                </label>
                <!-- input-group -->
                <label class="input-group multiple">
                    <input type="text" name="preco" id="preco-edit" placeholder="Preço">
                    <input type="number" min="1" name="quantidade" id="quantidade-edit" placeholder="Quantidade">
                </label>
            </article>
            <!-- footer -->
            <footer class="footer">
                <a class="btn-default exit">Cancelar</a>
                <input type="submit" class="btn-primary" value="Editar">
            </footer>
        </form>

        <!-- modalDelete -->
        <form class="modal" id="modalDelete">
            <!-- header -->
            <header class="header">
                <h4>Exclusão de itens</h4>
            </header>
            <!-- body -->
            <article class="body">
                <!-- input hidden -->
                <input type="hidden" name="id" id="id-delete">
                <p>Certeza que deseja excluir os itens selecionados?</p>
            </article>
            <!-- footer -->
            <footer class="footer">
                <a class="btn-default exit">Cancelar</a>
                <input type="submit" class="btn-danger" value="Excluir">
            </footer>
        </form>
    </section>

    <!-- Link para os arquivos de JS -->
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script src="/js/mask.js"></script>
    <script src="/js/script.js"></script>


</body>

</html>