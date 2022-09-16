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
                            <th>Data registro</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12415</td>
                                <td>SEMUDE</td>
                                <td>07/12/1996</td>
                                <td>
                                    <a href="/admin/computer/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <a href="/admin/computer/update" class="small-action-btn update"><i class="fas fa-trash-can"></i></a>
                                </td>
                            </tr>
                            
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