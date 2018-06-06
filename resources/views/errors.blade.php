@if($errors->any())
    <div class="col-md-4 col-md-offset-4">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <p/>
@endif