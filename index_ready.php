<link rel="shortcut icon" href="iiitshort.png" type="image/x-icon"/>
<head>
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
      padding-bottom:10px;
      color:#ffffff;
      font-family:Helvetica, serif;
      font-weight:100;
      background-attachment:scroll, scroll;
      background-position:left top, center center;
      background-repeat:repeat-y, no-repeat;
      background-size:contain, cover;
    }
    .container-width{
      background-color:#CCE70B;
      width:100%;
      max-width:1150px;
      margin:0 auto;
    }
    .logo-container{
      float:left;
      width:50%;
    }
    .logo{
      background-color:#CCE70B;
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
      padding-right: 70;
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
      padding-right: 70;
    }
    .am-sect{
      padding-top:10px;
      padding-bottom:100px;
      font-family:Helvetica, serif;
    }
    .container-width{
      width:100%;
      max-width:1150px;
      margin:0 auto;
    }
    .img-phone{
      float:left;
    }
    .am-container{
      display: flex;
      flex-wrap:wrap;
      justify-content:center;
    }
    #izag5{
        width:500px;
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
      font-size:55px;
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
    .footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  padding: 10px;
  background-color: #cce70b;
  color: #041e3f;
  text-align: center;
  font-weight: bold;
}

  </style>
</head>
<body>
    <header class="header-banner" id="i28v">
      <div class="container-width" id="iv52">
        <div class="logo-container" id="i8pl">
          <div class="logo" id="i9wk">
          <img src="khfwd.png" alt="Dept. of Health and Familiy Welfare Services" style="width:140px; height:110px">
          <br>
          <span style = "font-weight: bold; color: red" >Dept. of Health and Family Welfare Services</span> 
        </div>
        </div>
        <nav class="menu" id="i52r">
          <div class="menu-item" id="ie64">
          <img src=iiitlogo.png alt="Indian Institute of Information Technology, Dharwad" style="width:300px; height:86px" />
          
          <span style = "font-weight: bold; color: #041E3F" >Knowledge Partner to Dept. of Health and Family Welfare Services</span></div>
        </nav>
        <div class="clearfix">
        </div>
      </div>
    </header>
    <section class="am-sect" id="i15cj">
      <div class="container-width-1" id="iftmq">
        <div class="am-container" id="i6t8o">
          
          <img src="map.png" class="img-phone" id="izag5"/>
          <div class="am-content">
            <br><br><br><br>
            <div class="am-title" id="ie6ia">Visualize <span style="color:green">Karnataka's </span><span style="font-size:37.5px;">Telemedicine Facility Utilisation</span>
            </div>
            <div class="am-desc" id="iwa2p">Upload your dataset:
            </div>
            
    <?php

    // creating directory to store files
    // designing user interface

    ?>

    <form method="POST" enctype="multipart/form-data" action="upload.php" style="background-color: #041E3F; border: none; border-radius: 5px; color: white; /* Dark grey */ padding: 15px 32px">
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

<form action="visualize.php">
<button style = "background-color: #041E3F; border: none; border-radius: 5px; font-weight: bold; font-size: 14px; color: white; /* Text color */ padding: 15px 32px" type="submit" onclick="alertFunction()" >Visualize</button>
<script> 
function alertFunction() { alert("Your map is being plotted 🚀🚀"); }
</script>
</form>

<button style = "background-color: #041E3F; border: none; border-radius: 5px; font-weight: bold; font-size: 14px; color: white; /* Text color */ padding: 15px 32px" onclick="window.location.href='plot.html'">Show my Plot 🔥</button>

<button style = "background-color: #041E3F; border: none; border-radius: 5px; font-weight: bold; font-size: 14px; color: white; /* Text color */ padding: 15px 32px" onclick="window.location.href='plot.html'">Download Plot 🗺️</button>
 
</div>

 </div>
</div>
        <div class='footer' style="text-align: center;">
          © HFWS, Govt. of Karnataka. Powered by IIIT Dharwad
</div>
      
    </section>
        <div class='footer' style="text-align: center; position: fixed;">
          © HFWS, Govt. of Karnataka. Powered by Pekanu Research Group, IIIT Dharwad
</div>
    
  </body>
  
