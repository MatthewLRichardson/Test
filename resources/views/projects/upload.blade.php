<link rel="stylesheet" href="CSS/app.css" type="text/css">
 <meta name = "viewport" content="width = device-width, initial-scale = 1">
      <link rel = "stylesheet" href = "https://www.w3schools.com/lib/w3.css">
<!DOCTYPE html>
<html>
<head>
    <title>Moodslider</title>
</head>
<body>

 <!-- Sky logo + Sky cinema logo -->
<div class="box">
	<td style="text-align:center;color:black;font-size:50px;">
         <img src="/images/sky.png"  title="Sky" alt="Sky" width="auto" height="125" />
       </td>
       <td style="text-align: right;position: relative; color:black;font-size:50px;">
         <img src="/images/sky_cinema.png"  title="sky_cinema" alt="Sky" width="auto" height="125" />
       </td>
</div>

<!-- This is the navigation bar for the homepage and the upload content page. -->
<div>
  <ul class="w3-navbar w3-black">
    <li><a href="/projects/upload">Moodslider Home</a></li>
    <li><a href="/projects/create">Upload Content</a></li>
  </ul>
</div>

<div class="w3-row-padding">
      <div class="w3-panel">
        <h1 style="text-align:center;color:black;font-size:50px;">Select a movie based on your mood</h1>
      </div>

<form action="/projects/upload" method="post" enctype="multipart/form-data">
    {{ @csrf_field() }}
<div class="col-md-12">

<div class="w3-row-padding">
  <div class="w3-col m3 w3-center">
    <label for="Agitated"><h3>Agitated</h3></label><br><br>
    <label for="Happy"><h3>Happy</h3></label><br><br>
    <label for="Tired"><h3>Tired</h3></label><br><br>
    <label for="Scared"><h3>Scared</h3></label><br><br>
  </div>

  <div class="w3-col m6 w3-center">
    <br>
    <form action="/projects/upload" method="post" enctype="multipart/form-data">
    {{ @csrf_field() }}
    
<div></div>
  <input type="range" name="mood1" min="0" max="2" value="1" step="1";/><br><br>
  <input type=submit value=Submit />
  
  <br>
  <br>
  <input type="range" name="mood2" min="0" max="2" value="1" step="1" class="slider" id="myRange"><br><br>
  <input type="submit" value="Submit">
<br>
<br>
  <input type="range" name="mood3" min="0" max="2" value="1" step="1" class="slider" id="myRange"><br><br>
  <input type="submit" value="Submit">
<br>
<br>
  <input type="range" name="mood4" min="0" max="2" value="1" step="1" class="slider" id="myRange"><br><br>
  <input type="submit" value="Submit">
  <br>
  <br>
  </div>
</form>
  <div class="w3-col m3 w3-center">
    <label for="Calm"><h3>Calm</h3></label><br><br>
    <label for="Sad"><h3>Sad</h3></label><br><br>
    <label for="WideAwake"><h3>Wide Awake</h3></label><br><br>
    <label for="Fearless"><h3>Fearless</h3></label><br><br>
  </div>
</div>

</form>

<!-- display the films images -->
<form action="/projects/upload">

 <div class="w3-row">
    <div type="text" name="lname" class="w3-col w3-container" style="width:20%"><img src=<?$xml=simplexml_load_file("images/database.xml");
    echo '../'.$xml->programme[1]->image?> ; alt="" style="width:100%;max-width:150px"></div>
    <div class="w3-col w3-container" style="width:20%"><img src=<?$xml=simplexml_load_file("images/database.xml");
    echo '../'.$xml->programme[2]->image?> alt="" style="width:100%;max-width:150px"></div>
    <div class="w3-col w3-container" style="width:20%"><img src=<?$xml=simplexml_load_file("images/database.xml");
    echo '../'.$xml->programme[4]->image?> alt="" style="width:100%;max-width:150px"></div>
    <div class="w3-col w3-container" style="width:20%"><img src=<?$xml=simplexml_load_file("images/database.xml");
    echo '../'.$xml->programme[6]->image?> alt="" style="width:100%;max-width:150px"></div>
    <div class="w3-col w3-container" style="width:20%"><img src=<?$xml=simplexml_load_file("images/database.xml");
    echo '../'.$xml->programme[5]->image?> alt="" style="width:100%;max-width:150px"></div><br>

<!-- display the film name and description -->
<? $xml=simplexml_load_file("images/database.xml") or die("Error: Cannot create object");?>
    <div class="w3-row"></div>
    <div class="w3-row">
    <div class="w3-col w3-container" style="width:20%"><h3><?echo $xml->programme[1]->name?></h3></div>
    <div class="w3-col w3-container" style="width:20%"><h3><?echo $xml->programme[2]->name?></h3></div>
    <div class="w3-col w3-container" style="width:20%"><h3><?echo $xml->programme[4]->name?></h3></div>
    <div class="w3-col w3-container" style="width:20%"><h3><?echo $xml->programme[6]->name?></h3></div>
    <div class="w3-col w3-container" style="width:20%"><h3><?echo $xml->programme[5]->name?></h3></div>

    <div class="w3-row">
    <div class="w3-col w3-container" style="width:20%"><p><?echo $xml->programme[1]->description?></p></div>
    <div class="w3-col w3-container" style="width:20%"><p><?echo $xml->programme[2]->description?></p></div>
    <div class="w3-col w3-container" style="width:20%"><p><?echo $xml->programme[4]->description?></p></div>
    <div class="w3-col w3-container" style="width:20%"><p><?echo $xml->programme[6]->description?></p></div>
    <div class="w3-col w3-container" style="width:20%"><p><?echo $xml->programme[5]->description?></p></div>
</div>
</form> 
<!--
<form action="/projects/upload" method="post" enctype="multipart/form-data">Select image to upload:
{{ @csrf_field() }}
    <input type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" value="Upload Image" name="submit">
</form>
-->

</body>
</html>

