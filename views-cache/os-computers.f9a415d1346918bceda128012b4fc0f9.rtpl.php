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
                            <th>Patrimonio</th>
                            <th>Setor</th>
                            <th>Responsável</th>
                            <th>Situação</th>
                            <th>Data registro</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12415</td>
                                <td>SEMUDE</td>
                                <td>Gabriel Bellagamba</td>
                                <td>EM MANUTENÇÃO</td>
                                <td>07/12/1996</td>
                                <td>
                                    <a href="/admin/os-computer/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <a href="/admin/os-computer/update" class="small-action-btn update"><i class="fas fa-pen-to-square"></i></a>
                                    <a href="/admin/os-computer/profile" class="small-action-btn view"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            
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