
$(document).ready(function() {

 $('#selectAll').on('click', toggleCheckboxes);
 $('.employee-checkbox').on('click',toggleheadercheckbox);
});

// Select all checkboxes
	function toggleCheckboxes() {
        
		$('.employee-checkbox').prop('checked', this.checked);
	};

    // Deselect "select all" if any checkbox is unchecked
	function toggleheadercheckbox() {
		if (!$(this).prop('checked')) {
			$('#selectAll').prop('checked', false);
		}
	};

