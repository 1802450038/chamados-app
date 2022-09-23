<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar computador</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar Computador</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/computer/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="computer_sector" class="label-input">Setor <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_sector" name="computer_sector">
                </div>
                <div class="input-group">
                    <label for="computer_patrimony" class="label-input">Patrimonio <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_patrimony" name="computer_patrimony">
                </div>
                <div class="input-group">
                    <label for="computer_ip" class="label-input">IP <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_ip" name="computer_ip">
                </div>
                <div class="input-group">
                    <label for="computer_user_name" class="label-input">Nome de usuario <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_user_name" name="computer_user_name">
                </div>
                <div class="input-group">
                    <label for="computer_user_registration" class="label-input">Matricula do usuario <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_user_registration" name="computer_user_registration">
                </div>
                <div class="input-group">
                    <label for="computer_brand" class="label-input">Marca <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_brand" name="computer_brand">
                </div>
                <div class="input-group">
                    <label for="computer_soc" class="label-input">Processador <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_soc" name="computer_soc">
                </div>
                <div class="input-group">
                    <label for="computer_mem" class="label-input">Memoria RAM (quantidade) <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_mem" name="computer_mem">
                </div>
                <div class="input-group">
                    <label for="computer_video_card" class="label-input">Placa de video<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_video_card" name="computer_video_card">
                        <option value="1">SIM</option>
                        <option value="0" selected>NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_network_card" class="label-input">Placa de rede<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_network_card" name="computer_network_card">
                        <option value="1">SIM</option>
                        <option value="0" selected>NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_hd" class="label-input">HD<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_hd" name="computer_hd">
                        <option value="1">SIM</option>
                        <option value="0" selected>NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_hd_type" class="label-input">Tipo de disco<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="computer_hd_type" name="computer_hd_type">
                        <option value="SSD">SDD</option>
                        <option value="HDD" selected>HDD</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="computer_issue" class="label-input">Defeito <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_issue" name="computer_issue">
                </div>
                <div class="input-group">
                    <label for="computer_note" class="label-input">Observação <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_note" name="computer_note">
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

