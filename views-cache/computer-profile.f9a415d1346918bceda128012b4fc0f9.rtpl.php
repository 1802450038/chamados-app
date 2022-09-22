<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Perfil do Computador</title>
<div class="content-body">
    <div class="entity-profile-card">
        <div class="entity-profile-card-middle card-category">
            <div class="entity-info sub-card-category">
                <div class="row card-category-title">
                    <h3>Computador</h3>
                </div>
                <div class="info-items">
                    <div class="info-box">
                        <h3 class="info-title">Patrimonio</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_patrimony"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Setor</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_sector"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">IP</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_ip"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Nome de usuario</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Matricula de usuario</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_user_registration"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Marca</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_brand"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Processador</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_soc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Memoria</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_mem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>Gb</h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Placa de video</h3>
                        <h3 class="info-value">
                            <?php if( $computer["computer_video_card"] == '1' ){ ?>
                            SIM
                            <?php }else{ ?>
                            NÃO
                            <?php } ?>
                        </h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Placa de rede</h3>
                        <h3 class="info-value">
                            <?php if( $computer["computer_network_card"] == '1' ){ ?>
                            SIM
                            <?php }else{ ?>
                            NÃO
                            <?php } ?>
                        </h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">HDD</h3>
                        <h3 class="info-value">
                            <?php if( $computer["computer_network_card"] == '1' ){ ?>
                            SIM
                            <?php }else{ ?>
                            NÃO
                            <?php } ?>
                        </h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Tipo de disco</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_hd_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Observação</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_note"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Registrado por</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["userRegister"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Estado</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $computer["computer_state"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Data de registro</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($computer["computer_dt_register"])); ?></h3>
                    </div>

                    <div class="info-box">
                        <h3 class="info-title">Data de atualização</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($computer["computer_dt_last_update"])); ?></h3>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-middle">
                <div class="list-category-title">
                    <h3 class="list-title">OS</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">Lista de ordens de serviço</p>
                </div>
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Responsável</th>
                            <th>Defeito</th>
                            <th>Status</th>
                            <th>Data registro</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($os) && ( is_array($os) || $os instanceof Traversable ) && sizeof($os) ) foreach( $os as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                                <td><?php echo htmlspecialchars( $value1["os_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["tec1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["os_defect"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["os_status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["os_dt_register"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                    <a href="/admin/os-computer/profile<?php echo htmlspecialchars( $value1["os_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i class="fas fa-eye"></i></a>
                                    <a href="/admin/os-computer/delete<?php echo htmlspecialchars( $value1["os_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="new-element">
                    <a href=".././os-computer/create<?php echo htmlspecialchars( $computer["computer_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="new-element-button">
                        <button>
                            Incluir novo
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
 
</div>