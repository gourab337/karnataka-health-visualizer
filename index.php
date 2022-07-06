<body>
    <header class="header-banner" id="i28v">
      <div class="container-width" id="iv52">
        <div class="logo-container" id="i8pl">
          <div class="logo" id="i9wk">
            <img src=iiitlogo.png alt="Indian Institute of Information Technology, Dharwad" style="width:300px; height:86px" />
          </div>
        </div>
        <nav class="menu" id="i52r">
          <div class="menu-item" id="ie64">Center for Geospatial Analytics Research
          </div>
        </nav>
        <div class="clearfix">
        </div>
      </div>
    </header>

    <section class="am-sect" id="i15cj">
      <div class="container-width" id="iftmq">
        <div class="am-container" id="i6t8o">
          <img src="map.png" class="img-phone" id="izag5"/>
          <div class="am-content">
            <br><br><br><br><br><br><br>
            <div class="am-title" id="ie6ia">Visualize <span style="color:green">Karnataka </span>Healthcare Information
            </div>
            <div class="am-desc" id="iwa2p">Upload your dataset:
            </div>
            
    <?php

    // creating directory to store files
    // designing user interface

    ?>

    <form method="POST" enctype="multipart/form-data" action="upload.php">
    <input type="file" name="file">
    <input type="submit" value="Upload" onclick=<?php $t=time() ?>>
  
    </form>
    <?php

    $files = scandir("uploads");
    for ($a = 2; $a < count($files); $a++) {
    ?>
        <p>
   
        <a downloads="" href="uploads/<?php echo $files[$a]?>" ><?php echo $files[$a] ?> </a>
    </p>
    <?php
   
}
?>


<div class="am-post" id="irv7z">Last submitted at: <?php echo gmdate("Y-m-d\ H:i:s\ ", $t+19800); ?>
</div>
<br><br>

<?php

?>

<form method="POST" action=<?php exec('python3 health_main.py') ?>>
<button type="submit" onclick="alertFunction()" >Visualize</button>
<script> 
function alertFunction() { alert("Your map has been plotted 🚀🚀"); }
</script>
</form>
<br><br>



<button onclick="window.location.href='plot.html'">Show my Plot 🔥</button>
          </div>
        </div>
      </div>
    </section>
    
  </body>
  <style>* {
    box-sizing: border-box;
    }
    body {
      margin: 0;
    }
    .clearfix{
      clear:both;
    }
    .header-banner{
      padding-top:35px;
      padding-bottom:100px;
      color:#ffffff;
      font-family:Helvetica, serif;
      font-weight:100;
      background-attachment:scroll, scroll;
      background-position:left top, center center;
      background-repeat:repeat-y, no-repeat;
      background-size:contain, cover;
    }
    .container-width{
      width:100%;
      max-width:1150px;
      margin:0 auto;
    }
    .logo-container{
      float:left;
      width:50%;
    }
    .logo{
      background-color:#fff;
      border-radius:5px;
      height: 4px;
      width: 1px;
      padding:10px;
      min-height:30px;
      text-align:center;
      line-height:30px;
      color:#000000;
      font-size:23px;
    }
    .menu{
      float:right;
      width:50%;
    }
    .menu-item{
      float:right;
      font-size:17px;
      color:black;
      width:400px;
      padding:10px;
      min-height:50px;
      text-align:center;
      line-height:30px;
      font-weight:300;
    }
    .am-sect{
      padding-top:10px;
      padding-bottom:100px;
      font-family:Helvetica, serif;
    }
    .img-phone{
      float:left;
    }
    .am-container{
      display: flex;
      flex-wrap:wrap;
      justify-content:left;
    }
    #izag5{
        width:600px;
    }
    .am-content{
      float:center;
      padding:7px;
      width: 550px;
      color:#444;
      font-weight:100;
      margin-top:5px;
    }
    .am-title{
      padding:7px;
      font-size:25px;
      font-weight:300;
    }
    .am-desc{
      padding:7px;
      font-size:17px;
      line-height:25px;
    }
    .am-post{
      padding:7px;
      line-height:25px;
      font-size:13px;
    }
    #i28v{
      opacity:1;
      background-repeat:no-repeat;
      background-position:center center;
      background-attachment:scroll;
    }
    #i9wk{
      width:600px;
    }
  </style>
