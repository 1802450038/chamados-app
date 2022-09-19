<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Chamados</title>
<div class="content-body">
    <div class="list-body">
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
                            <th>Setor</th>
                            <th>Problema</th>
                            <th>Status</th>
                            <th>Hora</th>
                            <th>Data</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12415</td>
                                <td>SEMUDE</td>
                                <td><a href="/admin/call/accept" class="small-action-btn done">Aceitar <i class="fas fa-check"></i></a></td>
                                <td>12:30</td>
                                <td>07/12/1996</td>
                                <td>
                                    <a href="/admin/call/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <a href="/admin/call/update" class="small-action-btn update"><i class="fas fa-pen-to-square"></i></a>
                                    <a href="/admin/call/view" class="small-action-btn view"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>12415</td>
                                <td>SEMUDE</td>
                                <td>AC - Gabriel Bellagamba</td>
                                <td>12:30</td>
                                <td>07/12/1996</td>
                                <td>
                                    <a href="/admin/call/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <a href="/admin/call/update" class="small-action-btn update"><i class="fas fa-pen-to-square"></i></a>
                                    <a href="/admin/call/view" class="small-action-btn view"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>12415</td>
                                <td>SEMUDE</td>
                                <td>Concluido</td>
                                <td>12:30</td>
                                <td>07/12/1996</td>
                                <td>
                                    <a href="/admin/call/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <a href="/admin/call/update" class="small-action-btn update"><i class="fas fa-pen-to-square"></i></a>
                                    <a href="/admin/call/view" class="small-action-btn view"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>12415</td>
                                <td>SEMUDE</td>
                                <td>Atrasado</td>
                                <td>12:30</td>
                                <td>07/12/1996</td>
                                <td>
                                    <a href="/admin/call/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <a href="/admin/call/update" class="small-action-btn update"><i class="fas fa-pen-to-square"></i></a>
                                    <a href="/admin/call/view" class="small-action-btn view"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
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

<script src="_js/jquery-3.6.0.min.js"></script>
<script src="_js/index.js"></script>

</html>