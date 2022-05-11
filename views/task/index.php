<?php include ROOT.'/views/layouts/header.php'; ?>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">

        <div class="card">
          <div class="card-body p-5">
          <?php if(Task::IsSessionHasAlert()): ?>
            <ul>
                    <li> -<?php echo Task::IsSessionHasAlert(); Task::DeleteAlertSession(); ?></li>

            </ul>
        <?php endif; ?>  
            <a class="btn btn-success ms-1" href="/createTask/" role="button">AddNewTask</a>

            <!-- Tabs content -->
            <div class="tab-content" id="ex1-content">
                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                aria-labelledby="ex1-tab-1">
                    
                      <table class="table mb-4">
                     
                          <thead>
                              <tr>
                              
                              <th scope="col">No.</th>
                              <th scope="col">
                                <a href="/task/page-<?php echo $page?>/name/<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>" >Name</a>
                              </th>
                              <th scope="col">
                                <a href="/task/page-<?php echo $page?>/email/<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>" >Email</a>
                              </th>
                              <th scope="col">Task</th>
                              <th scope="col">
                              <a href="/task/page-<?php echo $page?>/status/<?php echo ($sort == 'asc') ? 'desc' : 'asc'?>" >Status</a>
                              </th>
                              
                                <th scope="col">Edited</th>
                              
                              <?php if (!Auth::isGuest()): ?>
                                <th scope="col">Actions</th>
                              <?php endif; ?>
                              
                          </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($tasks as $task) : ?>  
                                  <tr>
                                      <th scope="row"><?php echo $task['id']?></th>
                                      <td><?php echo $task['name'] ?></td>
                                      <td><?php echo $task['email'] ?></td>
                                      <td><?php echo $task['text']?></td>
                                      <td><?php  echo ($task['status'] == 0) ?  'In progress' : 'Finished'  ?></td>
                                      
                                      <td><?php echo ($task['is_edit'] == 1) ?  'Yes' : 'No' ?></td>
                                      
                                      <?php if (!Auth::isGuest()): ?>
                                        <td>
                                          <a class="btn btn-success ms-1" href="/finishTask/<?php echo $task['id'].'/'. $page . '/' . $order . '/' . $sort ?>/" role="button">Finished</a>
                                          <a class="btn btn-success ms-1" href="/editTaskText/<?php echo $task['id'].'/'. $page . '/' . $order . '/' . $sort ?>/" role="button">Edit Text</a>
                                        </td>
                                      <?php endif; ?>
                                  </tr>
                              <?php endforeach; ?>    
                          </tbody>
                        
                      </table>
                  
                    <nav aria-label="Page navigation example">
                           <?php echo $pagination->get(); ?>
                    </nav>
                </div>
            </div> 
            <!-- Tabs content -->

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<?php include ROOT.'/views/layouts/footer.php'; ?>