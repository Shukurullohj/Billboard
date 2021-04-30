<div class="project_box shadow p-3 mb-5 rounded ">
    <a href="{{$project->path()}}"><h3>{{$project->title}}</h3></a>    
    <p >{{ Illuminate\Support\Str::limit($project->description, 100) }}</p>
    <footer>
        <form method="POST" class="text-right" action="{{$project->path()}}">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </footer>
</div>
