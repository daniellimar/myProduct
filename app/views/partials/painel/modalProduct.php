<div class="modal fade" id="modalProduct" tabindex="-1" role="dialog"
     aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="loading">
                    <div class="loading-content">
                        <i class="fas fa-spinner fa-spin"></i>
                        Carregando...
                    </div>
                </div>
                <form class="needs-validation" id="formProduct">
                    <h3 class="mb-3 titleProduct">Produto: </h3>
                    <input type="hidden" class="form-control" id="id" name="id">
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="description">Descrição</label>
                            <input type="text" class="form-control" id="description" name="description">
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="price">Preço</label>
                            <input type="text" class="form-control" id="price" name="price">
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quantity">Quantidade</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" oninput="this.value = this.value.replace(/[^0-9.,]/g, '').replace(/([.,].*?)\..*,/g, '$1').replace(/[^\d.,]+/g,'');" required >
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <h5 class="mb-3 subProduct">Categoria(S): </h5>
                        <div class="alert alert-primary subProductCategory" role="alert"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUpdateProduct" tabindex="-1" role="dialog"
     aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="loading">
                    <div class="loading-content">
                        <i class="fas fa-spinner fa-spin"></i>
                        Carregando...
                    </div>
                </div>
                <form class="needs-validation" id="formUpdateProduct">
                    <h3 class="mb-3 titleProduct">Editar produto: </h3>
                    <input type="hidden" class="form-control" id="update_id" name="id">
                    <hr>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="update_sku">SKU</label>
                            <input type="text" class="form-control" id="update_sku" name="sku" required>
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="update_name">Nome</label>
                            <input type="text" class="form-control" id="update_name" name="name" required>
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="update_description">Descrição</label>
                            <input type="text" class="form-control" id="update_description" name="description" required>
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="update_price">Preço</label>
                            <input type="text" class="form-control" id="update_price" name="price" maxlength="11" required>
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="update_quantity">Quantidade</label>
                            <input type="text" class="form-control" id="update_quantity" name="quantity" oninput="this.value = this.value.replace(/[^0-9.,]/g, '').replace(/([.,].*?)\..*,/g, '$1').replace(/[^\d.,]+/g,'');" required >
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="saveUpdateProduct">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalDeleteProduct" tabindex="-1" role="dialog"
     aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="loading">
                    <div class="loading-content">
                        <i class="fas fa-spinner fa-spin"></i>
                        Carregando...
                    </div>
                </div>
                <form class="needs-validation" id="formDeleteProduct">
                    <h3 class="mb-3 titleDeleteProduct">Deletar produto? </h3>
                    <input type="hidden" class="form-control" id="delete_id" name="id">
                    <hr>
                    <div class="row justify-content-center text-center">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-outline-danger mr-5 rounded" id="saveDeleteProduct">
                                Sim
                            </button>
                            <button type="button" class="btn btn-outline-warning rounded" data-dismiss="modal">Não
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalImportProduct" tabindex="-1" role="dialog"
     aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="loading">
                    <div class="loading-content">
                        <i class="fas fa-spinner fa-spin"></i>
                        Carregando...
                    </div>
                </div>
                <form class="needs-validation" method="POST" action="/importProduct" id="formImportProduct" enctype="multipart/form-data">
                    <h3 class="mb-3 titleProduct">Importar Produtos: </h3>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="import_csv">Arquivo CSV</label>
                            <div class="mb-3">
                                <input class="form-control px-4" type="file" id="import_csv" name="import" accept=".csv">
                            </div>
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary rounded col-sm-12 px-5" id="saveImportProduct">Salvar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function formatarMoeda(valor) {
        const formatter = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        return formatter.format(valor);
    }

    let new_price = document.getElementById('price');
    let update_price = document.getElementById('update_price');

    new_price.addEventListener('input', function () {
        let valor = this.value.replace(/\D/g, '');
        this.value = formatarMoeda(valor / 100);
    });

    update_price.addEventListener('input', function () {
        let valor = this.value.replace(/\D/g, '');
        this.value = formatarMoeda(valor / 100);
    });
</script>