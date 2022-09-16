<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar usuario</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/user/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="user_name" class="label-input">Usuario <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="user_name" name="user_name">
                </div>
                <div class="input-group">
                    <label for="email" class="label-input">Email <span class="mandatory">*</span></label>
                    <input type="email" class="text-input" id="email" name="email">
                </div>
                <div class="input-group">
                    <label for="password" class="label-input">Senha <span class="mandatory">*</span></label>
                    <input type="password" class="text-input" id="password" name="password">
                </div>
                <div class="input-group">
                    <label for="verify_password" class="label-input">Senha novamente <span class="mandatory">*</span></label>
                    <input type="password" class="text-input" id="verify_password" name="verify_password">
                </div>
                <div class="form-mandatory">
                    <p><span class="mandatory">*</span> Campos obrigatorios</p>
                </div>
                <div class="form-action">
                    <button class="action-reset" type="reset" onclick="history.go(-1)">Cancelar</button>
                    <button class="action-submit" type="submit">Salvar</button>
                </div>
            </form>
        </div>

    </div>
</div>

