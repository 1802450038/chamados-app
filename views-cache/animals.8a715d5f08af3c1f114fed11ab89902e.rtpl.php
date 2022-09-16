<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-body">
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">Animais</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de animais</p>
                </div>
            </div>
            <div class="list-body-middle">
      
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th style="font-weight: bolder;">TAG</th>
                            <th>Espécie</th>
                            <th>Nome</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                             <?php $counter1=-1;  if( isset($animals) && ( is_array($animals) || $animals instanceof Traversable ) && sizeof($animals) ) foreach( $animals as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                                <td style="font-weight: bolder;"><?php echo htmlspecialchars( $value1["tag"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["species"]["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["species"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                    <a href="/admin/animal/update<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn update"><i class="fas fa-pen-to-square"></i></a>
                                    <a href="/admin/animal/delete<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <div class="large-buttons">
                                        <a href="/admin/animal/update<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="action-btn update">Atualizar</a>
                                        <a href="/admin/animal/delete<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="action-btn delete">Excluir</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="new-element">
                    <a href="./animal/create" class="new-element-button">
                        <button>
                            Incluir novo
                        </button>
                    </a>
                </div>
            </div>
            <div class="list-body-bottom">
                <div class="paginator-body">
                    <div class="paginator-items">
                        
                        <div class="paginator-element">
                            <a href="#" class="paginator-target">1</a>
                        </div>
                        <div class="paginator-element">
                            <a href="#" class="paginator-target">2</a>
                        </div>
                        <div class="paginator-element">
                            <a href="#" class="paginator-target">3</a>
                        </div>
                        <div class="paginator-element">
                            <a href="#" class="paginator-target">4</a>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="_js/jquery-3.6.0.min.js"></script>
<script src="_js/index.js"></script>

</html>