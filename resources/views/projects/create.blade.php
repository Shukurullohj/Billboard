@extends ('layouts.app')

@section('content')
    <form method="POST" action="/projects">
    <div class="container">
    <h1 class="my-3">Create Project</h1>
    @include('projects._form', [
    'project' => 
    new App\Project,
    'textButton' => 'Create Project'
    ])
    </form>

@endsection
