<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Chamados</title>

<div class="content-body">
    <div class="list-body" style="margin-top: -20px;">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">Chamados</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de chamados</p>
                </div>
            </div>
            <div class="list-body-middle">
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
                                <?php if( $value1["user_name"] ){ ?>

                                <?php if( $value1["user_one_id"] == $user ){ ?>

                                <td><a href="/admin/call<?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/decline"
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

                                <td><?php echo date('H:m',strtotime($value1["call_dt_register"])); ?></td>
                                <td><?php echo date('d/m/y',strtotime($value1["call_dt_register"])); ?></td>
                                <td>
                                    <?php if( $value1["user_one_id"] == 0 ){ ?>

                                    <a href="/admin/call/delete<?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"
                                        onclick="return confirm('Deseja realmente excluir este registro?')"
                                        class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <?php } ?>


                                    <?php if( $value1["user_one_id"] == 0 ){ ?>

                                    <a href="/admin/call/update<?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn update"><i
                                            class="fas fa-pen-to-square"></i></a>
                                    <?php } ?>

                                    <a href="/admin/call/view<?php echo htmlspecialchars( $value1["call_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i
                                            class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <div class="new-element">
                    <a href="./call/create" class="new-element-button">
                        <button>
                            Incluir novo
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


</html>