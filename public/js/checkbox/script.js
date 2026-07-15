function CalculateSalary(){
     var salary= parseFloat($('#Salary').val()) || 0;
     var totleAllowance=0;
    $('input[name="AllowanceTypeID[]"]:checked').each(function(){
        var percentage =parseFloat($(this).data('percentage')) || 0;
        totleAllowance +=salary *(percentage / 100);
    });
    var netSalary=salary+totleAllowance;
     $('#AllowanceAmount').val(totleAllowance.toFixed(2));
     $('#NetSalary').val(netSalary.toFixed(2));
}