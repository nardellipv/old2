@if (count($errors) > 0)
<div class="col-lg-12">
    <div class="body">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul class="list-group list-group-flush">
                @foreach ($errors->all() as $error)
                <li class="list-group-item"><i class="fa fa-warning"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
