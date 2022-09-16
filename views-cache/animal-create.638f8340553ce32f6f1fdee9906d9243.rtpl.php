<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar Animal</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar Animal</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/animal/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="tag" class="label-input">Tag <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="tag" name="tag">
                </div>

                  <div class="input-group">
                    <label for="speciesId" class="label-input">Especie <span
                        class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="speciesId" name="speciesId">
                        <?php $counter1=-1;  if( isset($species) && ( is_array($species) || $species instanceof Traversable ) && sizeof($species) ) foreach( $species as $key1 => $value1 ){ $counter1++; ?>
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
                <h3>Adicionar nova espécie</h3>
                <div class="collapse-button">
                    <button onclick="toggleCollapse()" id="open-collapse"> <i class="fas fa-chevron-down"></i></button>
                    <button onclick="toggleCollapse()" id="close-collapse" class="hidden"> <i
                            class="fas fa-chevron-up"></i></button>
                </div>
            </div>
            <form method="post" action="/admin/specie/create" class="form-group" enctype="multipart/form-data" style="margin-top: -30px;">
                <div class="input-group">
                    <label for="description" class="label-input">Descrição <span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="description" name="description">
                </div>
                <div class="input-group">
                    <label for="name" class="label-input">Nome<span
                            class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="name" name="name">
                </div>
                <div class="form-action">
                    <button class="action-reset" type="reset">Cancelar</button>
                    <button class="action-submit" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>