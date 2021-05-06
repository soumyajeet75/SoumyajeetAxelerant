<!DOCTYPE html>
  <head>
    <title>index</title>
    <link rel="shortcut icon" type="image/x-icon" href="./assets/favicon.ico" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>

  <body style="background:rgba(250,250,250,0.8)">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Competency Check</a>
          </div>
        </div>
      </nav>



      <div class="container">

        <?php
        include'connect.php';

        function getdata($option,$connect){
            $sql="SELECT * FROM `opinionpoll` WHERE options='$option';";
            if ($result=mysqli_query($connect,$sql))
          {
          $rowcount=mysqli_num_rows($result);
          $rc=$rowcount;
          mysqli_free_result($result);
          return $rc;
          }
          }

        $option_1=getdata("Miguel de Cervantes",$connect);
        $option_2=getdata("Charles Dickens",$connect);
        $option_3=getdata("J.R.R Tolkien",$connect);
        $option_4=getdata("Antoine de Saint-Exuper",$connect);
         
        
          #raj
          $votes=array("Miguel de Cervantes"=>$option_1,"Charles Dickens"=>$option_2,"J.R.R Tolkien"=>$option_3,"Antoine de Saint-Exuper"=>$option_4);
            arsort($votes);
            $i=0;
            $temp=array();
            $author=array();
          foreach($votes as $x=>$x_value)
             {
            $temp[$i]=$x_value;
            $author[$i]=$x;
            # echo "Key=" . $x . ", Value=" . $x_value;
            # echo "<br>";
          $i++;   
          }
          rsort($temp);
          $colors=array("success","info","warning","danger");

          for($i=0;$i<3;$i++){
            if($temp[$i]==$temp[$i+1]){
              $colors[$i+1]=$colors[$i];
            }
          }
          
          $max= max($temp);
          #echo $max;

          $mul=100/$max;
          #echo $mul;

          ?>

       


        <h3>Poll Results</h3>
        <div class="container" style="margin-top:50px; background:rgba(255,255,255,1)">
            <div class="row">
                <div class="col-md-3">
                <h4></b><?php echo $author[0]?><b></h4>
                </div>
                <div class="col-lg-12">
                    <div class="progress">
                        <div class="progress-bar progress-bar-<?php echo $colors[0]?> progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $temp[0]*$mul?>%">
                         <?php echo $temp[0]?> Votes
                         </div>
                    </div>
                 </div>
            </div>
        </div>

        <div class="container" style="background:rgba(255,255,255,1)">
            <div class="row">
                <div class="col-md-3">
                <h4></b><?php echo $author[1]?><b></h4>
                </div>
                <div class="col-lg-12">
                    <div class="progress">
                        <div class="progress-bar progress-bar-<?php echo $colors[1]?> progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $temp[1]*$mul?>%">
                        <?php echo $temp[1]?> Votes
                         </div>
                    </div>
                 </div>
            </div>
        </div>

        <div class="container" style="background:rgba(255,255,255,1)">
            <div class="row">
                <div class="col-md-3">
                <h4></b><?php echo $author[2]?><b></h4>
                </div>
                <div class="col-lg-12">
                    <div class="progress">
                        <div class="progress-bar progress-bar-<?php echo $colors[2]?> progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $temp[2]*$mul?>%">
                        <?php echo $temp[2]?> Votes
                         </div>
                    </div>
                 </div>
            </div>
        </div>

        <div class="container" style="background:rgba(255,255,255,1)">
            <div class="row">
                <div class="col-md-3">
                <h4></b><?php echo $author[3]?><b></h4>
                </div>
                <div class="col-lg-12">
                    <div class="progress">
                        <div class="progress-bar progress-bar-<?php echo $colors[3]?> progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $temp[3]*$mul?>%">
                        <?php echo $temp[3]?> Votes
                         </div>
                    </div>
                 </div>
            </div>
        </div>
      </div>
  </body>
</html>
