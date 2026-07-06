@forelse ($employees as $employee )
<tr>
    <td>{{ $employee->first_name }}</td>
    <td>{{ $employee->last_name }}</td>
    <td>{{ $employee->title_name }}</td>
    <td>{{ $employee->email }}</td>
    <td>{{ $employee->department ? $employee->department->name : 'N/A' }}</td>
    <td>{{ $employee->country ? $employee->country->name : 'N/A'}}</td>
</tr> 
    
@empty
<div colspan="6" class="text-center">No data found!</div>
    
@endforelse