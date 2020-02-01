<div class="page-header">
    <h1><?php echo $total; ?> Pages</h1>
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
                <td><span class="badge badge-<?php echo ($v->online == 1)?'success':'danger'; ?>"><?php echo ($v->online == 1)?'En ligne':'Hors ligne'; ?></span></td>
                <td><?= $v->name; ?></td>
                <td>
                <a target="_blank" href="<?php echo Router::url("pages/view/id:{$v->id}/slug:{$v->slug}"); ?>">Voir<a>&nbsp;|
                <!--<a href="<?= Router::url('admin/pages/edit/'.$v->id); ?>">Voir</a>--->

                <a href="<?= Router::url('admin/pages/edit/'.$v->id); ?>">Editer</a>&nbsp;|
                <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu');" href="<?= Router::url('admin/posts/delete/'.$v->id); ?>">Supprimer</a>

                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<a href="<?php echo Router::url('admin/pages/edit'); ?>" class="btn btn-primary">Ajouter un article</a>
