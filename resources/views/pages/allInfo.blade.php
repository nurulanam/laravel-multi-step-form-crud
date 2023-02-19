@extends('master')
@section('extraCss')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0 text-center">All Informations</h4>
                        <a href="{{ route('form.index') }}" class="btn btn-success">Add data</a>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10px;">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                                value="option">
                                        </div>
                                    </th>
                                    <th>SL.</th>
                                    <th>Profile</th>
                                    <th>E-mail</th>
                                    <th>Name</th>
                                    <th>Address 1</th>
                                    <th>Address 2</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>Country</th>
                                    <th>Job Title</th>
                                    <th>Job Desc</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($informations as $key => $info)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                    value="option1">
                                            </div>
                                        </th>
                                        <td>{{ $key += 1 }}</td>
                                        <td>
                                            <img src="{{ asset('assets/images/profileImages'.'/'.$info->profile_image) }}" alt="Profile Image" style="max-height: 60px;">
                                        </td>
                                        <td>{{ $info->email }}</td>
                                        <td>{{ $info->name }}</td>
                                        <td>{{ $info->address_line_1 }}</td>
                                        <td>{{ $info->address_line_2 }}</td>
                                        <td>{{ $info->city }}</td>
                                        <td>{{ $info->zip_code }}</td>
                                        <td>{{ $info->country }}</td>
                                        <td>{{ $info->job_title }}</td>
                                        <td>{{ $info->job_description }}</td>
                                        <td><a href="{{ asset('assets/documents/'.$info->document) }}" target="_blank">Click here</a></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('form.editdata', $info->id) }}" class="dropdown-item edit-item-btn" >
                                                            <i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted">
                                                            </i>
                                                            Edit</a>
                                                        </li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn" data-bs-toggle="modal" data-bs-target="#delete{{ $info->id }}">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </a>

                                                    </li>
                                                </ul>
                                            </div>
                                        </td>


                                        <!-- Default Modals -->
                                        <<div id="delete{{ $info->id }}" class="modal fade" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-danger" id="deleteModallabel">Confirmation Message</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are Your Sure To Delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('form.destroy', $info->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger ">Delete</button>
                                                        </form>

                                                    </div>

                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extraJS')
    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>
@endsection
