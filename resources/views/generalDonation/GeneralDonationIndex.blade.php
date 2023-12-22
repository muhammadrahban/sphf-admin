@extends('layouts.master')

@section('contain')
<div class="row page-titles"
    style="box-shadow: 0px 0px 14px 3px #cfcfcf; background: linear-gradient(45deg, rgb(241, 234, 234), transparent);border: 1px solid #cdcdcd;">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">General Donation Management</h3>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li><a class="breadcrumb-item active" href="{{ url('/') }}">Home</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive" style="font-size: small;">
            <table id="myTablenanny" class="table table-striped border dataTable no-footer">
                <thead>
                    <tr style="background-color: gray " class="text-white">
                        <th>S.No</th>
                        <th>Name</th>
                        <th>CNIC</th>
                        <th>Phone</th>
                        <th>Job Title</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Postal Code</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $num = 1; @endphp
                    @foreach ($general_donations as $general_donation)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $general_donation->first_name ?? '-' }} {{ $general_donation->last_name ?? '-' }}</td>
                        <td>{{ $general_donation->cnic ?? '-' }}</td>
                        <td>{{ $general_donation->phone ?? '-' }}</td>
                        <td>{{ $general_donation->job_title ?? '-' }}</td>
                        <td>{{ $general_donation->country ?? '-' }}</td>
                        <td>{{ $general_donation->city ?? '-' }}</td>
                        <td>{{ $general_donation->postal_code ?? '-' }}</td>
                        <td>{{ $general_donation->company_name ?? '-' }}</td>
                        <td>{{ $general_donation->email ?? '-' }}</td>
                        <td>
                            <a type="button" title="info" onclick="openSurveyModal({{ json_encode($general_donation) }})">
                                <i class="fa fa-info-circle" style="font-size: 20px; color: rgb(71, 181, 196)"></i>
                            </a>
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
        <div class="modal-content" style="font-size: small; width: 80%; margin-left: 14%;">
            <div class="modal-header bg-primary text-white" style="background: linear-gradient(45deg, #01c0c8c2, transparent);">
                <h5 class="modal-title" id="surveyModalLabel">Survey Questions and Answers</h5>
            </div>
            <div class="modal-body">
                <table class="table" id="surveyContent">
                    <!-- General Donation details will be populated here -->
                </table>
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

    function openSurveyModal(general_donation) {
        const modal = $('#surveyModal');
        modal.find('.modal-body').empty();

        const general_donationDetails = [
            'id', 'title', 'first_name', 'last_name', 'cnic', 'phone', 'job_title', 'country', 'city', 'postal_code',
            'company_name', 'email', 'is_anonymous', 'comments', 'is_individual', 'is_company', 'amount', 'charges',
            'total_amount', 'charged_amount', 'transaction_type', 'check_no', 'cardholder_first_name',
            'cardholder_last_name', 'bank', 'iban', 'account_title', 'bank_routing_number', 'payment_status',
        ];

        const table = $('<table class="table"></table>');

        general_donationDetails.forEach((detail) => {
            const value = general_donation[detail];
            let displayValue = value;

            // Check if the field is one of the special cases
            if (detail === 'is_anonymous' || detail === 'is_company' || detail === 'is_individual') {
                // Display "No" or "Yes" with a badge class
                displayValue = value === 1 ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>';
            }

            if (value !== undefined && value !== null && detail !== 'card' && detail !== 'cvv' && detail !== 'id') {
                const label = capitalizeFirstLetter(detail.replace(/_/g, ' '));

                const row = $('<tr></tr>');
                row.append('<td><strong>' + label + ':</strong></td>');
                row.append('<td>' + displayValue + '</td>');

                table.append(row);
            }
        });

        modal.find('.modal-body').append(table);
        modal.modal('show');
    }

</script>

@endsection
