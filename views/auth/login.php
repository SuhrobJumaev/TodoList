
<?php include ROOT.'/views/layouts/header.php'; ?>
<div class="wrapper">
        <?php if(isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach($errors as $error):?>
                    <li> -<?php echo $error?></li>
                <?php endforeach;?>
            </ul>
        <?php endif; ?>    
        <div class="text-center mt-4 name">
        ToDo list
        </div>
        <form class="p-3 mt-3" method="POST" action="login">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="login" id="login" placeholder="login" require>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" require>
            </div>
            <button class="btn mt-3" name="submit">Login</button>
        </form>
    </div>
    <?php include ROOT.'/views/layouts/footer.php'; ?>