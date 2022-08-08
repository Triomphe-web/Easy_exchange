<div class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <nav class="col navbar navbar-expand-lg navbar-light">
                <div class="img col-5 col-lg-2">
                    <a href="index.php"><img id="logo" src="img/logo.webp" alt="logo" class="navbar-brand"></a>
                </div>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarContent" class="collapse navbar-collapse col-lg-10">
                    <div class="input-group" style="margin-right: 10px;">
                        <input type="text" class="form-control col-12" placeholder="Chercher un item">
                        <div class="input-group-append">
                            <button class="btn btn-warning">
                                <img id="search" src="img/icons8-search-30.png" alt="search">
                                
                            </button>
                        </div>
                    </div>

                    <div class="btn" style="padding-left: 0;">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>
                                    <img src="img/user.png" alt="user" style="width: 24px; height: 24px;"> 
                                    <?php if ((isset($_SESSION['nom']) && !empty($_SESSION['nom']))) {
                                        echo $_SESSION['nom'];
                                    }?>
                                </span>
                            </button>
                            <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton" style="right: 0; left:auto;">
                                <a class="dropdown-item text-primary" href="profils.php"><img src="img/profil.png" alt="logout" width="24" height="24">
                                    Profil
                                    <?php if ((isset($value)) || (!empty($value))) { ?>   
                                        <span class="badge badge-danger">1</span>
                                    <?php }?>
                                </a>

                                <a href="#" class="dropdown-item text-warning"><img src="img/panier.png" alt="panier" width="24" height="24"> Panier</a>
                                <a class="dropdown-item text-danger" href="logOut.php"><img src="img/logout.png" alt="logout" width="24" height="24"> Deconnecter</a>
                            </div>
                        </div>
                    </div>


                </div>
            </nav>
        </div>
    </div>
</div>