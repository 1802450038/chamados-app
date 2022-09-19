<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Atualizar usuario</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Atualizar usuario</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/user/update<?php echo htmlspecialchars( $user["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="user_name" class="label-input">Nome <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="user_name" name="user_name" value="<?php echo htmlspecialchars( $user["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="user_email" class="label-input">Email<span class="mandatory">*</span></label>
                    <input type="email" class="text-input" id="user_email" name="user_email" value="<?php echo htmlspecialchars( $user["user_email"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="user_login" class="label-input">Login <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="user_login" name="user_login" value="<?php echo htmlspecialchars( $user["user_login"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="user_type" class="label-input">Tipo de usuario<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="user_type" name="user_type">
                        <option value="<?php echo htmlspecialchars( $user["user_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" selected><?php echo htmlspecialchars( $user["user_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <option value="tecnico">Tecnico</option>
                        <option value="atendimento">Atendimento</option>
                        <option value="estagiario">Estagiario</option>
                        <option value="estagiario-atendimento">Estagiario atendimento</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="user_is_admin" class="label-input">Administrador<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="user_is_admin" name="user_is_admin">
                        <option value="<?php echo htmlspecialchars( $user["user_is_admin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" selected>
                            <?php if( $user["user_is_admin"] == '1' ){ ?>
                            SIM
                            <?php }else{ ?>
                            NÃO
                            <?php } ?>
                        </option>
                        <option value="1">SIM</option>
                        <option value="0">NÃO</option>
                    </select>
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

