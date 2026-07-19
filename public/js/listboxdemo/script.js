
let finalObj = [];

$(document).ready(function() {

 $('#initialList, #finalList').on('change', toggleButtons);

 $('#moveRight').on('click',moveright);
 $('#moveAllRight').on('click',moveright);
 $('#moveLeft').on('click', moveleft);
 $('#moveAllLeft').on('click', moveleft);

 $('#calculateNetSal').on('click', calculatenetsalary);
});


function toggleButtons(){
   

        let initialSelected = $('#initialList option:selected').length;
		let finalSelected = $('#finalList option:selected').length;
		let allowanceTypesLength = $('#initialList option').length;
		let finalObjLength = $('#finalList option').length;

        $('#moveRight').prop('disabled', !(allowanceTypesLength > 0 && initialSelected === 1));
        $('#moveAllRight').prop('disabled', !(allowanceTypesLength > 0 && initialSelected > 1));
        $('#moveLeft').prop('disabled', !(finalObjLength > 0 && finalSelected === 1));
        $('#moveAllLeft').prop('disabled', !(finalObjLength > 0 && finalSelected > 1));
}

function moveright(){

    let selected = $('#initialList option:selected');

    selected.each(function() {
			let data = $(this).val().split('-');
			let itemToPush = { name: data[1], val: data[0] };
            finalObj.push(itemToPush);
			$('#finalList').append('<option value="' + $(this).val() + '" selected>' + data[1] + '</option>');
            console.log($('#finalList').html());
			$(this).remove();
        });
        toggleButtons();
}
function moveleft(){
let selected = $('#finalList option:selected');

selected.each(function() {
    let data = $(this).val().split('-');
    $('#initialList').append('<option value="' + $(this).val() + '">' + data[1] + '</option>');

    let index = finalObj.findIndex(item => item.name === data[1]);
	finalObj.splice(index, 1);
	$(this).remove();
});
toggleButtons();
}

function calculatenetsalary(){

    let salary = parseFloat($('#salary').val());
    let totalAllowancePercentage = finalObj.reduce((total, item) => total + parseFloat(item.val), 0);

    let allowance = (salary * totalAllowancePercentage) / 100;
	let netSal = salary + allowance;

		$('#allowance').val(allowance);
		$('#netSal').val(netSal);

}