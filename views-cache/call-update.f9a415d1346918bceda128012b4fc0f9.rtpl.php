<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Atualizar chamado</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Atualizar Chamado</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/call/update<?php echo htmlspecialchars( $call["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-group" enctype="multipart/form-data">

                <div class="input-group">
                    <label for="user_one_id" class="label-input">1º Tecnico Responsavel</span></label>
                    <select type="text" class="text-input" id="user_one_id" name="user_one_id">
                        <option value="<?php echo htmlspecialchars( $call["user_one_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $call["tec1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="user_two_id" class="label-input">2º Tecnico Responsavel</span></label>
                    <select type="text" class="text-input" id="user_two_id" name="user_two_id">
                        <?php if( $call["tec2"] ){ ?>
                        <option value="<?php echo htmlspecialchars( $call["user_two_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $call["tec2"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                        <?php }else{ ?>
                        <option value="0">Nenhum</option>
                        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                        <?php } ?>
                        <option value="0">Nenhum</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="user_three_id" class="label-input">3º Tecnico Responsavel</span></label>
                    <select type="text" class="text-input" id="user_three_id" name="user_three_id">
                        <?php if( $call["tec3"] ){ ?>
                        <option value="<?php echo htmlspecialchars( $call["user_three_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $call["tec3"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                        <?php }else{ ?>
                        <option value="0">Nenhum</option>
                        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                        <?php } ?>
                        <option value="0">Nenhum</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="call_issue" class="label-input">Problema <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="call_issue" name="call_issue" value="<?php echo htmlspecialchars( $call["call_issue"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="call_sector" class="label-input">Setor <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="call_sector" name="call_sector" value="<?php echo htmlspecialchars( $call["call_sector"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="call_departament" class="label-input">Departamento <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="call_departament" name="call_departament" value="<?php echo htmlspecialchars( $call["call_departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="call_caller" class="label-input">Solicitante <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="call_caller" name="call_caller" value="<?php echo htmlspecialchars( $call["call_caller"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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