<?php if (count($errors) > 0) : ?>

<div class="alert alert-danger" onclick="this.style.display='none'">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php foreach ($errors as $error) : ?>
    <p><?php echo $error; ?></p>
    <?php endforeach ?>
</div>

<?php endif ?> 