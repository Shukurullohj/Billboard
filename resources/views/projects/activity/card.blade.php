<div class="project_box shadow p-3 mb-5 rounded act pb-3">
    @foreach ($project->activity as $activity)

        <li class=" {{$loop->last ?  '' : 'mb-1' }}">
           @include("projects.activity.{$activity->description}")
           <span class="">{{$activity->created_at->diffForHumans()}}</span>
           
        </li>
    @endforeach    
</div>
