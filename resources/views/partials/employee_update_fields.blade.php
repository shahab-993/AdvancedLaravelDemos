<tr data-id="{{ $employee->id }}">
    <input type="hidden" name="employees[{{ $employee->id }}][id]" value="{{ $employee->id }}">


    <td>
        <input type="text" class="form-control" name="employees[{{ $employee->id }}][first_name]"
            value="{{ $employee->first_name }}">
    </td>

    <td>
        <input type="text" class="form-control" name="employees[{{ $employee->id }}][last_name]"
            value="{{ $employee->last_name }}">
    </td>

    <td>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="employees[{{ $employee->id }}][title_name]"
                value="Mr" {{ $employee->title_name == 'Mr' ? 'checked' : '' }}> Mr
        </div>

        <div class="form-check">
            <input type="radio" class="form-check-input" name="employees[{{ $employee->id }}][title_name]"
                value="Mrs" {{ $employee->title_name == 'Mrs' ? 'checked' : '' }}> Mrs
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="employees[{{ $employee->id }}][title_name]"
                value="Ms" {{ $employee->title_name == 'Ms' ? 'checked' : '' }}> Ms
        </div>
    </td>

    <td>
        <input type="hidden" name="employees[{{ $employee->id }}][has_passport]" value="0">

        <input type="checkbox" class="form-check-input" name="employees[{{ $employee->id }}][has_passport]"
            value="1" {{ $employee->has_passport ? 'checked' : '' }}>
    </td>

    <td>
        <input type="number" class="form-control" name="employees[{{ $employee->id }}][salary]"
            value="{{ $employee->salary }}">
    </td>
    <td>
        <input type="email" class="form-control" name="employees[{{ $employee->id }}][email]"
            value="{{ $employee->email }}">
    </td>
    <td>
        <input type="text" class="form-control" name="employees[{{ $employee->id }}][phone_number]"
            value="{{ $employee->phone_number }}">
    </td>

    <td>
        <select class="form-control" name="employees[{{ $employee->id }}][department_id]">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
    </td>

    <td>
        <select class="form-control" name="employees[{{ $employee->id }}][country_id]">
            @foreach ($countries as $country)
                <option value="{{ $country->id }}" {{ $employee->country_id == $country->id ? 'selected' : '' }}>
                    {{ $country->name }}
                </option>
            @endforeach
        </select>
    </td>
</tr>
