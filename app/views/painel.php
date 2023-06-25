<?php $this->layout('partials/master', ['title' => $title]); ?>
<link rel="stylesheet" href="/css/painel.css">

<div class="container mt-5 py-5">
    <div class="row mt-3">
        <div class="col-sm-12 bg-light p-5 rounded">
            <div class="d-flex align-items-center">
                <h3 class="mb-3">Produtos</h3>
                <button type="button" name="add" class="btn btn-primary rounded ml-auto add">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>
            <div class="d-flex align-items-center">
                <button type="button" name="add" class="btn btn-success rounded ml-auto import">
                    <i class="fa fa-print" aria-hidden="true"></i>
                </button>
            </div>

            <table class="table table-hover" id="tableProducts">
                <div id="alertContainer"></div>
                <thead>
                <tr>
                    <th scope="col">SKU</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($products as $key => $row) {
                    echo "<tr>";
                    echo "<td>{$row->sku}</td>";
                    echo "<td>".mb_strimwidth($row->name, 0, 20, '')."</td>";
                    echo "<td>";
                    echo "<button class='btn btn-primary btn-sm show' name='show' id={$row->id}><i class='fa fa-external-link icon' aria-hidden='true'></i></button>";
                    echo "<button class='btn btn-secondary btn-sm ml-1 update' name='update' id={$row->id}><i class='fa fa-pencil icon' aria-hidden='true'></i></button>";
                    echo "<button class='btn btn-danger btn-sm ml-1 delete' name='delete' id={$row->id}_{$row->sku}><i class='fa fa-times icon' aria-hidden='true'></i></button>";
                    echo "</td>";
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container py-3">
        <hr>
    </div>

    <div class="row mt-3">
        <div class="col-sm-12 bg-light p-5 rounded">
            <div class="d-flex align-items-center">
                <h3 class="mb-3">Categorias</h3>
                <button type="button" name="add" class="btn btn-primary rounded ml-auto add_category">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>
            <table class="table table-hover" id="tableCategory">
                <div id="alertContainerCategory"></div>
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($categories as $key => $row) {
                    echo "<tr>";
                    echo "<td>{$row->name}</td>";
                    echo "<td>";
                    echo "<button class='btn btn-primary btn-sm show_category' name='show_category' id={$row->id}><i class='fa fa-external-link icon' aria-hidden='true'></i></button>";
                    echo "<button class='btn btn-secondary btn-sm update_category ml-1' name='update_category' id={$row->id}><i class='fa fa-pencil icon' aria-hidden='true'></i></button>";
                    echo "<button class='btn btn-danger btn-sm delete_category ml-1' name='delete_category' id={$row->id}><i class='fa fa-times icon' aria-hidden='true'></i></button>";
                    echo "</td>";
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modalNewProduct" tabindex="-1" role="dialog"
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

                    <form class="needs-validation" id="formNewProduct">
                        <h3 class="mb-3 titleNewProduct">Novo produto</h3>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="categories">Categoria(s)</label>
                                <select class="form-control" name="categories" id="categories" multiple="multiple" required style="width: 100%;">
                                    <option></option>
                                    <?php
                                    foreach ($categories as $category) {
                                        echo "<option value='{$category->id}'>{$category->name}</option>";
                                    }
                                    ?>
                                </select>



                                <script>

                                    // In your Javascript (external .js resource or <script> tag)
                                    $(document).ready(function () {
                                        $('#categories').select2();
                                    });
                                </script>

                                <div class="invalid-feedback">
                                    Campo inválido.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="new_sku">SKU</label>
                                <input type="text" class="form-control" id="new_sku" name="sku" required>
                                <div class="invalid-feedback">
                                    Campo inválido.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="new_name">Nome</label>
                                <input type="text" class="form-control" id="new_name" name="name" required>
                                <div class="invalid-feedback">
                                    Campo inválido.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="new_description">Descrição</label>
                                <input type="text" class="form-control" id="new_description" name="description" required>
                                <div class="invalid-feedback">
                                    Campo inválido.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="new_price">Preço</label>
                                <input type="text" class="form-control" id="new_price" name="price" required>
                                <div class="invalid-feedback">
                                    Campo inválido.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="new_quantity">Quantidade</label>
                                <input type="text" class="form-control" id="new_quantity" name="quantity" required>
                                <div class="invalid-feedback">
                                    Campo inválido.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div id="messageNewProduct"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="saveNewProduct">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>
    <?php $this->insert('partials/painel/modalProduct') ?>
    <?php $this->insert('partials/painel/modalCategory') ?>
    <script src="/js/product-ajax.js"></script>
    <script src="/js/category-ajax.js"></script>
</div>
