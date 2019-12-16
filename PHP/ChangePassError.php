<?php if(isset($noMatch)) : ?>
<div class="error">
            <p id="passwordError"><?php echo "Passwords do not match" ?></p>
</div>
<?php endif ?>
<?php if(isset($wrongPass)) : ?>
<div class="error">
            <p id="passwordError"><?php echo "Incorrect password" ?></p>
</div>
<?php endif ?>  