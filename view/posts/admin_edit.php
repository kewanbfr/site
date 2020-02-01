<div class="page-header">
    <h1>Editer un article</h1>
    <hr>
</div>
<?php //echo debug($post); ?>
<form class="form" action="<?php echo Router::url('admin/posts/edit/'.$id); ?>" method="POST">

      


    <?php echo $this->Form->input('name', 'Titre'); ?>
    <?php echo $this->Form->input('slug', 'Url') ?>
    <?php echo $this->Form->input('id', 'hidden'); ?>

    <?php echo $this->Form->input('content', 'Contenu', array('type' => 'textarea')); ?>
    <?php //echo $this->Form->input('content', 'Contenu', array('type' => 'textarea', ' rows'=>5, ' cols'=>10)); ?>
    <?php echo $this->Form->input('online', 'En ligne', array('type' => 'checkbox')); ?>

    <div class="actions">
        <hr class="mb-4">
        <?php echo $this->Form->input('envoyer', 'Envoyer', array('type' => 'submit', ' class' => 'btn btn-primary btn-lg', ' style' => 'display: block; margin-left: auto; margin-right: auto')); ?>
    </div>


</form>