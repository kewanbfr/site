<div class="page-header">
    <h1><?php echo $total; ?> Pages</h1>
    <hr>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $k => $v) :?>
            <tr>
                <td><?= $v->id; ?></td>
                <td><?= $v->name; ?></td>
                <td>
                <a href="<?= Router::url('admin/pages/edit/'.$v->id); ?>">Editer</a>
                <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu');" href="<?= Router::url('admin/posts/delete/'.$v->id); ?>">Supprimer</a>

                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>