<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Perfil do Usuario</title>
<div class="content-body">
    <div class="entity-profile-card">
        <div class="entity-profile-card-middle card-category">
            <div class="entity-info sub-card-category">
                <div class="row card-category-title">
                    <h3>Usuario</h3>
                </div>
                <div class="info-items">
                    <div class="info-box">
                        <h3 class="info-title">Nome</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $user["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Email</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $user["user_email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Login</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $user["user_login"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Tipo</h3>
                        <h3 class="info-value"><?php echo htmlspecialchars( $user["user_type"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Admin</h3>
                        <h3 class="info-value">
                            <?php if( $user["user_is_admin"] == '1' ){ ?>

                            SIM
                            <?php }else{ ?>

                            NÃO
                            <?php } ?>

                        </h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Data de registro</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($user["user_dt_register"])); ?></h3>
                    </div>

                    <div class="info-box">
                        <h3 class="info-title">Data de atualização</h3>
                        <h3 class="info-value"><?php echo date('Y-m-d',strtotime($user["user_dt_last_update"])); ?></h3>
                    </div>
                    <div class="info-box">
                        <h3 class="info-title">Alterar Senha</h3>
                        <a class="info-link" href="/admin/user/password-change<?php echo htmlspecialchars( $user["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Atualizar</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-middle">
                <div class="list-category-title">
                    <h3 class="list-title">Atribuições</h3>
                </div>
                <?php if( $calls ){ ?>

                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de chamados do usuario</p>
                </div>
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Setor</th>
                            <th>Departamento</th>
                            <th>Problema</th>
                            <th>Status</th>
                            <th>Hora</th>
                            <th>Data</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($calls) && ( is_array($calls) || $calls instanceof Traversable ) && sizeof($calls) ) foreach( $calls as $key1 => $value1 ){ $counter1++; ?>

                            <tr>
                                <td><?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["call_sector"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["call_departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["call_issue"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>

                                <?php if( $value1["call_status"] == 'CONCLUIDO' ){ ?>

                                <td>
                                    <div class="small-action-btn confirm">Concluido</div>
                                </td>
                                <?php }else{ ?>

                                    <?php if( $value1["user_name"] ){ ?>


                                        <?php if( $value1["user_one_id"] == $user_id ){ ?>

                                        <td><a href="/admin/user/call<?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/decline<?php echo htmlspecialchars( $user_id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                                onclick="return confirm('Deseja realmente cancelar a inscrição?')"
                                                class="small-action-btn delete">Cancelar</a></td>
                                        <?php }else{ ?>

                                        <td><button class="small-action-btn view"><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i class="fas fa-check">
                                                </i></button></td>
                                        <?php } ?>


                                    <?php }else{ ?>

                                    <td><a href="/admin/call<?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/accept<?php echo htmlspecialchars( $user, ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                            onclick="return confirm('Deseja realmente aceitar essa solicitação?')"
                                            class="small-action-btn done">Aceitar</a></td>
                                    <?php } ?>


                                <?php } ?>


                                <td><?php echo date('H:m',strtotime($value1["call_dt_register"])); ?></td>
                                <td><?php echo date('d/m/y',strtotime($value1["call_dt_register"])); ?></td>

                                <td>
                                    <?php if( !$value1["call_status"] == 'CONCLUIDO' ){ ?>

                                        <?php if( $value1["user_one_id"] == $user_id ){ ?>

                                        <a href="/admin/call<?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/done<?php echo htmlspecialchars( $user_id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                            onclick="return confirm('Deseja realmente finalizar este chamado ?')"
                                            class="small-action-btn confirm"><i class="fas fa-check"></i></a>
                                        <?php } ?>

                                    <?php } ?>

                                    <a href="/admin/call/view<?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i
                                            class="fas fa-eye"></i></a>
                                    <?php if( $value1["user_one_id"] == $user_id ){ ?>

                                    <a href="/admin/call/update<?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn update"><i
                                            class="fas fa-pen-to-square"></i></a>
                                    <?php } ?>

                                </td>

                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <?php }else{ ?>

                <p class="list-message">Nenhum chamado encontrado</p>
                <?php } ?>

                <?php if( $os ){ ?>

                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de ordem de serviço do usuario</p>
                </div>
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th style="font-weight: bolder;">ID</th>
                            <th >Patrimonio</th>
                            <th >Responsavel</th>
                            <th >Defeito</th>
                            <th >Status</th>
                            <th >Data registro</th>
                            <th >Ações</th>

                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($os) && ( is_array($os) || $os instanceof Traversable ) && sizeof($os) ) foreach( $os as $key1 => $value1 ){ $counter1++; ?>


                            <tr>
                                <td style="font-weight: bolder;"><?php echo htmlspecialchars( $value1["os_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td ><?php echo htmlspecialchars( $value1["computer_patrimony"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td ><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td ><?php echo htmlspecialchars( $value1["os_defect"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td ><?php echo htmlspecialchars( $value1["os_status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo date('Y-m-d',strtotime($value1["os_dt_register"])); ?></td>
                                <td>
                                    <a href="/admin/os-computer/profile<?php echo htmlspecialchars( $value1["os_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i
                                            class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <?php }else{ ?>

                <p class="list-message">Nenhuma ordem de serviço encontrada</p>
                <?php } ?>

            </div>
        </div>
    </div>

</div>