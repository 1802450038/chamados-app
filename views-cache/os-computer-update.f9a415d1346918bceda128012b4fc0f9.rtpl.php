<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Atualizar OS</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Atualizar OS Computador</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/os-computer/update<?php echo htmlspecialchars( $os["os_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-group" enctype="multipart/form-data" style="padding-top: 0;">
                <div class="input-group">
                    <label for="user_technical_one_id" class="label-input">1º Tecnico Responsavel <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="user_technical_one_id" name="user_technical_one_id">
                        <option value="<?php echo htmlspecialchars( $os["user_technical_one_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $os["tec1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="user_technical_two_id" class="label-input">2º Tecnico Responsavel <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="user_technical_two_id" name="user_technical_two_id">
                        <?php if( $os["tec2"] == null ){ ?>
                            <option value="0">Não informado</option>
                            <?php $counter1=-1;  if( isset($tecs) && ( is_array($tecs) || $tecs instanceof Traversable ) && sizeof($tecs) ) foreach( $tecs as $key1 => $value1 ){ $counter1++; ?>
                            <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                        <?php }else{ ?>
                            <option value="<?php echo htmlspecialchars( $os["user_technical_two_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $os["tec2"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php $counter1=-1;  if( isset($tecs) && ( is_array($tecs) || $tecs instanceof Traversable ) && sizeof($tecs) ) foreach( $tecs as $key1 => $value1 ){ $counter1++; ?>
                            <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="user_technical_three_id" class="label-input">3º Tecnico Responsavel <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="user_technical_three_id" name="user_technical_three_id">
                        <?php if( $os["tec3"] == null ){ ?>
                            <option value="0">Não informado</option>
                            <?php $counter1=-1;  if( isset($tecs) && ( is_array($tecs) || $tecs instanceof Traversable ) && sizeof($tecs) ) foreach( $tecs as $key1 => $value1 ){ $counter1++; ?>
                            <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                        <?php }else{ ?>
                            <option value="<?php echo htmlspecialchars( $os["user_technical_three_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $os["tec3"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php $counter1=-1;  if( isset($tecs) && ( is_array($tecs) || $tecs instanceof Traversable ) && sizeof($tecs) ) foreach( $tecs as $key1 => $value1 ){ $counter1++; ?>
                            <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="os_defect" class="label-input">Defeito <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="os_defect" name="os_defect" value="<?php echo htmlspecialchars( $os["os_defect"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="os_fix" class="label-input">Reparo <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="os_fix" name="os_fix" value="<?php echo htmlspecialchars( $os["os_fix"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="os_note" class="label-input">Observação <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="os_note" name="os_note" value="<?php echo htmlspecialchars( $os["os_note"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>  
                <div class="input-group">
                    <label for="os_status" class="label-input">Status <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="os_status" name="os_status">
                        <option value="<?php echo htmlspecialchars( $os["os_status"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $os["os_status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <option value="ABERTO">ABERTO</option>
                        <option value="CONCLUIDO">CONCLUIDO</option>
                        <option value="AGUARDANDO PEÇAS">AGUARDANDO PEÇAS</option>
                    </select>
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

