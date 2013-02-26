<div id="topbar">
    <nav class="m-btn-strip">

        <div class="m-btn-group">
            <a href="index.php" class="m-btn noMargin black"><i class="m-icon-swapleft m-icon-white"></i> INICIO</a>
        </div>

        <div class="m-btn-group">
            <a href="createTicket.php" class="m-btn noMargin black"><i class="icon-white icon-tag"></i> Crear Cupón</a>
            <a href="receiveTicket.php" class="m-btn noMargin black"><i class="icon-white icon-retweet"></i> Canjear Cupón</a>
        </div>
        <div class="m-btn-group">
            <a href="premios.php" class="m-btn noMargin black"><i class="icon-white icon-star"></i> Premios</a>
            <a href="titulos.php" class="m-btn noMargin black"><i class="icon-white icon-bookmark"></i> Títulos</a>
            <a href="sabores.php" class="m-btn noMargin black"><i class="icon-white icon-heart"></i> Sabores</a>
            <a href="cupones.php" class="m-btn noMargin black"><i class="icon-white icon-tag"></i> Cupones</a>
        </div>

        <!--User Menu-->
        <div class="m-btn-group" style="float: right;">
            <a class="m-btn noMargin blue dropdown-carettoggle" data-toggle="dropdown" href="#">
                <i class="icon-cog icon-white"></i> <?=$username;?><span class="caret white"></span>
            </a>
            <ul class="m-dropdown-menu align-right">
                <li><a href="usuarios.php"><i class="icon-edit"></i> Administrar Usuarios</a></li>
                <li class="divider"></li>
                <li><a href="login.php?logout=true"><i class="icon-off"></i> Salir</a></li>
            </ul>
        </div>

    </nav>
    <div class="clr"></div>
</div>