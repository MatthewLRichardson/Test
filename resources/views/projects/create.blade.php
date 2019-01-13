<link rel="stylesheet" href="CSS/app.css" type="text/css">
 <meta name = "viewport" content="width = device-width, initial-scale = 1">
      <link rel = "stylesheet" href = "https://www.w3schools.com/lib/w3.css">
<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
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

   <div>
  <ul class="w3-navbar w3-black">
    <li><a href="/projects/upload">Moodslider Home</a></li>
    <li><a href="/projects/create">Upload Content</a></li>
  </ul>
</div>


<div>
         <h1>Upload a movie</h1>
   </div>
<!--post request followed by an action which states where the data will be posted/returned -->

    <form method="POST" action="/projects">


 <form action="/projects/upload" method="post" enctype="multipart/form-data">
    {{ @csrf_field() }}
  <h4>Movie Title</h4><input type="text" name="name">
  <br/>
  <h4>Movie Description</h4><textarea name="description" rows="5" cols="50" wrap="physical">
  </textarea>
  <h4>Movie Emotion</h4>
  <input type="radio" name="mood" value="Agitated">Agitated<br>
  <input type="radio" name="mood" value="Calm">Calm<br>
  <input type="radio" name="mood" value="Happy">Happy<br>
  <input type="radio" name="mood" value="Sad">Sad<br>
  <input type="radio" name="mood" value="Tired">Tired<br>
  <input type="radio" name="mood" value="WideAwake">Wide Awake<br>
  <input type="radio" name="mood" value="Scared">Scared<br>
  <input type="radio" name="mood" value="Fearless">Fearless<br>
  <br/>
  Choose a file to upload: <input type="file" name="fileToUpload" id="fileToUpload" />
  <br/>
  <br/>
  <input type="submit" value="submit" name="submit" />
</form>
    </form>

    </body>
</html>