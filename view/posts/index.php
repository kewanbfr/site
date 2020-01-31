<!---<div class="hero-unit">
    <h1>Bienvenue</h1>
    <p>C'est la page d'accueil !</p>
</div>--->
<?php $title_for_layout = 'Actualitées - Mon site'; ?>
<div class="page-header">
    <h1>Actualitées du blog</h1>
    <hr>
</div>
<?php //debug($posts);
 foreach($posts as $k => $v): ?>
        <h2><?php echo $v->name; ?></h2>
        <?php echo $v->content; ?><br />
        <!--<p><a href="<?php //echo BASE_URL.'/posts/view/'.$v->id ?>">Lire la suite &rarr;</a></p>--->
        <p><a href="<?php echo Router::url("posts/view/id:{$v->id}/slug:{$v->slug}") ?>">Lire la suite &rarr;</a></p>

<?php endforeach; ?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
  <?php for($i=1; $i <= $page; $i++): ?>
    <!--<li class="page-item"><a class="page-link" href="#">&larr; Previous</a></li>-->
    <li class="page-item <?php if($i==$this->request->page) echo 'active'; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php endfor; ?>
    <!--<li class="page-item"><a class="page-link" href="#">Next &rarr;</a></li>-->
  </ul>
</nav>