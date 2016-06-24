<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<h4 class="modal-title text-center">Add {{ $user->name }}'s Relationships</h4>
</div>
<div class="modal-body padded-modal">
	<h5>Select person and their relationship</h5>
	
	<form action="/user/{{ $user->id }}/relative" method="POST" class="form-horizontal tag-form">
	    {{ csrf_field() }}
	    {{ method_field('PUT') }}

	    <div class="form-group">
	        <div class="col-md-5">
	        	<select required placeholder="Related person" name="relative" class="form-control select2-control-relative">
	        		<option value="0">Select Person</option>
	        		option
	        		@foreach ($users as $person)
	        			@if ($person->id != $user->id)
		        			<option value="{{ $person->id }}">{{ $person->name }}</option>
	        			@endif
	        		@endforeach
	        	</select>
	        </div>
	        <div class="col-md-5">
	        	<select required placeholder="Relation" name="tag" class="form-control select2-control-tag">
		        	<option value="0">Select Relation</option>
	        		@foreach ($tags as $tag)
	        			<option value="{{ $tag->id }}">{{ $tag->name }}</option>
	        		@endforeach
	        	</select>
	        </div>
	        <div class="col-md-2">
	            <button type="submit" class="btn btn-default">
	                <i class="glyphicon glyphicon-ok"></i> Add
	            </button>
	        </div>
	    </div>
	</form>

	<table class="table table-striped">
    	<thead>
    		<th>Person</th>
    		<th>Tag</th>
    		<th>Relative</th>
    	</thead>
        <tbody>
        	@if (count($relatives) > 0)
                @foreach ($relatives as $relative)
					<tr>
		                <td class="table-text">
		                    <div>{{ $user->name }}</div>
		                </td>
		                <td class="table-text">
		                    <div>{{ $relative->getTag($user)->name }}</div>
		                </td>
		                <td class="table-text">
		                    <div>{{ $relative->name }}</div>
		                </td>
		            </tr>
		        @endforeach
		    @else
	        	<tr class="no-relation-tags">
	        		<td colspan="3">
	        			<span class="text-center">No relations</span>
	        		</td>
        		</tr>
	        @endif
        </tbody>
    </table>

</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>