<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo isset($title_for_layout)?$title_for_layout : 'Administration'; ?></title>
    <!--<link rel="stylesheet" href="../../webroot/css/bootstrap.min.css">--->
    <link rel="stylesheet" href="http://localhost/bootstrap.min.css">
    <link rel="stylesheet" href="../../webroot/css/style.css">

</head>
<body>

    <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">---->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <a class="navbar-brand" href="<?= Router::url('admin/posts/index'); ?>">Administration</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            
            <li class="nav-item active">
                <a class="nav-link" href="<?= BASE_URL; ?>">Accueil</span></a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="<?= Router::url('admin/posts/index'); ?>">Articles</span></a>
            </li>    
            <li class="nav-item">
                <a class="nav-link" href="<?= Router::url('admin/pages/index'); ?>">Pages</span></a>
            </li>           

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