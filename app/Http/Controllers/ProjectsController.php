<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//project class has been imported
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
    	//because the class has been imported we can reference it like this rather than '\App\Project::all();'
    	$projects = Project::all();



//passing the JSON to the view

    	return view ('projects.index', ['projects'=> $projects]); //can also use 'compact('projects') instead of the ['projects'=> $projects]
    }



//new method called create

    public function create()
    {

    	return view ('projects.create');

    }

    //new method called store

   public function store()
    {

    	$project = new Project();

    	$project->title = request('title');

    	$project->description = request('description');

    	$project->save();

    	return redirect('/projects');

    }
}


