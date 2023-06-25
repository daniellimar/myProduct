new DataTable('#tableProducts', {
    language: {
        url: '/js/pt-BR.json',
    },
    searching: true,
    ordering: false,
    info: false,
    bFilter: false,
    buttons: [
        'pageLength'
    ]
});

function formatarValor(valor) {
  const formatter = new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL',
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  });

  return formatter.format(valor);
}

function validarCamposVazios2(formId) {
    const inputs = $('#' + formId + ' :input[required]');
    let camposVazios = false;

    $.each(inputs, function (index, input) {
        let value = $(input).val();
        if (value === '') {
            $(input).addClass('is-invalid');
            camposVazios = true;
        } else {
            $(input).removeClass('is-invalid');
        }
    });
    if (camposVazios) {
        return 1;
    }
    return 0;
}

$('.show').on("click", function () {
    $('#id, #sku, #name, #description, #price, #quantity').attr('readonly', 'readonly');
    let dados = {
        id: this.id
    };

    $.ajax({
        url: '/product',
        type: 'POST',
        data: dados,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (response) {
            const result = JSON.parse(response);
            const products = result.products;
            const categories = result.categories;

            $(".titleProduct").html("Produto: SDK " + products.sku)
            $('#modalProduct').modal('show');
            $('#modalProduct').on('shown.bs.modal', function () {
                $("#id").val(products.id);
                $("#sku").val(products.sku);
                $("#name").val(products.name);
                $("#description").val(products.description);
                $("#price").val(formatarValor(products.price));
                $("#quantity").val(products.quantity);

                $(".subProductCategory").empty();
                for (let key in categories) {
                    $(".subProductCategory").append('<div class="alert alert-primary" role="alert">' + categories[key].name + '</div>');
                }
            });
        },
        error: function () {
            $('.loading').hide();
            console.log('Erro na requisição.');
        },
        complete: function () {
            $('.loading').hide();
        },
    });
});

$('.add').on("click", function () {
    $('#modalNewProduct').modal('show');
});

$('.import').on("click", function () {
    $('#modalImportProduct').modal('show');
});

$('#savexxImportProduct').on("click", function () {
    const formImportProduct = $("#formImportProduct").serialize();

    $.ajax({
        url: 'importProduct/',
        type: 'POST',
        data: formImportProduct,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (response) {
            const result = JSON.parse(response);
            if (result.result === true) {
                $('#modalNewProduct').modal('hide');
                $(location).attr('href', '/painel');
            } else {
                exibirErrorBootstrap('Falha ao adicionar o Produto.', 'danger');
            }
        },
        error: function () {
            $('.loading').hide();
            console.log('Erro na requisição.');
        },
        complete: function () {
            $('.loading').hide();
        },
    });
});

$('.delete').on("click", function () {
    let value = this.id.split('_');
    let id = value[0];
    let sdk = value[1];

    $(".titleDeleteProduct").html("Deletar Produto? SDK " + sdk)
    $("#delete_id").val(id);
    $('#modalDeleteProduct').modal('show');
});

$('.update').on("click", function () {
    $('#id, #sku, #name, #description, #price, #quantity').attr('readonly', 'readonly');

    let dados = {
        id: this.id
    };

    $.ajax({
        url: '/product',
        type: 'POST',
        data: dados,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (response) {
            const result = JSON.parse(response);
            const products = result.products;
            const categories = result.categories;

            $(".titleProduct").html("Editar produto: SDK " + products.sku)
            $('#modalUpdateProduct').modal('show');
            $('#modalUpdateProduct').on('shown.bs.modal', function () {
                $("#update_id").val(products.id);
                $("#update_sku").val(products.sku);
                $("#update_name").val(products.name);
                $("#update_description").val(products.description);
                $("#update_price").val(products.price);
                $("#update_quantity").val(products.quantity);
            });
        },
        error: function () {
            $('.loading').hide();
            console.log('Erro na requisição.');
        },
        complete: function () {
            $('.loading').hide();
        },
    });
});

$('#saveNewProduct').on("click", function () {
    if (validarCamposVazios2('formNewProduct') === 0) {
        let categories = $("#categories").val().toString();
        const formNewProduct = $("#formNewProduct").serialize() + '&category_id=' + categories;

        $.ajax({
            url: '/newProduct',
            type: 'POST',
            data: formNewProduct,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (response) {
                const result = JSON.parse(response);
                if (result.result === true) {
                    $('#modalNewProduct').modal('hide');
                    $(location).attr('href', '/painel');
                } else {
                    exibirErrorBootstrap('Falha ao adicionar o Produto.', 'danger');
                }
            },
            error: function () {
                $('.loading').hide();
                console.log('Erro na requisição.');
            },
            complete: function () {
                $('.loading').hide();
            },
        });
    }
});

$('#saveUpdateProduct').on("click", function () {
    if (validarCamposVazios2('formUpdateProduct') === 0) {
        const formUpdateProduct = $("#formUpdateProduct").serialize();
        $.ajax({
            url: '/updateProduct',
            type: 'POST',
            data: formUpdateProduct,
            beforeSend: function () {
                $('.loading').show();
            },
            success: function (response) {
                const result = JSON.parse(response);
                if (result.result === true) {
                    $('#modalNewProduct').modal('hide');
                    $(location).attr('href', '/painel');
                } else {
                    exibirErrorBootstrap('Falha ao atualizar Produto.', 'danger');
                }
            },
            error: function () {
                $('.loading').hide();
                console.log('Erro na requisição.');
            },
            complete: function () {
                $('.loading').hide();
            },
        });
    }
});

$('#saveDeleteProduct').on("click", function () {
    const formDeleteProduct = $("#formDeleteProduct").serialize();
    $.ajax({
        url: '/deleteProduct',
        type: 'POST',
        data: formDeleteProduct,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (response) {
            const result = JSON.parse(response);

            if (result.result === false) {
                $(location).attr('href', '/painel');
            } else {
                exibirAlertaBootstrap('Falha ao excluir Produto, tente novamente mais tarde.', 'danger');
            }
        },
        error: function () {
            $('.loading').hide();
            console.log('Erro na requisição.');
        },
        complete: function () {
            $('.loading').hide();
        },
    });
});

function exibirAlertaBootstrap(mensagem, tipo) {
    const alertDiv = $('<div class="alert alert-dismissible">')
        .addClass('alert-' + tipo)
        .html('<button type="button" class="close" data-dismiss="alert">&times;</button>' + mensagem);

    $('#alertContainer').empty().append(alertDiv);
}

function exibirErrorBootstrap(mensagem, tipo) {
    const alertDiv = $('<div class="alert alert-dismissible">')
        .addClass('alert-' + tipo)
        .html('<button type="button" class="close" data-dismiss="alert">&times;</button>' + mensagem);

    $('#messageNewProduct').empty().append(alertDiv);
}

