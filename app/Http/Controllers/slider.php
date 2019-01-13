<?php
// <!-- slider form -->
//when form is submitted - change number generated to text/mood - do for all 4 forms. How can I combine this?
//compare mood to xml database to recall name/description/image information
//use switch statement to go through all the emotions
//loop 5 times to populate the 5 boxes on the index page
//return browser to index page after form has been submitted

$slider_index = intval($_POST['mood1']);
    $word = '';
    switch ($slider_index) {
        case 0:
            $word = 'Agitated';

            break;
        case 2:
            $word = 'OK';
            break;
        case 3:
            $word = 'Calm';
            break;
    }

//
// //Check to see form works
// $mood1 = $_POST["mood1"];
// if ($mood1 <1) {
//   echo 'Agitated';
// }
// else {
//   echo 'Calm';
// }


include 'database.php';
$programmeList = new SimpleXMLElement($xmlstr);

if ((string) $programmeList->programme->mood == $slider_index) {
    echo $programmeList->programme->name;
    echo $programmeList->programme->description;
    echo $programmeList->programme->image;
}


?>
