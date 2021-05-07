
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
  <h2>Schedule Management</h2>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <table id="schedule" class="table table-striped">
    <thead>
      <tr>
        <th>STT</th>
        <th>Name</th>
        <!-- <th>Code</th> -->
        <th>Emails</th>
        <th>Done </th>
        <th>Processing...</th>
        <th>Content</th>
        <th>Email Send</th>
        <th>Time</th>



      </tr>
    </thead>
    <tbody>
    <?php
        $i=1;
        foreach($data as $row)
        {
            $var_email = 'count_email'.$row->tag;
            $var_fail = 'count_fail'.$row->tag;
            $var_done = 'count_done'.$row->tag;
            $var_name = 'name'.$row->tag;
            $var_content = 'content'.$row->tag;
            $var_time = 'time'.$row->tag;
            $emailSend = 'emailSend'.$row->tag;

        echo "<tr>";
        echo "<td><h4>".$i."</h4></td>";
        echo "<td><button type=\"button\" class=\"btn btn-primary\">".$$var_name."</button></td>";
        //echo "<td><h5>".$row->tag." </h5></td>";
        echo "<td><button type=\"button\" class=\"btn btn-info\">".$$var_email." emails</button></td>";
        echo "<td><button type=\"button\" class=\"btn btn-success\">".$$var_done."</button></td>";
        echo "<td><button type=\"button\" class=\"btn btn-warning\">".$$var_fail."</button></td>";
        echo "<td><button type=\"button\" class=\"btn\">".$$var_content."</button></td>";
        echo "<td><button type=\"button\" class=\"btn btn-danger\">".$$emailSend."</button></td>";

        echo "<td><button type=\"button\" class=\"btn btn-default\">".date('l Y/m/d H:i', $$var_time)."</button></td>";

        echo "</tr>";
        $i++;
        }
        ?>     

     
    </tbody>
  </table>
</div>
                </div>
                <!-- /.col-sm-12 -->
            
            <!--start input -->

               

                
                </div>
                <script>
                $(document).ready(function(){
                  $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#schedule tr").filter(function() {
                      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                  });
                });
                </script>



