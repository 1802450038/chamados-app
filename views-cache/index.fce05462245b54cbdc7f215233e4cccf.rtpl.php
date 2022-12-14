<?php if(!class_exists('Rain\Tpl')){exit;}?><title>Inicio</title>
<div class="content-body">

    <div class="cards-body">
        <div class="card-body">
            <div class="card-bg"></div>
            <div class="card-content">
                <div class="card-ico"><span><i class="fas fa-phone-volume"></i></span></div>
                <div class="card-title">
                    <h3>Chamados</h3>
                </div>
                <div class="card-middle">
                    <p>Gerenciar Chamados</p>
                </div>
                <div class="card-bottom"><a class="card-buttom" href="admin/calls">Gerenciar</a></div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-bg"></div>
            <div class="card-content">
                <div class="card-ico"><span><i class="fas fa-desktop"></i></span></div>
                <div class="card-title">
                    <h3>Computadores</h3>
                </div>
                <div class="card-middle">
                    <p>Gerenciar Computadores</p>
                </div>
                <div class="card-bottom"><a class="card-buttom" href="admin/computers">Gerenciar</a></div>
            </div>
        </div>      
        <div class="card-body">
            <div class="card-bg"></div>
            <div class="card-content">
                <div class="card-ico"><span><i class="fas fa-list-check"></i></span></div>
                <div class="card-title">
                    <h3>OS Computadores</h3>
                </div>
                <div class="card-middle">
                    <p>Gerenciar OS Computadores</p>
                </div>
                <div class="card-bottom"><a class="card-buttom" href="admin/os-computers">Gerenciar</a></div>
            </div>
        </div>

        <?php if( $is_admin == 1 ){ ?>

        <div class="card-body">
            <div class="card-bg"></div>
            <div class="card-content">
                <div class="card-ico"><span><i class="fas fa-users"></i></span></div>
                <div class="card-title">
                    <h3>Usuarios</h3>
                </div>
                <div class="card-middle">
                    <p>Gerenciar Usuarios</p>
                </div>
                <div class="card-bottom"><a class="card-buttom" href="admin/users">Gerenciar</a></div>
            </div>
        </div>
        <?php } ?>


       
        <div class="card-body">
            <div class="card-bg"></div>
            <div class="card-content">
                <div class="card-ico"><span><i class="fas fa-user"></i></span></div>
                <div class="card-title">
                    <h3>Meu perfil</h3>
                </div>
                <div class="card-middle">
                    <p><?php echo htmlspecialchars( $user_name, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                </div>
                <div class="card-bottom"><a class="card-buttom" href="admin/user/profile<?php echo htmlspecialchars( $user_id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Gerenciar</a></div>
            </div>
        </div>


        <div class="card-body">
            <div class="card-bg"></div>
            <div class="card-content">
                <div class="card-ico"><span><i class="fas fa-barcode"></i></span></div>
                <div class="card-title">
                    <h3>Buscar Computador</h3>
                </div>
                <div class="card-middle">
                    <p>Buscar PC pelo Patrimonio</p>
                </div>
                <div class="card-bottom"><a class="card-buttom" href="admin/computer/barcode">Buscar</a></div>
            </div>
        </div>

        <div class="card-body">
            <div class="card-bg"></div>
            <div class="card-content">
                <div class="card-ico"><span><i class="fas fa-clock"></i></span></div>
                <div class="card-title">
                    <h3>Logs</h3>
                </div>
                <div class="card-middle">
                    <p>Gerenciar Registros</p>
                </div>
                <div class="card-bottom"><a class="card-buttom" href="admin/logs">Gerenciar</a></div>
            </div>
        </div>

        <div class="card-body">
            <div class="card-bg"></div>
            <div class="card-content">
                <div class="card-ico"><span><i class="fas fa-door-open"></i></span></div>
                <div class="card-title">
                    <h3>Sair</h3>
                </div>
                <div class="card-middle">
                    <p>Sair</p>
                </div>
                <div class="card-bottom"><a class="card-buttom" href="/logout">Sair</a></div>
            </div>
        </div>
    
    </div>

</div>