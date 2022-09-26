<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar OS</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar OS para o computador <?php echo htmlspecialchars( $computer["computer_patrimony"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/os-computer/create-id<?php echo htmlspecialchars( $computer["computer_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-group" enctype="multipart/form-data">

                <div class="input-group">
                    <label for="user_technical_one_id" class="label-input">1º Tecnico Responsavel <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="user_technical_one_id" name="user_technical_one_id">
                        <?php $counter1=-1;  if( isset($tecs) && ( is_array($tecs) || $tecs instanceof Traversable ) && sizeof($tecs) ) foreach( $tecs as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="user_technical_two_id" class="label-input">2º Tecnico Responsavel <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="user_technical_two_id" name="user_technical_two_id">
                        <option value="0">Nenhum</option>
                        <?php $counter1=-1;  if( isset($tecs) && ( is_array($tecs) || $tecs instanceof Traversable ) && sizeof($tecs) ) foreach( $tecs as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="user_technical_three_id" class="label-input">3º Tecnico Responsavel <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="user_technical_three_id" name="user_technical_three_id">
                        <option value="0">Nenhum</option>
                        <?php $counter1=-1;  if( isset($tecs) && ( is_array($tecs) || $tecs instanceof Traversable ) && sizeof($tecs) ) foreach( $tecs as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_id" class="label-input">Computador <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_id" name="computer_id">
                        
                        <option value="<?php echo htmlspecialchars( $computer["computer_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $computer["computer_patrimony"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $computer["computer_dt_register"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        
                    </select>
                </div>
                <div class="input-group">
                    <label for="os_defect" class="label-input">Defeito <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="os_defect" name="os_defect">
                </div>
                <div class="input-group">
                    <label for="os_fix" class="label-input">Reparo <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="os_fix" name="os_fix">
                </div>
                <div class="input-group">
                    <label for="os_note" class="label-input">Observação <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="os_note" name="os_note">
                </div>  
                <div class="input-group">
                    <label for="os_status" class="label-input">Status <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="os_status" name="os_status">
                        <option value="ABERTO">ABERTO</option>
                        <option value="CONCLUIDO">CONCLUIDO</option>
                        <option value="AGUARDANDO PEÇAS">AGUARDANDO PEÇAS</option>
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

