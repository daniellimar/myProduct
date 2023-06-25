new DataTable('#tableCategory', {
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

$('.show_category').on("click", function () {
    $('#category_id, #category_name').attr('readonly', 'readonly');
    let dados = {
        id: this.id
    };

    $.ajax({
        url: '/category',
        type: 'POST',
        data: dados,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (response) {
            const result = JSON.parse(response);
            $(".titleCategory").html("Categoria: " + result.id)
            $('#modalCategory').modal('show');
            $('#modalCategory').on('shown.bs.modal', function () {
                $("#category_id").val(result.id);
                $("#category_name").val(result.name);
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

$('.add_category').on("click", function () {
    $('#modalNewCategory').modal('show');
});

$('.update_category').on("click", function () {
    let dados = {
        id: this.id
    };

    $.ajax({
        url: '/category',
        type: 'POST',
        data: dados,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (response) {
            const result = JSON.parse(response);
            $(".titleCategory").html("Editar categoria: ID " + result.id)
            $('#modalUpdateCategory').modal('show');
            $('#modalUpdateCategory').on('shown.bs.modal', function () {
                $("#category_update_id").val(result.id);
                $("#category_update_name").val(result.name);
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

$('.delete_category').on("click", function () {
    let id = this.id;

    $(".titleDeleteCategory").html("Deletar Categoria? ID: " + id)
    $("#category_delete_id").val(id);
    $('#modalDeleteCategory').modal('show');
});

$('#saveNewCategory').on("click", function () {
    const formNewCategory = $("#formNewCategory").serialize();
    $.ajax({
        url: '/newCategory',
        type: 'POST',
        data: formNewCategory,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (response) {
            const result = JSON.parse(response);
            if (result.result === true) {
                $('#modalNewCategory').modal('hide');
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

$('#saveUpdateCategory').on("click", function () {
    const formUpdateCategory = $("#formUpdateCategory").serialize();
    $.ajax({
        url: '/updateCategory',
        type: 'POST',
        data: formUpdateCategory,
        beforeSend: function () {
            $('.loading').show();
        },
        success: function (response) {
            const result = JSON.parse(response);
            if (result.result === true) {
                $('#modalNewCategory').modal('hide');
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
});

$('#saveDeleteCategory').on("click", function () {
    const formDeleteCategory = $("#formDeleteCategory").serialize();
    $.ajax({
        url: '/deleteCategory',
        type: 'POST',
        data: formDeleteCategory,
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