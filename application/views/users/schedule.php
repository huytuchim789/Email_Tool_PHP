
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

</head>

<body>
   
        

        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
                    <div class="col-lg-6">
                    <h3 class="page-header"><center><button type="button" class="btn btn-primary">Schedule Insert</button></center></h3>

                    <div class="col-lg-6">
                <form autocomplete="off" method="POST" action="<?=base_url()?>dashboard/insert_schedule">
                    <div class="form-group">
                    <div class="input-group">

                        <span class="input-group-text">Danh sách email, mỗi dòng là 1 email</span>
                    </div>
                    <textarea name="emails" id="emails" rows="12" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                   Total: <span style=" color:red" class="theCount" id="linesUsed">0</span> emails
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                    <div class="form-group">
                    <?php if(count($data) == 0){
                        echo '<div class="alert alert-danger">
                        <strong>Danger!</strong> Vui lòng cấu hình tài khoản Gmail.
                      </div>';
                    }?>
                        <label for="sel1">Select email:</label>
                        <select class="form-control" name="emailSend" id="emailSend">
                        <?php
                            if(count($data)== 0 ){
                                echo   '<option>Bạn chưa có tài khoản gmail nào</option>';

                                echo   '<option disabled>Vui lòng cấu hình tài khoản Gmail</option>';

                            }else {
                                foreach($data as $row){
                          echo   '<option value="'.$row->emailUsr.'">'.$row->emailUsr.'</option>';
                                }
                            }
                        ?>
                        </select>
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" name = "usr" id="usr">

                        <label for="datepicker">Start-Day:</label>
                        <input type="text" class="form-control" name = "datepicker" id="datepicker">

                        <label for="datepicker">Start-Hour:</label>
                        <input type="text" class="form-control"  name = "hourpicker"id="hourpicker">

                        <label for="sche_usr">Schedule_Name:</label>
                        <input type="text" class="form-control" name = "sche_usr" id="sche_usr">
                        </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-12">

                    <textarea id="content" name="content"></textarea>

                    <button onclick="sendContent()" type="submit"  id="insert_button" class="btn btn-primary" >SAVE</button>
                    <right><button onclick="preView()" type="submit" id="insert_button" class="btn btn-success" >Preview</button></right>
                    </form>
                    </div><!-- /.col-lg-12 -->

                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                    <h3 class="page-header"><center><button type="button" class="btn btn-primary">Preview</button></center></h3>
                    <div class="panel panel-info  ">
                    <div class="panel-heading">EMAIL CONTENT</div>

                    <img src="//ssl.gstatic.com/ui/v1/icons/mail/profile_mask2.png"  style="background-color: #cccccc">
                    <strong id="namePrv" ></strong><span id="emailPrv"></span><br>
                    <span>to xxxxxxxxxx</span><br>
                    <div id="contentPrv"></div>


                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
              
        </div>




        
<script>
                CKEDITOR.replace( 'content' );
                $( function() {
                    $( "#datepicker" ).datepicker();
                } );   //calendar    
                $(document).ready(function(){
                    $('#hourpicker').timepicker({});
                });     //time
                $(document).ready(function(){
//count email
                var lines = 100000000000;
                var linesUsed = $('#linesUsed');

                $('#emails').keydown(function(e) {

                    newLines = $(this).val().split("\n").length;
                    linesUsed.text(newLines);

                    if(e.keyCode == 13 && newLines >= lines) {
                        linesUsed.css('color', 'red');
                        return false;
                    }
                    else {
                        linesUsed.css('color', 'red');
                    }
                });
                });
// function sendContent(){
//     let usr = document.getElementById("usr").value;
//     let emailSend = document.getElementById("emailSend").value;
//     let content = CKEDITOR.instances.content.getData();
//     let emails = document.getElementById("emails").value;
//     let sche_usr = document.getElementById("sche_usr").value;
    
//     let datepicker = document.getElementById("datepicker").value;
//     let hourpicker = document.getElementById("hourpicker").value;


//     var xhttp = new XMLHttpRequest();
//         xhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {

//             }
//         };
//         xhttp.open("POST", "<?=base_url()?>/dashboard/insert_schedule", true);
        
//         xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xhttp.send("usr="+usr+"&emailSend="+emailSend+"&content="+content+"&emails="+emails+"&sche_usr="+sche_usr+"&datepicker="+datepicker+"&hourpicker="+hourpicker);
// }
function preView(){
    ckValue = CKEDITOR.instances.content.getData();
    document.getElementById("contentPrv").innerHTML = ckValue;
    let usr = document.getElementById("usr").value;
    let emailSend = document.getElementById("emailSend").value;
    document.getElementById("namePrv").innerHTML = usr;
    document.getElementById("emailPrv").innerHTML = '<>'+emailSend;

}
setInterval(() => {
    preView()
}, 0);


function addslashes(string) {
    return string.replace(/\\/g, '\\\\').
        replace(/"/g, '\\"');
}
</script>


