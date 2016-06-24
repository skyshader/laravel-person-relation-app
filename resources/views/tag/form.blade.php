<form action="{{ isset($tag) ? url('tag', [$tag->id]) : url('tag') }}" method="POST" class="form-horizontal tag-form">
    {{ csrf_field() }}
    {{ isset($tag) ? method_field('PUT') : '' }}

    <div class="form-group no-margin">
        <div class="col-md-offset-6 col-md-4 no-padding">
            <input type="text" required placeholder="Name" name="name" value="{{ $tag->name or '' }}" class="form-control input-sm pull-right tag-name">
        </div>
        <div class="col-md-1 no-padding">
            <button type="submit" class="btn btn-primary btn-sm pull-right save-tag">
                <i class="glyphicon glyphicon-ok"></i>
            </button>
        </div>
        <div class="col-md-1 no-padding">
            <a href="javascript:void(0);" class="btn btn-default btn-sm pull-right cancel-new-tag">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </div>
    </div>
</form>
