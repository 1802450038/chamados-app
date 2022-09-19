<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Atualizar computador</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Atualizar Computador</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/computer/update<?php echo htmlspecialchars( $computer["computer_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-group"
                enctype="multipart/form-data">
                <div class="input-group">
                    <label for="computer_sector" class="label-input">Setor <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_sector" name="computer_sector"
                        value="<?php echo htmlspecialchars( $computer["computer_sector"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="computer_patrimony" class="label-input">Patrimonio <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_patrimony" name="computer_patrimony"
                        value="<?php echo htmlspecialchars( $computer["computer_patrimony"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="computer_ip" class="label-input">IP <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_ip" name="computer_ip"
                        value="<?php echo htmlspecialchars( $computer["computer_ip"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="computer_user_name" class="label-input">Nome de usuario <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_user_name" name="computer_user_name"
                        value="<?php echo htmlspecialchars( $computer["computer_user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="computer_user_registration" class="label-input">Matricula do usuario <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_user_registration"
                        name="computer_user_registration" value="<?php echo htmlspecialchars( $computer["computer_user_registration"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="computer_soc" class="label-input">Processador <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_soc" name="computer_soc"
                        value="<?php echo htmlspecialchars( $computer["computer_soc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="computer_mem" class="label-input">Memoria RAM (quantidade) <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_mem" name="computer_mem"
                        value="<?php echo htmlspecialchars( $computer["computer_mem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="computer_video_card" class="label-input">Placa de video<span
                            class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_video_card" name="computer_video_card">
                        <option value="<?php echo htmlspecialchars( $computer["computer_video_card"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" selected>
                            <?php if( $computer["computer_video_card"] == '1' ){ ?>
                            SIM
                            <?php }else{ ?>
                            NÃO
                            <?php } ?>
                        </option>
                        <option value="1">SIM</option>
                        <option value="0">NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_network_card" class="label-input">Placa de rede<span
                            class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_network_card" name="computer_network_card">
                        <option value="<?php echo htmlspecialchars( $computer["computer_network_card"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" selected>
                            <?php if( $computer["computer_network_card"] == '1' ){ ?>
                            SIM
                            <?php }else{ ?>
                            NÃO
                            <?php } ?>
                        </option>
                        <option value="1">SIM</option>
                        <option value="0" >NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_hd" class="label-input">HD<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_hd" name="computer_hd">
                        <option value="<?php echo htmlspecialchars( $computer["computer_hd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" selected>
                            <?php if( $computer["computer_hd"] == '1' ){ ?>
                            SIM
                            <?php }else{ ?>
                            NÃO
                            <?php } ?>
                        </option>
                        </option>
                        <option value="1">SIM</option>
                        <option value="0">NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_hd_type" class="label-input">Tipo de disco<span
                            class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_hd_type" name="computer_hd_type">
                        <option value="<?php echo htmlspecialchars( $computer["computer_hd_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" selected>
                            <?php if( $computer["computer_hd_type"] == 'SSD' ){ ?>
                            SSD
                            <?php }else{ ?>
                            HDD
                            <?php } ?>
                        </option>
                        <option value="SSD">SDD</option>
                        <option value="HDD">HDD</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_note" class="label-input">Observação <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_note" name="computer_note" value="<?php echo htmlspecialchars( $computer["computer_note"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                </div>
                <div class="input-group">
                    <label for="computer_hd_type" class="label-input">Estado<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_hd_type" name="computer_hd_type">
                        <option value="<?php echo htmlspecialchars( $computer["computer_state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" selected>
                            <?php echo htmlspecialchars( $computer["computer_state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </option>
                        <option value="BOM">BOM</option>
                        <option value="MEDIO">MEDIO</option>
                        <option value="RUIM">RUIM</option>
                        <option value="PEÇAS FALTANDO">PEÇAS FALTANDO</option>
                        <option value="CONDENADO">CONDENADO</option>
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