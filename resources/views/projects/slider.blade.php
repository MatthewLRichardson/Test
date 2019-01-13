<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
   
         <h1>Create a new project</h1>
   


<!--post request followed by an action which states where the data will be posted/returned -->

    <form method="POST" action="/projects">

<!-- this csrf_field is used as protection when submitting a form. Always use this. -->
    	{{ csrf_field() }}

    	<div>
    		<input type="text" name="title" placeholder="project title">

    	</div>

    	<div>
    		
    		<!--make sure these names match the names in your database-->
    		<textarea name="description" placeholder="project description"></textarea>

    	</div>


    	<div>
    		
    		<button type="submit">Create Project</button>

    	</div>
    </form>

    </body>
</html>