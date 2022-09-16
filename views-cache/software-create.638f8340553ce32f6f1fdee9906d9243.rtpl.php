<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar Software</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar Software</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/softwareversion/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="version" class="label-input">Versão <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="version" name="version">
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