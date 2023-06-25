<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog"
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
                <form class="needs-validation" id="formCategory">
                    <h3 class="mb-3 titleCategory">Categoria: </h3>
                    <input type="hidden" class="form-control" id="category_id" name="id">
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="category_name" name="name">
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
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

<div class="modal fade" id="modalNewCategory" tabindex="-1" role="dialog"
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

                <form class="needs-validation" id="formNewCategory">
                    <h3 class="mb-3 titleNewCategory">Nova categoria</h3>
                    <input type="hidden" class="form-control" id="category_new_id" name="id">
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="category_new_name" name="name">
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container">
                <div id="messageNewCategory"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="saveNewCategory">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalUpdateCategory" tabindex="-1" role="dialog"
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
                <form class="needs-validation" id="formUpdateCategory">
                    <h3 class="mb-3 titleCategory">Editar categoria: </h3>
                    <input type="hidden" class="form-control" id="category_update_id" name="id">
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="category_update_name" name="name">
                            <div class="invalid-feedback">
                                Campo inválido.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" id="saveUpdateCategory">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDeleteCategory" tabindex="-1" role="dialog"
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
                <form class="needs-validation" id="formDeleteCategory">
                    <h3 class="mb-3 titleDeleteCategory">Deletar categoria? </h3>
                    <input type="hidden" class="form-control" id="category_delete_id" name="id">
                    <hr>
                    <div class="row justify-content-center text-center">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-outline-danger mr-5 rounded" id="saveDeleteCategory">
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