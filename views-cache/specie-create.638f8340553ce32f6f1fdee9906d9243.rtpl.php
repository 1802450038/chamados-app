<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar Espécie</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar Espécie</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/specie/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="description" class="label-input">Descrição <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="description" name="description">
                </div>
                <div class="input-group">
                    <label for="name" class="label-input">Nome<span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="name" name="name">
                </div>
                <div class="form-mandatory">
                    <p><span class="mandatory">*</span> Campos obrigatorios</p>
                </div>
                <div class="form-action">
                    <button class="action-reset" type="reset">Cancelar</button>
                    <button class="action-submit" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>