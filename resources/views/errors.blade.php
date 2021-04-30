@if ($errors->{$bag ?? 'default'}->any())
    <div class="field">
        @foreach ($errors->{$bag ?? 'default'}->all() as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
    </div>
@endif
