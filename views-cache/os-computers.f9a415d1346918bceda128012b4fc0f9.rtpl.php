<?php if(!class_exists('Rain\Tpl')){exit;}?><title>OS Computadores</title>
<div class="content-body">
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">OS Computadores</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de ordem de serviço dos computadores</p>
                </div>
            </div>
            <div class="list-body-middle">
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Patrimonio</th>
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
                                <td><?php echo htmlspecialchars( $value1["computer_patrimony"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["tec1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["os_defect"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["os_status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["os_dt_register"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                    <?php if( $value1["user_technical_one_id"] == $user_id ){ ?>
                                    <a href="/admin/os-computer/delete<?php echo htmlspecialchars( $value1["os_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <?php } ?>
                                    <a href="/admin/os-computer/update<?php echo htmlspecialchars( $value1["os_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn update"><i class="fas fa-pen-to-square"></i></a>
                                    <a href="/admin/os-computer/profile<?php echo htmlspecialchars( $value1["os_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="new-element">
                    <a href="./os-computer/create" class="new-element-button">
                        <button>
                            Incluir novo
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="_js/jquery-3.6.0.min.js"></script>
<script src="_js/index.js"></script>

</html>