<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Perfil do Cocho</title>
<div class="content-body">
    <div class="entity-profile-card">
        <div class="entity-profile-card-middle card-category">
            <div class="entity-info sub-card-category">
                <div class="row card-category-title">
                    <h3>Cocho</h3>
                </div>
                <div class="info-items">
                    <div class="info-box">
                        <h3 class="info-title">Identificador</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $cocho["model"]["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>

                    <div class="info-box">
                        <h3 class="info-title">Data de registro</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($cocho["created_at"])); ?></h3>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-middle">
                <div class="list-category-title">
                    <h3 class="list-title">Placas</h3>
                </div>
                <?php if( $cocho["boards"] ){ ?>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de placas do cocho</p>
                </div>
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th style="font-weight: bolder;">Identificador</th>
                            <th style="font-weight: bolder;">Versão do software</th>
                            <th style="font-weight: bolder;">Criado em</th>
                            <th style="font-weight: bolder;">Ação</th>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($cocho["boards"]) && ( is_array($cocho["boards"]) || $cocho["boards"] instanceof Traversable ) && sizeof($cocho["boards"]) ) foreach( $cocho["boards"] as $key1 => $value1 ){ $counter1++; ?>
                            
                            <tr>
                                <td style="font-weight: bolder;"><?php echo htmlspecialchars( $value1["model"]["model"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td style="font-weight: bolder;"><?php echo htmlspecialchars( $value1["version"]["version"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo date('Y-m-d',strtotime($value1["created_at"])); ?></td>
                                <td>
                                    <a href="/admin/board/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i
                                            class="fas fa-eye"></i></a>
                                    <div class="large-buttons">
                                        <a href="/admin/board/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="action-btn view">Visulizar</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php }else{ ?>
                        <p class="list-message">Nenhuma placa associada a esse cocho foi encontrada</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>