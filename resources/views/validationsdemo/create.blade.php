 @extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Add New Candidate</h1>
        </div>
        <form action="{{ route('validationsdemo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0" style="padding-left: 20px; list-style: disc;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
      


            <div class="form-group mb-3">
                <label for="firstname">Name</label>
                <input type="text" name="firstname" placeholder="First Name" class="form-control"
                    value="{{ old('firstname') }}">
                @error('firstname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" placeholder="Last Name" class="form-control"
                    value="{{ old('lastname') }}">
                @error('lastname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="middlename">Middle Name</label>
                <input type="text" name="middlename" placeholder="Middle Name" class="form-control"
                    value="{{ old('middlename') }}">
                @error('middlename')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="gender">Gender:</label>
                <div>
                    <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                    Male
                    <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                    Female
                    <input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                    Other
                </div>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="birthdate">Birthdate</label>
                <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate') }}">
                @error('birthdate')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="hiredate">Hire Date</label>
                <input type="date" name="hiredate" class="form-control" value="{{ old('hiredate') }}">
                @error('hiredate')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" placeholder="Phone" class="form-control" value="{{ old('phone') }}">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="postalcode">Postal Code</label>
                <input type="text" name="postalcode" placeholder="Postal Code" class="form-control"
                    value="{{ old('postalcode') }}">
                @error('postalcode')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="websiteurl">Website URL</label>
                <input type="text" name="websiteurl" placeholder="Website URL" class="form-control"
                    value="{{ old('websiteurl') }}">
                @error('websiteurl')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group mb-3">
                <label for="role">Role:</label>
                <select name="role" class="form-control">
                    <option value="">Select</option>
                    <option value="regular" {{ old('role') == 'regular' ? 'selected' : '' }}>Regular</option>
                    <option value="moderator" {{ old('role') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="age" class="col-form-label">Age:</label>
                <input type="number" name="age" class="form-control" value="{{ old('age') }}">
                @error('age')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="salary" class="col-form-label">Salary:</label>
                <input type="text" name="salary" class="form-control" value="{{ old('salary') }}">
                @error('salary')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="profile_picture" class="col-form-label">Profile Picture:</label>
                <input type="file" name="profile_picture" class="form-control">
                @error('profile_picture')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="amount" class="col-form-label">Amount:</label>
                <input type="text" name="amount" class="form-control" value="{{ old('amount') }}">
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="secondary_email" class="col-form-label">Secondary Email:</label>
                <input type="email" name="secondary_email" class="form-control" value="{{ old('secondary_email') }}">
                @error('secondary_email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group mb-3">
                <input type="checkbox" name="termsandconditions"> Accept Terms
                @error('termsandconditions')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
 