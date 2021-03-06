<div class="page-header">
    <h1><?php echo $total; ?> Articles</h1>
    <hr>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>En ligne ?</th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $k => $v) :?>
            <tr>
                <td><?= $v->id; ?></td>
                <?php $color = 'danger'; if($v->online == 1){ $color = 'success'; }elseif ($v->online == 2) { $color = 'primary'; }else { $color == 'danger';} ?>
                <?php $name = 'Hors Ligne'; if($v->online == 1){ $name = 'En ligne'; }elseif ($v->online == 2) { $name = 'Publication programmée le : '.$v->publicated; }elseif($v->draft == 1) { $name == 'Brouillon';}else {$name == 'Hors ligne';} ?>

                <!--<td><span class="badge badge-<?php /*echo ($v->online == 1)?'success':'danger'; ?>"><a onclick="return confirm('Voulez vous vraiment Passer ce contenu <?php echo ($v->online == 1)?'Hors ligne':'En ligne'; ?> ?');" href="<?= Router::url('admin/posts/online/'.$v->id); ?>"><?php echo ($v->online == 1)?'En ligne':'Hors ligne';*/ ?>/a></span></td>--->
                <td><span class="badge badge-<?php echo $color; ?>"><?php echo $name; ?></span></td>

                <td><?= $v->name; ?></td>
                <td>
                <a target="_blank" href="<?php echo Router::url("posts/view/id:{$v->id}/slug:{$v->slug}"); ?>">Voir</a>&nbsp;|
                <!--<a href="<?= Router::url('admin/posts/edit/'.$v->id); ?>">Voir</a>--->

                <a href="<?= Router::url('admin/posts/edit/'.$v->id); ?>">Editer</a>&nbsp;|
                <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu');" href="<?= Router::url('admin/posts/delete/'.$v->id); ?>">Supprimer</a>
                
                

                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<button href="<?php echo Router::url('admin/posts/edit'); ?>" type="button" class="btn">Ajouter un article</button>

