@if (count($activity->changes['after']) == 1)
    You updated the {{key($activity->changes['after'])}} of the project
@else
    Project updated
@endif
