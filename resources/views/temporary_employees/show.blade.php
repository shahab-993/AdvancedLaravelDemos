@extends('layouts.app')

@section('content')

<div class="container py-4">


<div class="card shadow-sm">
    <div class="card-header">
        <h2 class="mb-0">Employee Details</h2>
    </div>

    <div class="card-body">

        <!-- Employee Information -->
        <div class="row mb-4">

            <div class="col-md-6">
                <p class="mb-2">
                    <strong>First Name:</strong>
                    {{ $employee->first_name }}
                </p>
            </div>

            <div class="col-md-6">
                <p class="mb-2">
                    <strong>Last Name:</strong>
                    {{ $employee->last_name }}
                </p>
            </div>

        </div>

        <hr>

        <!-- CV -->
        <div class="mb-4">
            <h5 class="mb-2">CV</h5>

            <p class="text-muted">
                {{ $employee->cv }}
            </p>

            <a href="{{ Storage::disk('public')->url($employee->cv) }}"
               class="btn btn-primary btn-sm"
               download>
                <i class="bi bi-download"></i>
                Download CV
            </a>
        </div>

        <hr>

        <!-- Photo -->
        <div class="mb-4">
            <h5 class="mb-3">Photo</h5>

            <img src="{{ Storage::disk('public')->url($employee->photo) }}"
                 alt="Employee Photo"
                 class="img-thumbnail"
                 style="width: 180px; height: 180px; object-fit: cover;">
        </div>

        <hr>

        <!-- PAN Card -->
        <div class="mb-4">
            <h5 class="mb-3">PAN Card</h5>

            <img src="data:image/jpeg;base64,{{ base64_encode($employee->pan_card) }}"
                 alt="Employee PAN Card"
                 class="img-thumbnail"
                 style="width: 250px; max-height: 180px; object-fit: contain;">
        </div>

        <hr>

        <!-- Certificates -->
        <div class="mb-4">
            <h5 class="mb-3">Certificates</h5>

            @if ($employee->certificates->count())

                <div class="list-group">

                    @foreach ($employee->certificates as $certificate)

                        <div class="list-group-item d-flex justify-content-between align-items-center">

                            <div>
                                <i class="bi bi-file-earmark me-2"></i>
                                <span>
                                    {{ basename($certificate->certificate_name) }}
                                </span>
                            </div>

                            <a href="{{ Storage::disk('public')->url($certificate->certificate_name) }}"
                               class="btn btn-outline-primary btn-sm"
                               download>
                                <i class="bi bi-download"></i>
                                Download
                            </a>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="alert alert-secondary mb-0">
                    No certificates uploaded.
                </div>

            @endif

        </div>

    </div>

    <!-- Footer -->
    <div class="card-footer">

        <a href="{{ route('temporary-employees.index') }}"
           class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Back to Employee List
        </a>

    </div>

</div>
```

</div>

@endsection
