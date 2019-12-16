<?php if(isset($passError)) : ?>
<div class="error">
            <p id="passwordError"><?php echo "Incorrect Password" ?></p>
</div>
<?php endif ?>
<?php if(isset($userError)) : ?>
<div class="error">
            <p id="passwordError"><?php echo "User does not exist" ?></p>
</div>
<?php endif ?>  