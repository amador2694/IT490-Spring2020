<?php  if (count($errors) > 0) : ?>
  <div class="error">
    <p><strong>Encountered <?php echo count($errors);?> errors while processing your request.<br>
      Please check your input and try again:</strong></p>
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
