@extends ('layouts.app')

@section('content')
    

        
    <div class="container">
    <h1 class="my-3">Edit Project</h1>
    <form method="POST" action="{{$project->path()}}">
        @method('PATCH')
    @include('projects._form', [
    'project' => 
    new App\Project,
    'textButton' => 'Edit Project'
    ])
    </form>
@endsection
