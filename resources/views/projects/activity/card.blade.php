<div class="project_box shadow p-3 mb-5 bg-white rounded">
    @foreach ($project->activity as $activity)

        <li class="mb-1 {{$loop->last ?  '' : 'mb-1' }}">
           @include("projects.activity.{$activity->description}")
           <span class="text-muted">{{$activity->created_at->diffForHumans()}}</span>
           
        </li>
    @endforeach    
</div>