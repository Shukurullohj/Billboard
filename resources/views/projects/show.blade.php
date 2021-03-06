@extends ('layouts.app')

@section('content')
<body>
    <header class="px-5 d-lg-flex justify-content-between align-items-center mb-5">
        <div class="d-lg-flex align-items-center">
            <h3 class="h5"><a class="" href="/projects">My Projects</a>/ {{$project->title}}</h3>

            <a class="ml-3 btn button px-3" href="/projects/create">Add Task</a>
        </div>
        <div class="d-flex align-items-center">
            
            @foreach ($project->members as $member)
              <img class="rounded-circle" src="https://gravatar.com/avatar/{{md5($member->email)}}?s=50" alt="{{$member->name}} 's avatar">
            @endforeach
            <a class="ml-3 btn button px-3" href="{{$project->path().'/edit'}}">Edit</a>
        </div>
    </header>
    <div class="row">
        <div class="col-lg-8 px-5">
            <div>
              <h2 class="h5">Tasks</h2>
              @foreach ($project->tasks as $task)
              <div class=" shadow p-3 mb-rounded ">
                  <form action="{{ $project->path() . '/tasks/' . $task->id}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="d-flex align-items-center">  
                      <input class="card form-control w-100 border-0 {{$task->completed ? '' : ''}}"  value="{{$task->body}}" name="body">
                      <input class="form-control " name="completed" type="checkbox" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                  </div>  

              </form>
          </div>
          @endforeach
          <div class="shadow p-3 mb-rounded ">
            <form action="{{ $project->path() . '/tasks' }}" method="POST">
                @csrf

                <input placeholder="Add a new task..." class="w-100 border-0 card" name="body">
            </form>
        </div>
        <h2 class="title-size mt-4">General Notes</h2>
        <form method="POST" action="{{$project->path()}}">
          @csrf
          @method('PATCH')
          <textarea placeholder="Adding something.." class="form-control shadow p-3 mb-3 card" style="min-height: 200px;">{{$project->notes}}</textarea>
          <button class="btn button" type="submit">Save</button>
          @if ($errors->any())
          <div class="field mt-3">
            @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </div>
        @endif
    </form>
    <div class="card parent mx-auto" style="">
      <div class="child mx-3 " style="">
        <h3>Title</h3>
        <p class="mx-auto" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa repudiandae labore magni nostrum ducimus repellendus placeat consequuntur tempore inventore atque aperiam ullam beatae magnam quod, dolore est! Exercitationem veniam adipisci similique eveniet doloribus beatae sed quam amet sapiente, nobis ea nulla veritatis unde tempora ipsa esse temporibus voluptates laborum at.</p>
        <button class="btn button">Submit</button>
      </div>
    </div>
     
      
    

</div>


</div>
<div class="col-lg-4 px-5">
    @include('projects.card')
    @include('projects.activity.card')
    @include('projects.invite')
</div>


</div>



</body>
@endsection
