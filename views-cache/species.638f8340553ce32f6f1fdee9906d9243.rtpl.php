<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Espécies</title>
<div class="content-body">
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">Espécies</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de especies</p>
                </div>
            </div>
            <div class="list-body-middle">
      
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th>Tipo</th>
                            <th>Observação</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($species) && ( is_array($species) || $species instanceof Traversable ) && sizeof($species) ) foreach( $species as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                                <td><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                    <a href="/admin/specie/delete<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <div class="large-buttons">
                                        <a href="/admin/specie/delete<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="action-btn delete">Excluir</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                  
                            
                        </tbody>
                    </table>
                </div>
                <div class="new-element">
                    <a href="./specie/create" class="new-element-button">
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