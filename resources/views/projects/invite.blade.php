<form method="POST" action="{{$project->path()}} . /invitations">
    @csrf
    <div class="project_box shadow p-3 mb-5 rounded">
        <h3>Invative a User</h3>
        <input name="email" class="form-control my-3" type="email" placeholder="Email Adress">
        <button type="submit" class="btn button">Invite</button> 
        @include('errors', ['bag'=>'invitations'])  
    </div>
</form>  
