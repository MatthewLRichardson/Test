<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Orchestra\Parser\Xml\Facade as XmlParser;

interface OutputType
{
    public function generate();
}



//project class has been imported
use App\Project;

class ProjectsController extends Controller
{
    //public function index()
    //{
    	//because the class has been imported we can reference it like this rather than '\App\Project::all();'
    //	$projects = Project::all();



//passing the JSON to the view

    //	return view ('projects.index', ['projects'=> $projects]); //can also use 'compact('projects') instead of the ['projects'=> $projects]
    //}



//new method called create

    public function create()
    {

    	return view ('projects.create');

    }

    //new method called store


   public function store()
    {
       
      if (isset($_POST['submit'])) {
            $xmlType = new XMLType();
            $xmlType->createParent('programme', ['id' => 1])
                    ->addElement('name', $_POST['name'], ['type' => 'string'])
                    ->addElement('description', $_POST['description'])
                    ->addElement('mood', $_POST['mood'])
                    ->groupParentAndElements()
                    ->createParent('others', ['id' => 2, 'attr' => 'ex'])
                    ->addElement('example', 'A value here')
                    ->groupParentAndElements();

            //whenever you wish to output
            $xmlType->generate();
            $xmlFile = new XMLFile('database.xml', 'images/database.xml');
            $xmlFile->create($xmlType->generate());
            return view('projects.upload');
        }
    }

public function index(Request $request)
{

   // Need logic that checks if there is anything in the request
   // If there is nothing in the request, then show all films

   // Repeat this for every input slider you have
   $mood1 = $request->input('mood1'); // This will return the value of the slider

   // You will need some logic which will calculate which mood to search
   // your database for, i.e. if $mood1 < 3 && $mood2 > 1 etc.
    if ($mood1 == 2) {
  echo 'Agitated';
  print 'af';
 }
else {
   echo 'Calm';
 }

   $projects = Project::where('mood', $mood);

return view ('projects.index', ['projects'=> $projects]);
}

//changed this from upload to show
	public function upload()
{

  
return view('projects.upload');
    }

//changed this from upload to show
	public function show()
{
    

    return view ('projects.upload', compact('user'));
}

	public function slider()
{
    

    return view ('projects.upload', compact('user'));
}


}


