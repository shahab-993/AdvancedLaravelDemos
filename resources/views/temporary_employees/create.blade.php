@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Create Temporary Employee</h1>

        <form action="{{ route('temporary-employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- First Name -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                    name="first_name" value="{{ old('first_name') }}">
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                    name="last_name" value="{{ old('last_name') }}">
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- CV -->
            <div class="mb-3">
                <label for="cv" class="form-label">CV</label>
                <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv">
                @error('cv')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Photo -->
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                    name="photo">
                @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PAN Card -->
            <div class="mb-3">
                <label for="pan_card" class="form-label">PAN Card</label>
                <input type="file" class="form-control @error('pan_card') is-invalid @enderror" id="pan_card"
                    name="pan_card">
                @error('pan_card')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3" id="certificate-section">
                <label class="form-label">Certificates</label>
                <button type="button" class="btn btn-outline-secondary" onclick="addCertificate()">
                    <i class="bi bi-plus-circle"></i> Add Certificate
                </button>
                <div id="certificate-components">
                    <!--component instances-->
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('temporary-employees.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to Employee List
            </a>
        </form>
    </div>

    <script>
        const maxCertCount = {{ config('app.max_certificates', 10) }};
        let certCount = 0;


        function addCertificate() {
            if (certCount < maxCertCount) {
                const componentHtml = `
                    @component('components.upload-certificates')
                    @endcomponent
                `;
                $('#certificate-components').append(componentHtml);
                certCount++;
            }
        }

        $(document).on('click', '.remove-cert', function() {
            $(this).closest('.certificate-input').remove();
            certCount--;
        });
    </script>
@endsection
