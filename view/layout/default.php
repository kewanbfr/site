<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo isset($title_for_layout)?$title_for_layout : 'Mon Site'; ?></title>
    <!--<link rel="stylesheet" href="../../webroot/css/bootstrap.min.css">--->
    <link rel="stylesheet" href="http://localhost/bootstrap.min.css">
    <link rel="stylesheet" href="../../webroot/css/style.css">

</head>
<body>

    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">---->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" >
        <a class="navbar-brand" href="<?= BASE_URL ?>">Mon Site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= BASE_URL ?>">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <!--<a class="nav-link" href="<?php //echo Router::url('posts/index'); ?>">Actualités</a>--->
                <!--<a class="nav-link" href="<?php  //echo Router::url('posts/index'); ?>">Actualités</a>-->
                <a class="nav-link" href="<?php echo Router::url('posts'); ?>">Actualités</a>


            </li> 
            <!--<?php /*$pagesMenu = $this->request('Pages', 'getMenu'); ?>
            <?php foreach($pagesMenu as $p): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL.'/pages/view/'.$p->id; ?>" ><?php echo $p->name; ?></a>
                </li>                
            <?php endforeach; ?><?php echo Router::url("posts/view/id:{$v->id}/slug:{$v->slug}") */?>-->

            <?php $pagesMenu = $this->request('Pages', 'getMenu'); ?>
            <?php foreach($pagesMenu as $p): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Router::url("pages/view/id:{$p->id}/slug:{$p->slug}"); ?>" ><?php echo $p->name; ?></a>
                </li>                
            <?php endforeach; ?>

            <?php $ConfMenubase = Conf::$menubase; ?>
            <?php foreach($ConfMenubase as $name=>$url): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL.$url; ?>" ><?php echo $name; ?></a>
                </li>                
            <?php endforeach; ?>

            <?php $ConfMenu = Conf::$menu; ?>
            <?php foreach($ConfMenu as $name=>$url): ?>
                <li class="nav-item">
                    <a class="nav-link" target="<?php echo $url[0]; ?>" href="<?php echo $url[1]; ?>" ><?php echo $name; ?></a>
                </li>                
            <?php endforeach; ?>


            <?php $ConfMenuDeroul = Conf::$menuDeroul; ?>
            <!--<li class="nav-item dropdown"> 
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $ConfMenuDeroul['name']; ?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php foreach($ConfMenuDeroul as $name=>$v): ?>           
                <a class="dropdown-item" target="<?php echo $v[0]; ?>" href="<?php echo $v[1]; ?>"><?php echo $name; ?></a>
                <?php endforeach; ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>--->
            <li class="nav-item">
                <a class="nav-link" href="<?= Router::url('admin/'); ?>">Administration</span></a>
            </li>    
            

      
      

            <!-- Menu déroulant --->
            <!--<li class="nav-item dropdown"> 
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>--->

            <!---  Lien désactivé --->
            <!---<li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>--->
            </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container" style="padding-top:60px;">
        <br>
        <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>
    </div>
    
</body>

    <script type="text/javascript" src="http://localhost/js/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/js/docs.min.js"></script>
    <script type="text/javascript" src="http://localhost/js/bootstrap.bundle.min.js"></script>
</html>