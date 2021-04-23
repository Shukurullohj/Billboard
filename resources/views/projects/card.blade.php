<div class="project_box shadow p-3 mb-5 bg-white rounded ">
    <a class="text-dark" href="{{$project->path()}}"><h3 class="py-4">{{$project->title}}</h3></a>    
    <p class="text-spacegray">{{ Illuminate\Support\Str::limit($project->description, 100) }}</p>
    <footer>
        <form method="POST" class="text-right" action="{{$project->path()}}">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </footer>
</div>