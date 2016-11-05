<div class="container">
<h4>Client login</h4>
<div id="form-center" >
    <form method="POST" action="." >
        <input class="" type="hidden" name="action" value="login" />
        
        <div class="row">
        <div class="input-field col s3">
        <input class="black-text" type="text" name="username" placeholder="username"/>
        </div></div>
        
        
        <div class="row">
        <div class="input-field col s3">
       
        <input type="password" name="password"/ placeholder="username"><br>
        </div></div>
        <input type="submit" name="submit" value="submit"/>
    </form>
</div>
<?php if (isset($error)) : ?>
    <span style="color:red"><?= $error ?></span>
<?php endif; ?>
    
</div>