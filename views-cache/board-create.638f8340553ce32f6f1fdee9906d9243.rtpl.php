<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar Placa</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar Placa</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/board/create" class="form-group" enctype="multipart/form-data">

                <div class="input-group">
                    <label for="cochoId" class="label-input">Cocho<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="cochoId" name="cochoId">
                        <?php $counter1=-1;  if( isset($cocho) && ( is_array($cocho) || $cocho instanceof Traversable ) && sizeof($cocho) ) foreach( $cocho as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["model"]["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="boardModelId" class="label-input">Modelo de placa<span
                            class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="boardModelId" name="boardModelId">
                        <?php $counter1=-1;  if( isset($boardModel) && ( is_array($boardModel) || $boardModel instanceof Traversable ) && sizeof($boardModel) ) foreach( $boardModel as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["model"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="softwareVersionId" class="label-input">Versão do software<span
                            class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="softwareVersionId" name="softwareVersionId">
                        <?php $counter1=-1;  if( isset($sofwareVersion) && ( is_array($sofwareVersion) || $sofwareVersion instanceof Traversable ) && sizeof($sofwareVersion) ) foreach( $sofwareVersion as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["version"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
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
                    <!-- <button onclick="toggleCollapse()" id="open-collapse"> <i class="fas fa-chevron-down"></i></button> -->
                    <!-- <button onclick="toggleCollapse()" id="close-collapse" class="hidden"> <i
                            class="fas fa-chevron-up"></i></button> -->
                </div>
            </div>
            <form method="post" action="/admin/boardmodel/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="model" class="label-input">Modelo <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="model" name="model">
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
                <h3>Adicionar novo software</h3>
                <div class="collapse-button">
                </div>
            </div>
            <form method="post" action="/admin/softwareversion/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="version" class="label-input">Versão <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="version" name="version">
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