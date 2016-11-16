(function($) {

	/**
	 * INSERT FORM
	 */
	$('#add-form').find('#text').val('').focus();


	/**
	 * EDIT FORM
	 */
	$('#edit-form').find('#text').select();


	/**
	 * DELETE FORM
	 */
	$('#delete-form').on('submit', function(event) {
		return confirm('for sure?');
	});

}(jQuery));