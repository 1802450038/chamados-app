<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Cochos</title>
<div class="content-body">
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">Cochos</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de cochos</p>
                </div>
            </div>
            <div class="list-body-middle">
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th style="font-weight: bolder;">Identificador</th>
                            <th style="font-weight: bolder;">Modelo de placa</th>
                            <th style="font-weight: bolder;">Criado em</th>
                            <th style="font-weight: bolder;">Ações</th>
                        </thead>
                        <tbody>
                            <?php $counter1=-1;  if( isset($cocho) && ( is_array($cocho) || $cocho instanceof Traversable ) && sizeof($cocho) ) foreach( $cocho as $key1 => $value1 ){ $counter1++; ?>
                            <tr>
                                <td style="font-weight: bolder;"><?php echo htmlspecialchars( $value1["model"]["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td style="font-weight: bolder;">
                                    <?php if( isset($value1["boards"]["0"]) ){ ?>
                                    <?php echo htmlspecialchars( $value1["boards"]["0"]["model"]["model"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                    <?php }else{ ?>
                                    Nenhum modelo registrado ainda
                                    <?php } ?>
                                </td>
                                <td><?php echo date('Y-m-d',strtotime($value1["created_at"])); ?></td>
                                <td>
                                    <a href="/admin/cocho/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-action-btn view"><i
                                            class="fas fa-eye"></i></a>
                                    <div class="large-buttons">
                                        <a href="/admin/cocho/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="action-btn view">Visulizar</a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="new-element">
                    <div class="new-element" style="margin-top:40px ;">
                        <a href="./cocho/create">
                            <button>
                                Incluir novo
                            </button>
                        </a>
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