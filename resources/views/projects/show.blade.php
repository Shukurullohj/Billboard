@extends ('layouts.app')

@section('content')
<body>
    <header class="px-5 d-lg-flex justify-content-between align-items-center mb-5">
        <div class="d-lg-flex">
            <h3 class="h5 text-spacegray"><a class="text-spacegray" href="/projects">My Projects</a>/ {{$project->title}}</h3>

            <a class="ml-3 btn btn-info px-5" href="/projects/create">Add Task</a>
        </div>
        <div>
            <img class="rounded-circle" src="https://picsum.photos/50" alt="">
            <img class="rounded-circle" src="https://picsum.photos/50" alt="">
            <img class="rounded-circle" src="https://picsum.photos/50" alt="">
            <a class="ml-3 btn btn-info px-5" href="{{$project->path().'/edit'}}">Edit</a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-8 px-5">
            <div>
              <h2 class="text-spacegray h5">Tasks</h2>
              @foreach ($project->tasks as $task)
              <div class=" shadow p-3 mb-3 bg-white rounded ">
                  <form action="{{ $project->path() . '/tasks/' . $task->id}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="d-flex align-items-center">  
                      <input class="form-control w-100 border-0 {{$task->completed ? 'text-secondary' : ''}}"  value="{{$task->body}}" name="body">
                      <input name="completed" type="checkbox" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                  </div>  

              </form>
          </div>
          @endforeach
          <div class="shadow p-3 mb-3 bg-white rounded ">
            <form action="{{ $project->path() . '/tasks' }}" method="POST">
                @csrf

                <input placeholder="Add a new task..." class="w-100 border-0" name="body">
            </form>
        </div>
        <h2 class="text-spacegray title-size">General Notes</h2>
        <form method="POST" action="{{$project->path()}}">
          @csrf
          @method('PATCH')
          <textarea placeholder="Adding something.." class="form-control shadow p-3 mb-3  bg-white " style="min-height: 200px;">{{$project->notes}}</textarea>
          <button class="btn btn-info" type="submit">Save</button>
          @if ($errors->any())
          <div class="field mt-3">
            @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </div>
        @endif
    </form>
    

</div>


</div>
<div class="col-lg-4 px-5">
    @include('projects.card')
    @include('projects.activity.card')
</div>


</div>



</body>
@endsection
