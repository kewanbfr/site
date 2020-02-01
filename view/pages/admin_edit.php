<div class="page-header">
    <h1>Editer une page</h1>
    <hr>
</div>
<?php //echo debug($post); ?>
<form class="form" action="<?php echo Router::url('admin/pages/edit/'.$id); ?>" method="POST">
    <?php echo $this->Form->input('name', 'Titre'); ?>
    <?php echo $this->Form->input('slug', 'Url'); ?>
    <?php echo $this->Form->input('id', 'hidden'); ?>

    <?php echo $this->Form->input('content', 'Contenu', array('type' => 'textarea')); ?>
    <?php echo $this->Form->input('draft', 'Brouillon ?', array('type' => 'checkbox') ); ?>
    <?php echo $this->Form->input('online', 'En ligne', array('type' => 'checkbox')); ?>

    <div class="actions">
        <hr class="mb-4">
        <?php echo $this->Form->input('envoyer', 'Publier', array('type' => 'submit', ' class' => 'btn btn-primary btn-lg', ' style' => 'display: block; margin-left: auto; margin-right: auto')); ?>
    </div>

    <script>
    document.getElementById('draft').checked = true;
    document.getElementById('online').checked = false;

    document.getElementById('online').style.display = 'none';
    document.getElementById('onlinelabel').style.display = 'none';
    
    const draft = document.getElementById('draft')

    draft.addEventListener('change', (draftevent) => {
    if (draftevent.target.checked) {

        document.getElementById('online').checked = false;
        document.getElementById('online').style.display = 'none';
        document.getElementById('onlinelabel').style.display = 'none';

    } else {
        document.getElementById('online').checked = true;
        document.getElementById('online').style.display = 'block';
        document.getElementById('onlinelabel').style.display = 'block';


    }
    })

    </script>

</form>