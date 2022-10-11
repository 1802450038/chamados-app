<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Logs</title>

<div class="content-body">
    <div class="list-body" style="margin-top: -20px;">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">Logs</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de registros</p>
                </div>
            </div>
            <div class="list-body-middle">
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Operação</th>
                            <th>Entidade</th>
                            <th>Hora</th>
                            <th>Data</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($logs) && ( is_array($logs) || $logs instanceof Traversable ) && sizeof($logs) ) foreach( $logs as $key1 => $value1 ){ $counter1++; ?>

                            <tr>
                                <td><?php echo htmlspecialchars( $value1["log_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["user_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["log_operation"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["log_entity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo date('H:m',strtotime($value1["log_dt_register"])); ?></td>
                                <td><?php echo date('d/m/y',strtotime($value1["log_dt_register"])); ?></td>
                                <td>
                                    <a href="/admin/log/view<?php echo htmlspecialchars( $value1["log_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i
                                            class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</html>