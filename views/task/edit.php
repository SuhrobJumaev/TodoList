
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
    <form class="d-flex justify-content-center align-items-center mb-4" method="POST" action="editTaskText" >
        <div class="form-outline flex-fill">
            <label class="form-label" for="form2">Name</label>
            <input type="text" id="form2" class="form-control"  name="name" disabled  value="<?php echo $task['name'];?>"/>
            <label class="form-label" for="form2">Email</label>
            <input type="text" id="form2" class="form-control" name="email" disabled value="<?php echo $task['email'];?>" />
            <label class="form-label" for="form2">Text</label>
            <input type="text" id="form2" class="form-control" name="text" value="<?php echo $task['text']; ?>" />

            <button type="submit" name="submit" class="btn btn-info mt-2">Edit text</button>
        </div> 
    </form>
    <!-- Tabs content -->

    </div>
</div>
<?php include ROOT.'/views/layouts/footer.php'; ?>