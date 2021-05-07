
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
   

        <div  id="page-wrapper">
            <div class="row">
            <div class="col-sm-12">
                    <h3 class="page-header"><center>Insert your email ( that's for  send )</center></h3>
                   
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!--start input -->

                <div class="col-sm-12">
                <div class="col-sm-5">
                <div class="card border-light mb-3">
                    <div class="card-header">
                    <div class="panel-heading text-left">
                    <h5><i class="fa fa-line-chart" aria-hidden="true"></i> Hướng dẫn</h5>
                    </div>
                    <div class="panel-body">
                    <div class="form-group">
                    <table class="table table-striped table-bordered" style="width:100%">
                    <thead>

                    <tr class="success">
                    <th>Input</th>
                    <th>Mô tả</th>
                    </tr>
                    <tr class="active">
                    <td>Email user name</td>
                    <td>
                    - <b style="color:green">Email user name</b> là tên tài khoản GMAIL của bạn (không bao gồm @...).<br>
                    - Nên kiểm tra kĩ trước khi nhập.<br>
                    </tr>
                    <tr class="active">
                    <td>Password</td>
                    <td>
                    <b style="color:green"> Là mật khẩu GMAIL của bạn ( dùng để gửi email tự động ):</b><br>
                    - <b>LƯU Ý</b>: Chúng tôi <b>CAM ĐOAN KHÔNG SỬ DỤNG TÀI KHOẢN CỦA BẠN DƯỚI BẤT KỂ MỤC ĐÍCH NÀO KHÁC</b> .<br>

                    </tr></thead></table>
                    </div>
                    </div>
                    </div>
                    </div>
                <div class="panel panel-primary ">
                <div class="panel-heading">INSERT YOUR ACCOUNT</div>

                <div class="row panel-body">
                <div class="col-sm-12">
                <div class="col-sm-8">

                <!-- <form method="post" Action="<?=base_url()?>/dashboard/insert_db_gmail"> -->
                    
                <div class="form-group ">
                    
                    <label for="emailUsr">Email user name</label>
                    <input type="text" class="form-control" name="emailUsr" id="emailUsr" aria-describedby="emailHelp" placeholder="Enter email">
                    
                    <small id="type" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    
                </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                    <label for="domain">Domain</label>
                    <input type="email" class="form-control" id="domain" value="@gmail.com"  placeholder="Enter email" disabled>
                  
                </div>
                </div>

                <div class="col-sm-12">

                <div class="form-group">
                    <label for="passEmailUsr">Password</label>
                    <input type="password" name="passEmailUsr" class="form-control" id="passEmailUsr" placeholder="Password">
                </div>
                <button onclick="sendEmail()" type="submit" id="insert_button" class="btn btn-primary" disabled>SAVE</button>
                <?php echo $this->session->flashdata('mess'); ?>
                <!-- </form> -->
                </div>

                </div>
                </div>
                </div>


                </div>
               <!-- start table -->
                <br><br><br><br>
                <div class="col-sm-7">
                <div class="panel panel-danger ">
                <div class="panel-heading">Account Manage</div>

                <div class="row panel-body">
                <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                <center><input id="myInput" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search..."
                    aria-label="Search"></center> <br>      
                </form>
                <table class="table table-striped table-bordered table-hover " id="dataTables-gmail">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Checked</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $i=1;
                                    foreach($data as $row)
                                    {
                                    echo "<tr>";
                                    echo "<td>".$i."</td>";
                                    echo "<td>".$row->emailUsr."</td>";
                                    echo "<td>********</td>";
                                    if($row->checked == 1){
                                    echo '<td><span style="color:red"><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/microsoft/209/heavy-check-mark_2714.png" width="20px" height="20px" alt=""></span></td>';
                                    }else {
                                    echo '<td><span style="color:red"><img src="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/160/microsoft/209/cross-mark_274c.png" width="20px" height="20px" alt=""></span></td>';
                                    }
                                    echo '<td><button   class="btn btn-primary" id="user-edit-'.$row->emailUsr.'"   onclick="checkPass(\''.$row->emailUsr.'\')">CHECK</button>';
                                    echo '<a class="btn btn-danger" id="user-delete" onclick="" data-toggle="modal" data-target="#deactivateConfirm"> DELETE </a>';
                                    echo "<td>";
                                    echo "</tr>";
                                    $i++;
                                    }
                                    ?>        
                        </tbody>
                    </table>
                </div>

                </div>
                
                </div>
                
<script>
    $('#emailUsr').keypress(function (e) {
    var txt = String.fromCharCode(e.which);
    if (!txt.match(/[A-Za-z0-9&.]/)) {
        return false;
    }
    document.getElementById("insert_button").disabled = false;


    });
    $('#passEmailUsr').keypress(function (e) {
        document.getElementById("insert_button").disabled = false;

    });

    // load form submit
    function sendEmail() {
        document.getElementById("insert_button").innerHTML = "WAITING...";

        document.getElementById("insert_button").disabled = true;

        let user = document.getElementById("emailUsr").value;
        let pass = document.getElementById("passEmailUsr").value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.reload()

            }
        };
        xhttp.open("POST", "<?=base_url()?>/dashboard/insert_db_gmail", true);
        
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("emailUsr="+user+"&passEmailUsr="+pass);
    }
    function checkPass(email){

        document.getElementById("user-edit-"+email).innerHTML = "WAITING...";

        document.getElementById("user-edit-"+email).disabled = true;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Check thành công");
                location.reload()
            }
        };
        xhttp.open("POST", "<?=base_url()?>/dashboard/check_gmail", true);
        
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("emailUsr="+email);
    }
</script>


