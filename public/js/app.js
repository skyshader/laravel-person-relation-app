$(document).ready(function() {
	$('.show-tag').click(function(e) {
		e.preventDefault();
		$('.user-panel').addClass('hide');
		$('.tag-panel').removeClass('hide');
		$(this).addClass('hide');
		$('.show-user').removeClass('hide');
		$('.page-heading').text('Tags');
		$('.cancel-new-user').click();
	});

	$('.show-user').click(function(e) {
		e.preventDefault();
		$('.tag-panel').addClass('hide');
		$('.user-panel').removeClass('hide');
		$(this).addClass('hide');
		$('.show-tag').removeClass('hide');
		$('.page-heading').text('People');
		$('.cancel-new-tag').click();
	});

	$('.add-user').click(function() {
		$(this).addClass('hide');
		$('.new-user').removeClass('hide');
		$('.new-user').find('.user-name').focus();
	});

	$('.cancel-new-user').click(function(e) {
		e.preventDefault();
		$('.new-user').addClass('hide');
		$('.add-user').removeClass('hide');
		$(this).closest('.new-user').find('.user-form input[type="text"]').val('');
	});

	$(document).on('click', '.add-tag', function() {
		$(this).addClass('hide');
		var tag_form = $(this).siblings('.new-tag');
		tag_form.removeClass('hide');
		tag_form.find('.tag-name').focus();
	});

	$(document).on('click', '.cancel-new-tag', function(e) {
		e.preventDefault();
		cancelTagForm($(this));
	});

	$('.alert-dismissible .close').click(function() {
		$(this).closest('.alert').addClass('hide');
		$(this).closest('.alert').find('.alert-text').html('');
	});

	$('.user-form').submit(function(e) {
		e.preventDefault();
		var url = $(this).attr('action');
		var data = $(this).serialize();
		var that = $(this);
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			dataType: 'json',
			beforeSend: function() {
				that.find('.user-name').prop('disabled', true);
				$('.save-user').prop('disabled', true);
			},
			success: function(response) {
				that.find('.user-name').prop('disabled', false);
				$('.save-user').prop('disabled', false);
				if(response.success && response.content) {
					populateTable('user', response.content);
				}
			},
			error: function(xhr, textStatus, error) {
				that.find('.user-name').prop('disabled', false);
				$('.save-user').prop('disabled', false);
				if(error === 'Unprocessable Entity') {
					var errorJson = JSON.parse(xhr.responseText);
					if(errorJson.name && errorJson.name.length > 0) {
						that.find('.user-name').focus();
						showError(errorJson.name[0]);
					}
				} else {
					console.log('Something went wrong!');
				}
			}
 		});
	});

	$('.tag-form').submit(function(e) {
		e.preventDefault();
		var url = $(this).attr('action');
		var data = $(this).serialize();
		var that = $(this);
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			dataType: 'json',
			beforeSend: function() {
				that.find('.tag-name').prop('disabled', true);
				$('.save-tag').prop('disabled', true);
			},
			success: function(response) {
				that.find('.tag-name').prop('disabled', false);
				$('.save-tag').prop('disabled', false);
				if(response.success && response.content) {
					populateTable('tag', response.content);
				}
			},
			error: function(xhr, textStatus, error) {
				that.find('.tag-name').prop('disabled', false);
				$('.save-tag').prop('disabled', false);
				if(error === 'Unprocessable Entity') {
					var errorJson = JSON.parse(xhr.responseText);
					if(errorJson.name && errorJson.name.length > 0) {
						that.find('.tag-name').focus();
						showError(errorJson.name[0]);
					}
				} else {
					console.log('Something went wrong!');
				}
			}
 		});
	});

	$(document).on('click', '.edit-user', function() {
		var user_id = $(this).data('user');
		$.ajax({
			type: 'GET',
			url: '/user/' + user_id + '/relatives',
			dataType: 'html',
			beforeSend: function() {
				$('.modal .relatives-data').addClass('hide');
				$('.modal .loader').removeClass('hide');
			},
			success: function(response) {
				$('.modal .relatives-data').removeClass('hide').html(response);
				$('.modal .loader').addClass('hide');
				$('.select2-control-relative').select2({
					placeholder: 'Select Relative'
				});
				$('.select2-control-tag').select2({
					placeholder: 'Select Relation'
				});
			},
			error: function(xhr, textStatus, error) {
				$('.modal .loader').addClass('hide');
				$('.modal .relatives-data').removeClass('hide');
				$('.modal .relatives-data').html('<p class="error-box">Something went wrong!</p>')
			}
		});
	});

	$.fn.modal.Constructor.prototype.enforceFocus = function() {};
});

function showError(msg) {
	$('.alert.alert-danger').find('.alert-text').html('<strong>Error!</strong> ' + msg);
	$('.alert.alert-danger').removeClass('hide');
	setTimeout(function() {
		$('.alert.alert-danger.alert-dismissible .close').click();
	}, 4000);
}

function populateTable(table, data) {
	$('.' + table + '-panel tbody').html(data);

	if(!$('.no-' + table + '-rows').hasClass('hide'))
		$('.no-' + table + '-rows').addClass('hide');

	$('.cancel-new-' + table).click();
}

function cancelTagForm(that, clear = true) {
	that.closest('.new-tag').addClass('hide');
	that.closest('.new-tag').siblings('.add-tag').removeClass('hide');
	if(clear) that.closest('.new-tag').find('.tag-form input[type="text"]').val('');
}