<?php include ROOT.'/views/layouts/header.php'; ?>
<div class="card">
    <div class="card-body p-5">
        <?php if(isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach($errors as $error):?>
                    <li> -<?php echo $error?></li>
                <?php endforeach;?>
            </ul>
        <?php endif; ?> 
        
       
         
        <form class="d-flex justify-content-center align-items-center mb-4" method="POST" action="/createTask/page-1">
                    <div class="form-outline flex-fill">
                    <label class="form-label" for="form2">Name</label>
                        <input type="text" name="name" value="<?php echo Task::IsSessionHasName()?>" id="form2" class="form-control" />
                        <label class="form-label" for="form2">Email</label>
                        <input type="text" name="email" value="<?php echo  Task::IsSessionHasEmail()?>" id="form2" class="form-control" id="form2" class="form-control" />
                        <label class="form-label" for="form2">New task</label>
                        <input type="text" name="text" value="<?php echo Task::IsSessionHasText()?>" id="form2" class="form-control" id="form2" class="form-control" />

                        <button type="submit" name="submit" class="btn btn-info mt-2">Add task</button>
                    </div>
                    
                    </form>
        <?php include ROOT.'/views/layouts/footer.php'; ?> 
    </div>
</div>