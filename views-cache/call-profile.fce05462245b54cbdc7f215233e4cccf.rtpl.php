<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Perfil do Chamado</title>
<div class="content-body">
    <div class="entity-profile-card">
        <div class="entity-profile-card-middle card-category">
            <div class="entity-info sub-card-category">
                <div class="row card-category-title">
                    <h3>Chamado <?php echo htmlspecialchars( $call["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                </div>
                <div class="info-items">
                    <div class="info-box">
                        <h3 class="info-title">Registrado por</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $call["user"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">1º Tecnico Responsavel</h3>
                        <?php if( $call["tec1"] ){ ?>

                        <h3 class="info-value"><?php echo htmlspecialchars( $call["tec1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                        <?php }else{ ?>

                        <td><a href="../.././admin/callview<?php echo htmlspecialchars( $call["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/accept<?php echo htmlspecialchars( $user, ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente aceitar essa solicitação?')" class="small-action-btn done">Aceitar</a></td>
                        <?php } ?>

                    </div>
                    <?php if( $call["tec2"] ){ ?>

                    <div class="info-box">
                        <h3 class="info-title">2º Tecnico Responsavel</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $call["tec2"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <?php } ?>

                    <?php if( $call["tec3"] ){ ?>

                    <div class="info-box">
                        <h3 class="info-title">3º Tecnico Responsavel</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $call["tec3"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <?php } ?>

                    <div class="info-box">
                        <h3 class="info-title">Setor</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $call["call_sector"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Departamento</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $call["call_departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Solicitante</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $call["call_caller"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                  
                    <div class="info-box">
                        <h3 class="info-title">Data de registro</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($call["call_dt_register"])); ?></h3>
                    </div>

                    <div class="info-box">
                        <h3 class="info-title">Data de atualização</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($call["call_dt_last_update"])); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Data de conclusão</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($call["call_dt_last_update"])); ?></h3>
                    </div>
                </div>

            </div>
        </div>
    </div>
 
</div>