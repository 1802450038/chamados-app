<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Atualizar senha</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Atualizar senha</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/user/password-change<?php echo htmlspecialchars( $user["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-group" enctype="multipart/form-data">

                <div class="input-group">
                    <label for="user_password" class="label-input">Senha nova <span class="mandatory">*</span></label>
                    <input type="password" class="text-input" id="user_password" name="user_password">
                    <i id="toggle-eye" class="fas fa-eye-slash togglePass" onclick="togglePasswordView()"></i>
                </div>
                <div class="input-group">
                    <label for="user_verify_password" class="label-input">Confirmar senha <span class="mandatory">*</span></label>
                    <input type="password" class="text-input" id="user_verify_password" name="user_verify_password">
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

