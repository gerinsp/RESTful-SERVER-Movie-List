<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('layout_navbar'); ?>
  <div class="container">
    <div class="row justify-content-center">
        <div class="card mt-5" style="width: 25rem;">
                <h3 class="text-center pt-2">Form Login</h3>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                    </div>
                <a href="#" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
    
  </div>

  <?php $this->load->view('layout_footer'); ?>
    

  