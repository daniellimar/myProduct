<?php $this->layout('partials/master', ['title' => $title]) ?>

<div class="container mt-5 py-5">
    <h3 class="mt-5">Produtos recentes</h3>
    <div class="group-cards mt-3 mb-3">
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="/images/header-smartphone.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional
                        content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="/images/menu-go-jumpers.png" width="500" height="500"
                     alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional
                        content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="/images/header-smartphone.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional
                        content. This card has even longer content than the first to show that equal height
                        action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card-img-top {
        object-fit: cover;
        height: 250px;
        background-color: #ffffff;
    }

    .navbar {
        background: #25252f;
    }
</style>
