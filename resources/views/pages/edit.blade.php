@extends('master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0 text-center">Multi Step Form Submission</h4>
                        <a href="{{ route('form.allData') }}" class="btn btn-success">Show All</a>
                    </div><!-- end card header -->
                    <div class="card-body form-steps">
                        <form action="{{ route('form.updateData', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="step-arrow-nav mb-4">
                                <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill"
                                            data-bs-target="#steparrow-gen-info" type="button" role="tab"
                                            aria-controls="steparrow-gen-info" aria-selected="true">General</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="steparrow-address-tab" data-bs-toggle="pill"
                                            data-bs-target="#steparrow-address" type="button" role="tab"
                                            aria-controls="steparrow-address" aria-selected="true">Address</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="steparrow-job-description-info-tab"
                                            data-bs-toggle="pill" data-bs-target="#steparrow-job-description-info"
                                            type="button" role="tab" aria-controls="steparrow-job-description-info"
                                            aria-selected="false">Job Details</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="steparrow-file-info-tab" data-bs-toggle="pill"
                                            data-bs-target="#steparrow-file-info" type="button" role="tab"
                                            aria-controls="steparrow-file-info" aria-selected="false">Attach
                                            Files</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="steparrow-gen-info" role="tabpanel"
                                    aria-labelledby="steparrow-gen-info-tab">
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="email">Email <span class="text-danger"
                                                            title="requried">*</span></label>
                                                    <input type="email" name="email" value="{{ $data->email }}"
                                                        class="form-control" id="email" placeholder="Enter Email">
                                                    @error('email')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name">Name <span class="text-danger"
                                                            title="requried">*</span></label>
                                                    <input type="text" name="name" value="{{ $data->name }}"
                                                        class="form-control" id="name" placeholder="Enter Name">
                                                    @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start gap-3 mt-4">
                                        <button type="button"
                                            class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                            data-nexttab="steparrow-address-tab"><i
                                                class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next</button>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                                <div class="tab-pane fade show" id="steparrow-address" role="tabpanel"
                                    aria-labelledby="steparrow-address-tab">
                                    <div>
                                        <div class="mb-3">
                                            <label class="form-label" for="address_line_1">Address Line 1 <span
                                                    class="text-danger" title="requried">*</span></label>
                                            <input type="text" name="address_line_1"
                                                value="{{ $data->address_line_1 }}" class="form-control"
                                                id="address_line_1" placeholder="Enter Address Line 1">
                                            @error('address_line_1')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="address_line_2">Address Line 2</label>
                                            <input type="text" name="address_line_2"
                                                value="{{ $data->address_line_2 }}" class="form-control"
                                                id="address_line_2" placeholder="Enter Address Line 2">
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label" for="city">City</label>
                                                <input type="text" name="city" value="{{ $data->city }}"
                                                    class="form-control" id="city" placeholder="Enter your City">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="zip_code">Zip Code <span
                                                    class="text-danger" title="requried">*</span></label>
                                                <input type="number" name="zip_code" value="{{ $data->zip_code }}"
                                                    class="form-control" id="zip_code"
                                                    placeholder="Enter your Zip Code">
                                                    @error('zip_code')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="country">Country <span
                                                        class="text-danger" title="requried">*</span></label>
                                                <input type="text" name="country" value="{{ $data->country }}"
                                                    class="form-control" id="country" placeholder="Enter your Country">
                                                @error('country')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start gap-3 mt-4">
                                        <button type="button" class="btn btn-light btn-label previestab"
                                            data-previous="steparrow-gen-info-tab"><i
                                                class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back
                                            to General</button>
                                        <button type="button"
                                            class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                            data-nexttab="steparrow-job-description-info-tab"><i
                                                class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next</button>
                                    </div>
                                </div>
                                <!-- end tab pane -->

                                <div class="tab-pane fade show" id="steparrow-job-description-info" role="tabpanel"
                                    aria-labelledby="steparrow-job-description-info-tab">
                                    <div>
                                        <div class="mb-3">
                                            <label for="job_title" class="form-label">Job Title <span
                                                class="text-danger" title="requried">*</span></label>
                                            <input class="form-control" name="job_title" value="{{ $data->job_title }}"
                                                type="text" id="job_title" placeholder="Enter Job Title">
                                            @error('job_title')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="form-label" for="job-description">Description</label>
                                            <textarea class="form-control" name="job_description"
                                                placeholder="Enter Job Description" id="job-description" rows="3">{{ $data->job_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start gap-3 mt-4">
                                        <button type="button" class="btn btn-light btn-label previestab"
                                            data-previous="steparrow-address-tab"><i
                                                class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back
                                            to Address</button>
                                        <button type="button"
                                            class="btn btn-success btn-label right ms-auto nexttab nexttab"
                                            data-nexttab="steparrow-file-info-tab"><i
                                                class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next</button>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                                <div class="tab-pane fade show " id="steparrow-file-info" role="tabpanel"
                                    aria-labelledby="steparrow-file-info-tab">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <img id="profile_image_preview" class="img-fluid img-thumbnail shadow"
                                                src="{{ asset('assets/images/profileImages/'.$data->profile_image) }}" alt="teacher avater"
                                                style="border: 5px solid rgba(0, 0, 0, 0.151); max-height: 100px;">
                                            <p>Profile Preview</p>
                                        </div>
                                        <div class="col-md-9">
                                            <label for="profile_image" class="form-label">Profile Image </label>
                                            <input class="form-control" type="file" name="profile_image"
                                                id="profile_image" onchange="loadPreview(this);">
                                                @error('profile_image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <div class="mt-3">
                                                <label for="document" class="form-label">Document (CV/Resume)</label>
                                                <input class="form-control" type="file" name="document"
                                                    id="document">
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(() => {
                                                $('#profile_image').change(function() {
                                                    const file = this.files[0];
                                                    console.log(file);
                                                    if (file) {
                                                        let reader = new FileReader();
                                                        reader.onload = function(event) {
                                                            console.log(event.target.result);
                                                            $('#profile_image_preview').attr('src', event.target.result);
                                                        }
                                                        reader.readAsDataURL(file);
                                                    }
                                                });
                                            });
                                        </script>
                                    </div>

                                    <div class="d-flex align-items-start gap-3 mt-4">
                                        <button type="button" class="btn btn-light btn-label previestab"
                                            data-previous="steparrow-job-description-info-tab"><i
                                                class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back
                                            to Job Details</button>
                                        <button class="btn btn-success btn-label right ms-auto"><i
                                                class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Update</button>
                                    </div>
                                </div>
                                <!-- end tab pane -->

                            </div>
                            <!-- end tab content -->
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div><!-- end row -->

    </div>
@endsection
