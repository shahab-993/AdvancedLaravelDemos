function CalculateAllowances(){
    var salary= parseFloat($('#Salary').val());

   var selectedAllowance = $('input[name="AllowanceTypeID"]:checked');
    if(selectedAllowance.length && salary){
        var allowancePercentage =parseFloat(selectedAllowance.attr('data-percentage'));
        var allowanceAmount =salary * (allowancePercentage / 100);
        var netSalary = salary + allowanceAmount;
        $('#AllowanceAmount').val(allowanceAmount.toFixed(2));
        $('#NetSalary').val(netSalary.toFixed(2));

    }

}