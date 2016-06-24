@extends('layouts.main')

@section('content')

    
    <div class="col-md-6 col-md-offset-3">

		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissible {{ Session::has('error') ? '' : 'hide' }}" role="alert">
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p class="alert-text"><strong>Warning!</strong> {{ Session::pull('error', 'Something went wrong!') }}</p>
			</div>
			<div class="alert alert-success alert-dismissible {{ Session::has('success') ? '' : 'hide' }}" role="alert">
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p class="alert-text"><strong>Success!</strong> {{ Session::pull('success', 'Action completed successfully!') }}</p>
			</div>
		</div>

        <div class="heading clearfix">
        	<div class="col-md-4 side-nav left">
            	<div class="item pull-left">
            		<a href="javascript:void(0);" class="btn btn-default btn-sm show-user hide">
                		<i class="glyphicon glyphicon-menu-left"></i>&nbsp;&nbsp;People
            		</a>
            	</div>
        	</div>
            <div class="col-md-4 text-center">
                <h3 class="page-heading">People</h3>
            </div>
            <div class="col-md-4 side-nav right">
            	<div class="item pull-right">
            		<a href="javascript:void(0);" class="btn btn-default btn-sm show-tag">
                		Tags&nbsp;&nbsp;<i class="glyphicon glyphicon-menu-right"></i>
            		</a>
            	</div>
            </div>
        </div>

        <div class="panel-body user-panel">
            <table class="table table-striped">
            	<thead>
            		<th>Name</th>
            		<th>
            			<div class="col-md-12 new-user hide">
            				@include('user.form')
            			</div>
                        <button class="btn btn-primary btn-sm pull-right add-user">
			                <i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Add
			            </button>
            		</th>
            	</thead>
                <tbody>
					@if (count($users) > 0)
	                    @include('home.users', ['users' => $users])
		            @else
			        	<tr class="no-user-rows">
			        		<td colspan="2">
			        			<span class="text-center">No people</span>
			        		</td>
		        		</tr>
			        @endif
                </tbody>
            </table>
        </div>

        <div class="panel-body tag-panel hide">
            <table class="table table-striped">
            	<thead>
            		<th>Name</th>
            		<th>
            			<div class="col-md-12 new-tag hide">
            				@include('tag.form')
            			</div>
                        <button class="btn btn-primary btn-sm pull-right add-tag">
			                <i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Add
			            </button>
            		</th>
            	</thead>
                <tbody>
					@if (count($tags) > 0)
	                    @include('home.tags', ['tags' => $tags])
			        @else
			        	<tr class="no-tag-rows">
			        		<td colspan="2">
			        			<span class="text-center">No tags</span>
			        		</td>
		        		</tr>
			        @endif
                </tbody>
            </table>
        </div>
    </div>

    <div id="user-modal" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="loader">
					<img src="/img/loader.gif" alt="Loading...">
				</div>
				<div class="relatives-data hide"></div>
			</div>
		</div>
	</div>
    
@endsection
