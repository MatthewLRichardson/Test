<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
    <ul>
         <h1>Projects</h1>
    </ul>

    @foreach ($projects as $project)

    	<li> {{ $project->title }} </li>
    @endforeach

    </body>
</html>