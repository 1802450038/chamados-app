<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar Cocho</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar Cocho</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/cocho/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="modelId" class="label-input">Cocho ID<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="modelId" name="modelId">
                        <?php $counter1=-1;  if( isset($cochoModels) && ( is_array($cochoModels) || $cochoModels instanceof Traversable ) && sizeof($cochoModels) ) foreach( $cochoModels as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                            <?php } ?>
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
        <div class="content-box-collapse" id="collapse">
            <div class="content-box-collapse-title">
                <h3>Adicionar novo modelo</h3>
                <div class="collapse-button">
                </div>
            </div>
            <form method="post" action="/admin/cochomodel/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="description" class="label-input">Descrição <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="description" name="description">
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