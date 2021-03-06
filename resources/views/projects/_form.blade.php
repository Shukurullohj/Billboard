  @csrf
  <input class="w-100 form-control" type="text" value="{{$project->title}}" name="title">
  <textarea class=" my-3 form-control" name="description" id="" cols="10" rows="10">{{$project->description}}</textarea>
  <button class="btn btn-primary" type="submit">{{$textButton}}</button>
  <a class="btn btn-secondary" href="{{$project->path()}}">Cancel</a>
  @if ($errors->any())
  <div class="field mt-3">
    @foreach ($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
    @endforeach
        </div>
   @endif
</div>




