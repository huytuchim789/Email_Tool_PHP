
        <div id="page-wrapper">
            <?php if($this->session->flashdata('success')):?>
                &nbsp;<div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                &nbsp;<div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif;?>
            <br>
            <div style="" class="col-sm-12">
      <div class="well">
        <h4 style="color : red"> <ins>About my system</ins> </h4>
        <p>My system can help you : 
        </p>
        <p>
        <b> <i class='fab fa-accusoft'>+ Send email automaticly  </i></b>
 
        </p>
            
        <p>
        <b><i class='fab fa-accusoft'>+ Avoid spam  </i></b>
        </p>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>GMAIL ACCOUNT</h4>
            <p><?=$gmail_count?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Success</h4>
            <p><?=$send_success?> emails</p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Fails</h4>
            <p><?=$send_fail?></p> 
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Schedule</h4>
            <p><?=$schedule_count?></p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <p>Text</p> 
          </div>
        </div>
      </div>
    </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- wrapper -->
            






