@foreach ($tags as $tag)
	<tr>
	    <td class="table-text">
	        <div>{{ $tag->name }}</div>
	    </td>

	    <td class="text-right">
	    	<div class="col-md-12 new-tag hide">
	    		@include('tag.form', ['tag' => $tag])
	    	</div>
	        <button id="edit-tag-{{ $tag->id }}" class="btn btn-success btn-sm add-tag">
	            <i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit
	        </button>
	    </td>
	</tr>
@endforeach
