<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Registrar Motor</title>
<div class="content-body">
    <div class="register-box">
        <div class="title-box">
            <h3>Registrar Motor</h3>
        </div>
        <div class="content-box">
            <form method="post" action="/admin/motor/create" class="form-group" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="timeToRun" class="label-input">Tempo de execução <span class="mandatory">*</span></label>
                    <input type="text" class="text-input" id="timeToRun" name="timeToRun">
                </div>
                <div class="input-group">
                    <label for="useSensor" class="label-input">Utilizar sensor ? <span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="useSensor" name="useSensor">
                        <option value="true">SIM</option>
                        <option value="false">NÃO</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="boardId" class="label-input">Placa<span class="mandatory">*</span></label>
                    <select type="text" class="text-input" id="boardId" name="boardId">
                        <?php $counter1=-1;  if( isset($boards) && ( is_array($boards) || $boards instanceof Traversable ) && sizeof($boards) ) foreach( $boards as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["model"]["model"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
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
    </div>
</div>