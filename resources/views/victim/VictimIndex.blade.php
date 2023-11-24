@extends('layouts.master')
@section('contain')
    <div class="row page-titles"
        style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Victim Management</h3>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li><a class="breadcrumb-item active" href="{{ url('/') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item active">User Table</li> --}}
                </ol>
                {{-- <a href="{{ Route('address.swform') }}"><button type="button"
                    class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create
                    New</button></a> --}}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- <h6 class="card-subtitle">Data table example</h6> --}}
            <div class="table-responsive" style="font-size: small;">
                <table id="myTablenanny" class="table table-striped border dataTable no-footer">
                    <thead>
                        <tr style="background-color: gray " class="text-white">
                            <th>S.No</th>
                            <th>Form Id</th>
                            <th>CNIC</th>
                            <th>Occupant Name</th>
                            <th>Gender</th>
                            <th>District</th>
                            <th>Tehsil</th>
                            <th>Union Council</th>
                            <th>Deh</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            $num = 1;
                        @endphp
                        @foreach ($victims as $victim)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>{{ $victim->filled_da_form_id ?? '-' }}</td>
                                <td>{{ $victim->da_cnic ?? '-' }}</td>
                                <td>{{ $victim->da_occupant_name ?? '-' }}</td>
                                <td>{{ $victim->gender ?? '-' }}</td>
                                <td>{{ $victim->tehsil ?? '-' }}</td>
                                <td>{{ $victim->union_council ?? '-' }}</td>
                                <td>{{ $victim->district ?? '-' }}</td>
                                <td>{{ $victim->deh ?? '-' }}</td>
                                <td><a type="button" title="info" onclick="openSurveyModal({{ json_encode($victim) }})">
                                        <i class="fa fa-info-circle" style="font-size: 20px; color: rgb(71, 181, 196)"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="surveyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="font-size: small;    width: 80%; margin-left: 14%;">
                <div class="modal-header bg-primary text-white"
                    style="background: linear-gradient(45deg, #01c0c8c2, transparent);">
                    <h5 class="modal-title" id="surveyModalLabel">Survey Questions and Answers</h5>
                    {{-- <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"> --}}
                    {{-- <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    {{-- <h3 id="surveyName" class="text-primary"></h3> --}}
                    <ul id="surveyContent" class="list-group">
                        <!-- Questions and answers will be populated here -->
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        // function openSurveyModal(victim) {
        //     const modal = $('#surveyModal');
        //     modal.find('.modal-title').text('Victim Details');
        //     modal.find('.modal-body').empty();

        //     const victimDetails = [
        //         'widows',
        //         'women_with_disable_husband',
        //         'divorced_abandoned_unmarried_older_dependent_on_others',
        //         'people_with_disability_physically_or_mentally',
        //         'unaccompained_minors_i_e_orphans',
        //         'unaccompained_elders_over_the_age_of_60',
        //     ];

        //     victimDetails.forEach((detail) => {
        //         const row = $(
        //         '<div class="row mb-2 align-items-center"></div>'); // Added margin-bottom and align-items-center classes
        //         const label = $('<div class="col-md-6 text-md-start"><strong>' + capitalizeFirstLetter(detail
        //             .replace(/_/g, ' ')) + ':</strong></div>');
        //         const value = $('<div class="col-md-6 text-md-center"><span class="badge bg-' + (victim[detail] == 0 ?
        //             'warning' : 'success') + '">' + (victim[detail] == 0 ? 'No' : 'Yes') + '</span></div>');
        //         row.append(label, value);
        //         modal.find('.modal-body').append(row);
        //     });

        //     modal.modal('show');
        // }

        function swalll(id) {
            event.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary field !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var formId = "delete-form-" + id;
                        document.getElementById(formId).submit();
                        // swal("Poof! Your imaginary file has been deleted!", {
                        //     icon: "success",
                        // });
                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });
        }

        // $(function() {
        //     $('#myTablenanny').DataTable({
        //         "processing": true,
        //         "serverSide": true,
        //         "ajax": {
        //             "url": "{{ route('victim.index') }}",
        //             "type": "GET",
        //         },
        //         "columns": [
        //             {"data": "id"},
        //             {"data": "filled_da_form_id"},
        //             {"data": "da_cnic"},
        //             {"data": "da_occupant_name"},
        //             {"data": "gender"},
        //             {"data": "tehsil"},
        //             {"data": "union_council"},
        //             {"data": "district"},
        //             {"data": "deh"},
        //             {
        //                 "data": null,
        //                 "render": function (data, type, row) {
        //                     return '<a href="#" class="openSurveyModalBtn" data-victim=\'' + JSON.stringify(row) + '\'>' +
        //                        '<i class="fa fa-info-circle" style="font-size: 20px; color: rgb(71, 181, 196)"></i>' +
        //                        '</a>';
        //                 }
        //             },
        //         ],
        //         columnDefs: [{
        //             orderable: false,
        //             "targets": [9]
        //         }]
        //     });

        //     // Event delegation for the button click
        //     $('#victimTable tbody').on('click', '.openSurveyModalBtn', function (e) {
        //         e.preventDefault();
        //         var victimData = $(this).data('victim');
        //         openSurveyModal(victimData);
        //     });

        //     var table = $('#example').DataTable({
        //         "columnDefs": [{
        //             "visible": false,
        //             "targets": 2
        //         }],
        //         "order": [
        //             [2, 'asc']
        //         ],
        //         "displayLength": 25,
        //         "drawCallback": function(settings) {
        //             var api = this.api();
        //             var rows = api.rows({
        //                 page: 'current'
        //             }).nodes();
        //             var last = null;
        //             api.column(2, {
        //                 page: 'current'
        //             }).data().each(function(group, i) {
        //                 if (last !== group) {
        //                     $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
        //                         '</td></tr>');
        //                     last = group;
        //                 }
        //             });
        //         }
        //     });
        //     // Order by the grouping
        //     $('#example tbody').on('click', 'tr.group', function() {
        //         var currentOrder = table.order()[0];
        //         if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
        //             table.order([2, 'desc']).draw();
        //         } else {
        //             table.order([2, 'asc']).draw();
        //         }
        //     });
        //     // responsive table
        //     $('#config-table').DataTable({
        //         responsive: true
        //     });
        //     $('#example23').DataTable({
        //         dom: 'Bfrtip',
        //         buttons: [
        //             'copy', 'csv', 'excel', 'pdf', 'print'
        //         ]
        //     });
        //     $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
        //         'btn btn-primary me-1');
        // });
        function openSurveyModal(victim) {
            const modal = $('#surveyModal');
            modal.find('.modal-title').text('Victim Details');
            modal.find('.modal-body').empty();

            const victimDetails = [
                'widows',
                'women_with_disable_husband',
                'divorced_abandoned_unmarried_older_dependent_on_others',
                'people_with_disability_physically_or_mentally',
                'unaccompained_minors_i_e_orphans',
                'unaccompained_elders_over_the_age_of_60',
            ];

            victimDetails.forEach((detail) => {
                const row = $('<div class="row mb-2 align-items-center"></div>');
                const label = $('<div class="col-md-6 text-md-start"><strong>' + capitalizeFirstLetter(detail
                    .replace(/_/g, ' ')) + ':</strong></div>');
                const value = $('<div class="col-md-6 text-md-center"><span class="badge bg-' + (victim[detail] ==
                    0 ?
                    'warning' : 'success') + '">' + (victim[detail] == 0 ? 'No' : 'Yes') + '</span></div>');
                row.append(label, value);
                modal.find('.modal-body').append(row);
            });

            modal.modal('show');
        }

        $(document).ready(function() {
            $('#myTablenanny').DataTable({
                "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{ route('victim.index') }}",
            "type": "GET",
        },
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "filled_da_form_id"
                    },
                    {
                        "data": "da_cnic"
                    },
                    {
                        "data": "da_occupant_name"
                    },
                    {
                        "data": "gender"
                    },
                    {
                        "data": "tehsil"
                    },
                    {
                        "data": "union_council"
                    },
                    {
                        "data": "district"
                    },
                    {
                        "data": "deh"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return '<a href="#" class="openSurveyModalBtn" data-victim=\'' + JSON
                                .stringify(row) + '\'>' +
                                '<i class="fa fa-info-circle" style="font-size: 20px; color: rgb(71, 181, 196)"></i>' +
                                '</a>';
                        }
                    },
                ],
                columnDefs: [{
                    orderable: false,
                    "targets": [9]
                }]
            });

            // Event delegation for the button click
            $('#myTablenanny tbody').on('click', '.openSurveyModalBtn', function(e) {
                e.preventDefault();
                var victimData = $(this).data('victim');
                openSurveyModal(victimData);
            });
        });
    </script>
@endsection
