<div class="page-header">
    <h1>Editer un article</h1>
    <hr>
</div>
<?php //echo debug($post); ?>
<form class="form" action="<?php echo Router::url('admin/posts/edit/'.$id); ?>" method="POST">

      


    <?php echo $this->Form->input('name', 'Titre'); ?>
    <?php echo $this->Form->input('slug', 'Url') ?>
    <?php echo $this->Form->input('id', 'hidden'); ?>

    


    <?php echo $this->Form->input('content', 'Contenu', array('type' => 'textarea'), array('class' => 'wysiwyg')); ?>
    <?php //echo $this->Form->input('content', 'Contenu', array('type' => 'textarea', ' rows'=>5, ' cols'=>10)); ?>
    <?php echo $this->Form->input('draft', 'Brouillon ?', array('type' => 'checkbox') ); ?>
    <?php echo $this->Form->input('online', 'En ligne', array('type' => 'checkbox') ); ?>
    <?php echo $this->Form->input('publicated', 'Publication programmée'); ?>

    <?php //echo $this->Form->input('online2', 'En ligne2', array('type' => 'checkbox')); ?>


    <div class="actions">
        <hr class="mb-4">
        <?php echo $this->Form->input('envoyer', 'Envoyer', array('type' => 'submit', ' class' => 'btn btn-primary btn-lg', ' style' => 'display: block; margin-left: auto; margin-right: auto')); ?>
    </div>
    <script>
    //document.getElementById('draft').checked = true;
    document.getElementById('online').checked = true;
    document.getElementById('online').style.display = 'none';
    document.getElementById('onlinelabel').style.display = 'none';

    document.getElementById('inputpublicated').style.display = 'none';
    document.getElementById('inputpublicatedlabel').style.display = 'none';
    document.getElementById('online').checked = false;

    
    const draft = document.getElementById('draft')

    draft.addEventListener('change', (draftevent) => {
    if (draftevent.target.checked) {

        document.getElementById('online').checked = false;
        document.getElementById('online').style.display = 'none';
        document.getElementById('onlinelabel').style.display = 'none';

        document.getElementById('inputpublicated').style.display = 'none';

        document.getElementById('inputpublicatedlabel').style.display = 'none';

    } else {
        document.getElementById('online').checked = true;
        document.getElementById('online').style.display = 'block';
        document.getElementById('onlinelabel').style.display = 'block';


    }
    })

    //var valuePublicated = <?php //echo json_encode($this->controller->request->data->publicated)?>;
    //alert(valuePublicated);
    if (document.getElementById('online').checked == true) {


    document.getElementById('inputpublicated').style.display = 'none';
    document.getElementById('inputpublicatedlabel').style.display = 'none';

    } else {
    document.getElementById('inputpublicated').style.display = 'block';
    if(document.getElementById('inputpublicated').value == ''){
        document.getElementById('inputpublicated').value = 'aucune';
        document.getElementById('inputpublicated').type = 'text';

    }else {
        document.getElementById('inputpublicated').type = 'date';

    }
    document.getElementById('inputpublicatedlabel').style.display = 'block';

    }
    const checkbox = document.getElementById('online')

    checkbox.addEventListener('change', (event) => {
    if (event.target.checked) {

        document.getElementById('draft').checked = false;

        document.getElementById('inputpublicated').style.display = 'none';
        document.getElementById('inputpublicatedlabel').style.display = 'none';

    } else {
        document.getElementById('inputpublicated').style.display = 'block';
        if(document.getElementById('inputpublicated').value == ''){
            document.getElementById('inputpublicated').value = 'aucune';
            document.getElementById('inputpublicated').type = 'text';

        }else {
            document.getElementById('inputpublicated').type = 'date';

        }
        document.getElementById('inputpublicatedlabel').style.display = 'block';

    }
    })

    const number = document.getElementById('inputpublicated')

    number.addEventListener('focus', (numberevent) => {
    if (numberevent.target.focus) {
        document.getElementById('inputpublicated').type = 'date';


    } else {
        
    }
    })  
    </script>

</form>