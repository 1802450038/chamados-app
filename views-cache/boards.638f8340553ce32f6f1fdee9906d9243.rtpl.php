<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Placas</title>
<div class="content-body">
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">Placas</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de placas</p>
                </div>
            </div>
            <div class="list-body-middle">
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th >Modelo</th>
                            <th >Cocho</th>
                            <th >Software</th>
                            <th >Ações</th>
                        </thead>
                        <tbody>
                             <?php $counter1=-1;  if( isset($boards) && ( is_array($boards) || $boards instanceof Traversable ) && sizeof($boards) ) foreach( $boards as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                                <td ><?php echo htmlspecialchars( $value1["model"]["model"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["cocho"]["model"]["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td ><?php echo htmlspecialchars( $value1["version"]["version"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                    <a href="/admin/board/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i class="fas fa-eye"></i></a>
                                    <div class="large-buttons">
                                        <a href="/admin/board/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="action-btn view">Visulizar</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="new-element" style="margin-top:40px ;">
                    <a href="./board/create" class="new-element-button">
                        <button>
                            Incluir novo
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="_js/jquery-3.6.0.min.js"></script>
<script src="_js/index.js"></script>

</html>