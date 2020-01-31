<!---<div class="hero-unit">
    <h1>Bienvenue</h1>
    <p>C'est la page d'accueil !</p>
</div>--->
<?php $title_for_layout = $page->name; ?>
<div class="hero-unit">
    <h1><?php echo $page->name; ?></h1>
    <?php echo $page->content; ?>
</div>
