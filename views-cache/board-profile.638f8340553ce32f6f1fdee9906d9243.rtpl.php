<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Perfil da Placa</title>
<div class="content-body">
    <div class="entity-profile-card">
        <div class="entity-profile-card-middle card-category">
            <div class="entity-info sub-card-category">
                <div class="row card-category-title">
                    <h3>Placa</h3>
                </div>
                <div class="info-items">
                    <div class="info-box">
                        <h3 class="info-title">Modelo</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $board["model"]["model"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Versão do software</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $board["version"]["version"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Chave de autentcação</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $board["authKey"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Data de registro</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($board["created_at"])); ?></h3>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-middle">
                <div class="list-category-title">
                    <h3 class="list-title">Motores</h3>
                </div>
                <?php if( $board["motors"] ){ ?>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">Lista de motores da placa</p>
                </div>
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th style="font-weight: bolder;">ID</th>
                            <th style="font-weight: bolder;">Utiliza sensor</th>
                            <th style="font-weight: bolder;">Tempo de execução</th>
                            <th style="font-weight: bolder;">Criado em</th>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($board["motors"]) && ( is_array($board["motors"]) || $board["motors"] instanceof Traversable ) && sizeof($board["motors"]) ) foreach( $board["motors"] as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                                <td style="font-weight: bolder;" class="wrap"><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td style="font-weight: bolder;"><?php echo htmlspecialchars( $value1["useSensor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td style="font-weight: bolder;"><?php echo htmlspecialchars( $value1["timeToRun"], ENT_COMPAT, 'UTF-8', FALSE ); ?>s</td>
                                <td><?php echo date('Y-m-d',strtotime($value1["created_at"])); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php }else{ ?>
                    <p class="list-message">Nenhum motor associado a essa placa foi encontrado</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>