<div class="container mt-1 mb_1 d_flex justify-content_center">
     <div class="card" style="width:75%;">
        <div class="card-header text-center">
            <h2>Alta de Productos</h2>
        </div>

        <?php if(!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif; ?>
        <?php $validation = \Config\Services::validation(); ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif: ?>
        <!-- Inicio de formulario -->
        <form action="<?= base_url('/enviar-prod'); ?>" method="post" enctype="multipart/form_data">
            <div class