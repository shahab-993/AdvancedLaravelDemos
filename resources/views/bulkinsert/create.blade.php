@extends('layouts.app')
@section('content')
<h1>Bulk Insert Employees</h1>
<br><br>
<form action="{{ route('bulkinserts.store') }}" method="POST">
    @csrf
    <div id="employee-container">

    </div>
    

    <template id="employee-template">
        <div class="">
            @include('partials.employees-fields',[
            'departments'=>$departments,
            'countries'=>$countries,
            ])
        </div>
        
    </template>

    <button type="button" class="btn btn-success" onclick="addEmployee()">Add Row</button><br><br>
    <button type="submit" class="btn btn-primary">Bulk Insert Employees</button>
</form>
 

<script>
    let employeeIndex = 0;

    function addEmployee() {

        const template = document.querySelector('#employee-template').content.cloneNode(true);

        const employeeFields = template.querySelectorAll('input, select');
        
            employeeFields.forEach(field => {
                field.name = field.name.replace(
                    '[][',
                    `[${employeeIndex}][`
                );
            });
 
        document.querySelector('#employee-container').appendChild(template);
        employeeIndex++;

    }

    function removeEmployee(button) {
        button.closest('tr').remove();

    }
</script>

@endsection