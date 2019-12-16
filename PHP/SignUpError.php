<?php if(strcmp($confirmPassword,$password)!=0) : ?>
<div class="error">
            <p id="passwordError"><?php echo "Passwords must match" ?></p>
</div>
<?php endif ?>