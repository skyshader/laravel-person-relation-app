<form action="{{ url('user') }}" method="POST" class="form-horizontal user-form">
    {{ csrf_field() }}

    <div class="form-group no-margin">
        <div class="col-md-offset-6 col-md-4 no-padding">
            <input type="text" required placeholder="Name" name="name" class="form-control input-sm pull-right user-name">
        </div>
        <div class="col-md-1 no-padding">
            <button type="submit" class="btn btn-primary btn-sm pull-right save-user">
                <i class="glyphicon glyphicon-ok"></i>
            </button>
        </div>
        <div class="col-md-1 no-padding">
            <a href="javascript:void(0);" class="btn btn-default btn-sm pull-right cancel-new-user">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </div>
    </div>
</form>
