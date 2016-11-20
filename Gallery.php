<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/photo-gallery.js"></script>
  </head>
  <style>
      ul {         
          padding:0 0 0 0;
          margin:0 0 0 0;
      }
      ul li {     
          list-style:none;
          margin-bottom:25px;           
      }
      ul li img {
          cursor: pointer;
      }
      .modal-body {
          padding:5px !important;
      }
      .modal-content {
          border-radius:0;
      }
      .modal-dialog img {
          text-align:center;
          margin:0 auto;
      }
    .controls{          
        width:50px;
        display:block;
        font-size:11px;
        padding-top:8px;
        font-weight:bold;          
    }
    .next {
        float:right;
        text-align:right;
    }
      /*override modal for demo only*/
      .modal-dialog {
          max-width:500px;
          padding-top: 90px;
      }
      a:link
      {
      color:red;
      }
  </style>
  <body>    
    <div class="container">    
        <div class="row" style="text-align:center; border-bottom:1px dashed #ccc;  padding:0 0 20px 0; margin-bottom:40px;">
            <h3 style="font-family:arial; font-weight:bold; font-size:30px;">
                Gallery
        </h3>
        </div>
        
        <ul class="row">
            
            <?php

            $con=mysql_connect('mysql.2freehosting.com','u158576178_svms','sam1565473')
    or die('Could not connect: ' .  mysql_error());
            $sel_db=mysql_select_db('u158576178_svms',$con);
            $data=mysql_query("select sname,image from society;");
            $rownos=mysql_num_rows($data);
            if ( $rownos< 0)
              echo "<h1>No Record Found!</h1>";
            else
            {
                while($row = mysql_fetch_array($data))
                {   
                    echo "<li class='col-lg-4 col-md-2 col-sm-3 col-xs-4'>";
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="300" height="350">';
                    echo '<h3 align="center">'.$row['sname'].'</h3>';
                    echo "</li>";
                }
            }
            ?>
        </ul>             
    </div> <!-- /container -->
    
     
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">                
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
  </body>  
</html>