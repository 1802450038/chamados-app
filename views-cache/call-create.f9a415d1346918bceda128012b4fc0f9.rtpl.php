<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar chamado</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar Chamado</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/call/create" class="form-group" enctype="multipart/form-data">

                <div class="input-group">
                    <label for="user_one_id" class="label-input">1º Tecnico Responsavel</span></label>
                    <select type="text" class="text-input" id="user_one_id" name="user_one_id">
                        <option value="0">Nenhum</option>
                        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="user_two_id" class="label-input">2º Tecnico Responsavel</span></label>
                    <select type="text" class="text-input" id="user_two_id" name="user_two_id">
                        <option value="0">Nenhum</option>
                        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="user_three_id" class="label-input">3º Tecnico Responsavel</span></label>
                    <select type="text" class="text-input" id="user_three_id" name="user_three_id">
                        <option value="0">Nenhum</option>
                        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="call_issue" class="label-input">Problema <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="call_issue" name="call_issue">
                </div>
                <div class="input-group">
                    <label for="call_sector" class="label-input">Setor <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="call_sector" name="call_sector">
                </div>
                <div class="input-group">
                    <label for="call_departament" class="label-input">Departamento <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="call_departament" name="call_departament">
                </div>
                <div class="input-group">
                    <label for="call_caller" class="label-input">Solicitante <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="call_caller" name="call_caller">
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