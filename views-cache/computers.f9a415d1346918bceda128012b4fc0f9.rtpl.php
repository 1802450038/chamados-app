<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Computadores</title>
<div class="content-body">
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">Computadores</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de computadores</p>
                </div>
            </div>
            <div class="list-body-middle">
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th>Patrimonio</th>
                            <th>Setor</th>
                            <th>Estado</th>
                            <th>Data registro</th>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($computers) && ( is_array($computers) || $computers instanceof Traversable ) && sizeof($computers) ) foreach( $computers as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                                <td><?php echo htmlspecialchars( $value1["computer_patrimony"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["computer_sector"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["computer_state"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["computer_dt_register"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                    <a href="/admin/computer/delete<?php echo htmlspecialchars( $value1["computer_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <a href="/admin/computer/update<?php echo htmlspecialchars( $value1["computer_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn update"><i class="fas fa-pen-to-square"></i></a>
                                    <a href="/admin/computer/profile<?php echo htmlspecialchars( $value1["computer_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
                <div class="new-element">
                    <a href="./computer/create" class="new-element-button">
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