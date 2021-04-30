@extends ('layouts.app')

@section('content')
    
        <div class="d-flex align-items-center mb-5 mx-5">
            <h3 class="mr-auto text-spacegray">My Projects</h3>
            <a class="btn button px-5" href="/projects/create" @click.prevent="$modal.show">Create Project</a>
        </div>
        
        <div class="row px-5">
        @forelse ($projects as $project)

            <div class="col-lg-4 px-3 ">
                @include('projects.card')
            </div>
        @empty 
            <li>Not yet added</li>  
        @endforelse 
        </div> 
          
        <new-project-modal></new-project-modal>
          
   
</body>
</html>                                                 
@endsection
