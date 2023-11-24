@extends('layouts.master')
@section('contain')
    <div class="row page-titles"
        style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">donation Management</h3>
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
                            <th>User</th>
                            <th>Victim</th>
                            <th>Construction Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                        @endphp
                        @foreach ($donations as $donation)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>
                                    <a href="{{ route('user.info', $donation->user->id) }}" title="info"
                                        style="color: blue; transition: color 0.3s ease;"
                                        onmouseover="this.style.color='red'" onmouseout="this.style.color='blue'">
                                        {{ $donation->user->first_name ? ucwords($donation->user->first_name) : '-' }}
                                        {{ $donation->user->last_name ? ucwords($donation->user->last_name) : '-' }}
                                    </a>
                                </td>
                                <td>
                                    <a type="button" title="info"
                                        onclick="openVictimModal({{ json_encode($donation->victim) }})"
                                        style="color: blue; transition: color 0.3s ease;"
                                        onmouseover="this.style.color='red'" onmouseout="this.style.color='blue'">
                                        {{ $donation->victim ? ucwords($donation->victim->da_occupant_name) : '-' }}
                                    </a>
                                </td>
                                <td><span class="badge bg-info">{{ $donation->construction_status ?? '-' }}</span>
                                </td>
                            </tr>
                        @endforeach
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
        // Vitim modal method
        function openVictimModal(victim) {
            const modal = $('#surveyModal');
            modal.find('.modal-title').text('Victim Details');
            modal.find('.modal-body').empty();
            const excludedProperties = ['id', 'uuid', 'created_at', 'updated_at'];
            for (const [key, value] of Object.entries(victim)) {
                console.log(key, value); // Add this line to check the key and value
                if (!excludedProperties.includes(key)) {
                    const row = $('<div class="row mb-2 align-items-center"></div>');
                    const label = $('<div class="col-md-6 text-md-start"><strong>' + capitalizeFirstLetter(key.replace(/_/g,
                        ' ')) + ':</strong></div>');
                    // Check if the current property should be displayed differently
                    const displayValue = getDisplayValue(key, value);
                    const valueDiv = $(
                        '<div class="col-md-6 text-md-center"><span style="font-size: small;">' +
                        displayValue + '</span></div>');
                    row.append(label, valueDiv);
                    modal.find('.modal-body').append(row);
                }
            }

            modal.modal('show');
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function getDisplayValue(key, value) {
            // Helper function to check if a column is a boolean column
            const isBooleanColumn = (columnName) => {
                const booleanColumns = [
                    'widows',
                    'women_with_disable_husband',
                    'divorced_abandoned_unmarried_older_dependent_on_others',
                    'people_with_disability_physically_or_mentally',
                    'unaccompained_minors_i_e_orphans',
                    'unaccompained_elders_over_the_age_of_60',
                ];
                return booleanColumns.includes(columnName);
            };
            // Check if the column is a boolean column
            if (isBooleanColumn(key)) {
                return value === '1' ? 'Yes' : 'No';
            }
            return value;
        }

        // Vitim modal method end

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
        $(function() {
            $('#myTablenanny').DataTable({
                columnDefs: [{
                    orderable: false,
                    "targets": [3]
                }]
            });
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
                'btn btn-primary me-1');
        });
    </script>
@endsection
