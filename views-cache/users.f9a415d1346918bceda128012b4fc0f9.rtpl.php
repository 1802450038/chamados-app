<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Usuarios</title>
<div class="content-body">
    <div class="list-body">
        <div class="list-body-content">
            <div class="list-body-top">
                <div class="list-category-title">
                    <h3 class="list-title">Usuarios</h3>
                </div>
                <div class="list-category-sub-title">
                    <p class="list-sub-title">lista de usuarios</p>
                </div>
            </div>
            <div class="list-body-middle">
                <div class="list-table-body">
                    <table>
                        <thead>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gabriel</td>
                                <td>Gabriel.chaus@gmail.com</td>
                                <td>
                                    <a href="/admin/user/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="small-action-btn delete"><i class="fas fa-trash-can"></i></a>
                                    <a href="/admin/user/update" class="small-action-btn update"><i class="fas fa-trash-can"></i></a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="new-element">
                    <a href="./user/create" class="new-element-button">
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