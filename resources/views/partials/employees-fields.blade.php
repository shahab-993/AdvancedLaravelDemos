<table class="table">
    <tbody>
        <tr>
            <td>
                <input type="text" name="employees[][first_name]" placeholder="Enter First Name " class="form-control">
            </td>
            <td>
                <input type="text" name="employees[][last_name]" placeholder="Enter First Name " class="form-control">
            </td>
            <td>
                <input type="checkbox" name="employees[][has_passport]" value="1">Has Passport
            </td>
            <td>
                <label for="">
                    <input type="radio" name="employees[][title_name]" value="Mr">Mr
                </label>
                <label for="">
                    <input type="radio" name="employees[][title_name]" value="Ms">Ms
                </label>
                <label for="">
                    <input type="radio" name="employees[][title_name]" value="Mrs">Mrs
                </label>
            </td>
            <td>
                <input type="date" name="employees[][birth_date]" placeholder=" Enter Birth Date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='tex')">
            </td>
            <td>
                <input type="date" name="employees[][hire_date]" placeholder=" EnterHere Date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='tex')">
            </td>
            <td>
                <input type="email" name="employees[][email]" placeholder="Enter Email" class="form-contrl" >

            </td>
            <td>
                <input type="text" name="employees[][phone_number]" placeholder="Enter Phone number" class="form-contrl" >

            </td>
            <td>
                <select name="employees[][department_id]" id="" class="form-control">
                    <option value="">Select Department</option>
                    @foreach ($departments as $department )
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                        
                    @endforeach
                </select>
            </td>
            <td>
                <select name="employees[][country_id]" id="" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country )
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                        
                    @endforeach
                </select>
            </td> 
            <td>
                <button type="button" class="btn btn-danger" onclick="removeEmployee(this)">Remove</button>
            </td>

        </tr>
    </tbody>

</table>