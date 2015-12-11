<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to LaraIssues</title>
</head>
<body>
  <h1>Projects</h1>




  @foreach( $projects as $project )
    <div><a href="{{ $project->project_name }}">{{ $project->project_name }}</a></div>    
  @endforeach
</body>
</html>