<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar OS</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar OS Computador</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/computer/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="user_technical_one_id" class="label-input">1º Tecnico Responsavel <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="user_technical_one_id" name="user_technical_one_id">
                </div>
                <div class="input-group">
                    <label for="user_technical_two_id" class="label-input">2º Tecnico Responsavel <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="user_technical_two_id" name="user_technical_two_id">
                </div>
                <div class="input-group">
                    <label for="user_technical_three_id" class="label-input">3º Tecnico Responsavel <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="user_technical_three_id" name="user_technical_three_id">
                </div>
                <div class="input-group">
                    <label for="os_defect" class="label-input">Defeito <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="os_defect" name="os_defect">
                </div>
                <div class="input-group">
                    <label for="os_note" class="label-input">Observação <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="os_note" name="os_note">
                </div>  
                <div class="input-group">
                    <label for="computer_video_card" class="label-input">Placa de video<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_video_card" name="computer_video_card">
                        <option value="true">SIM</option>
                        <option value="false" selected>NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_network_card" class="label-input">Placa de rede<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_network_card" name="computer_network_card">
                        <option value="true">SIM</option>
                        <option value="false" selected>NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_network_card" class="label-input">Placa de rede<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_network_card" name="computer_network_card">
                        <option value="true">SIM</option>
                        <option value="false" selected>NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_hd" class="label-input">HD<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_hd" name="computer_hd">
                        <option value="true">SIM</option>
                        <option value="false" selected>NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_hd_type" class="label-input">Tipo de disco<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_hd_type" name="computer_hd_type">
                        <option value="true">SDD</option>
                        <option value="false" selected>HDD</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_note" class="label-input">Observação <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_note" name="computer_note">
                </div>
                <div class="input-group">
                    <label for="computer_hd_type" class="label-input">Estado<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_hd_type" name="computer_hd_type">
                        <option value="true" selected>BOM</option>
                        <option value="true">MEDIO</option>
                        <option value="true">RUIM</option>
                        <option value="true">PEÇAS FALTANDO</option>
                        <option value="true">CONDENADO</option>
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

