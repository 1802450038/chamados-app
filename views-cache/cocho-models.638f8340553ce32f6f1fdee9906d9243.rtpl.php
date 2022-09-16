<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-body">
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">Cochos Modelos</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de modelo de cochos</p>
                </div>
            </div>
            <div class="list-body-middle">
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th style="font-weight: bolder;">Descrição</th>
                            <th style="font-weight: bolder;">Criado em</th>
                        </thead>
                        <tbody>
                             <?php $counter1=-1;  if( isset($cochoModels) && ( is_array($cochoModels) || $cochoModels instanceof Traversable ) && sizeof($cochoModels) ) foreach( $cochoModels as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                                <td style="font-weight: bolder;"><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo getDateForDatabase($value1["created_at"]); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="new-element">
                    <a href="./cochomodel/create" class="new-element-button">
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