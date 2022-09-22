<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Buscar Computador</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Buscar computador</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/computer/barcode" class="form-group" enctype="multipart/form-data">

               
                <div class="input-group">
                    <label for="computer_patrimony" class="label-input">Patrimonio <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="computer_patrimony" name="computer_patrimony">
                </div>
                <div class="form-action">
                    <button class="action-submit" type="submit" style="width: 100% !important; ">Buscar</button>
                </div>
            </form>
        </div>

    </div>
</div>

