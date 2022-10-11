<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Perfil do Log</title>
<div class="content-body">
    <div class="entity-profile-card">
        <div class="entity-profile-card-middle card-category">
            <div class="entity-info sub-card-category">
                <div class="row card-category-title">
                    <h3>Log <?php echo htmlspecialchars( $log["log_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                </div>
                <div class="info-items">
                    <div class="info-box">
                        <h3 class="info-title">Registrado por</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $log["user"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Entidade</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $log["log_entity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Operação</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $log["log_operation"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Data de registro</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($log["log_dt_register"])); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Informação</h3>
                        <h3 class="info-value"><?php echo json_decode(json_encode($log["log_info"])); ?></h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
 
</div>