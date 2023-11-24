@extends('layouts.master')
@section('title')
    {{ 'Page Title Goes Here' }}
@endsection
@section('contain')
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                @foreach ($userData as $user)
                    <div class="card-body">
                        {{-- <div class=" col-lg-12 col-md-5" style="margin-left: 17%;">
                            @php $rating = $user->rating; @endphp
                            @foreach (range(1, 5) as $i)
                                <span class="fa-stack" style="width:1em color: rgb(38, 105, 25)">
                                    <i class="far fa-star fa-stack-1x "></i>

                                    @if ($rating > 0)
                                        @if ($rating > 0.5)
                                            <i class="fas fa-star fa-stack-1x" style="color: rgb(38, 105, 25)"></i>
                                        @else
                                            <i class="fas fa-star-half fa-stack-1x" style="color: rgb(38, 105, 25)"></i>
                                        @endif
                                    @endif
                                    @php $rating--; @endphp
                                </span>
                            @endforeach
                            <div class="text-success" style="margin-left: 29%;">{{ round($user->rating, 1) }}</div>
                        </div> --}}
                        <center class="m-t-30">
                            <a href="{{ URL::asset($user->profile_image != null ? env('MEDIA_URL') . $user->profile_image : 'images/placeholder_blue_user.png') }}"
                                target="_blank">
                                <img src="{{ $user->profile_image != null ? env('MEDIA_URL') . $user->profile_image : asset('images/placeholder_blue_user.png') }}"
                                    class="img-circle" width="150" />
                            </a>
                            <h4 class="waves-dark active m-t-10">
                                {{ $user->first_name ?? '-' }}{{ ' ' . $user->last_name ?? '-' }}</h4>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted">Email address </small>
                        <h6>{{ $user->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                        <h6>{{ $user->phone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                        <h6>{{ $user->address }}</h6>
                        <div id="map" style=" height: 150px;"></div>
                        {{-- <div  class="map-box"> --}}
                        {{-- <iframe

                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508"
                            width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                        {{-- </div> --}}
                        {{-- <small class="text-muted p-t-30 db">Social Profile</small>
                        <br />
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button> --}}
                    </div>

            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                            role="tab">Timeline</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#donations"
                            role="tab">Donations</a>
                    </li>
                    {{-- <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#wallet" role="tab">Wallet</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#withdraw_log"
                            role="tab">Withdraw Log</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#media" role="tab">Media</a>
                    </li> --}}
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body" style="height: 75.5vh;">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>First Name</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->first_name ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Last Name</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->last_name ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->email }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Phone</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->phone }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nationality</strong>
                                                <br>
                                                <p class="text-muted">
                                                    {{ $user->nationality ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Nationality No</strong>
                                                <br>
                                                <p class="text-muted">
                                                    {{ $user->nationality_no ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>City</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->city ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Country</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->country ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Post Code</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->post_code ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Organization</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->organiation ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Job Title</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->job_title ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Comments</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->comments ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>is_anonymously</strong>
                                                <br>
                                                <span
                                                    class="badge bg-{{ $user->is_anonymously == 0 ? 'warning' : 'success' }}">
                                                    {{ $user->is_anonymously == 0 ? 'No' : 'Yes' }}
                                                </span>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>is_company</strong>
                                                <br>
                                                <span
                                                    class="badge bg-{{ $user->is_company == 0 ? 'warning' : 'success' }}">
                                                    {{ $user->is_company == 0 ? 'No' : 'Yes' }}
                                                </span>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>is_individual</strong>
                                                <br>
                                                <span
                                                    class="badge bg-{{ $user->is_individual == 0 ? 'warning' : 'success' }}">
                                                    {{ $user->is_individual == 0 ? 'No' : 'Yes' }}
                                                </span>
                                            </div>
                                            <input type="hidden" name="" id="lat"
                                                value="{{ $user->latitude }}">
                                            <input type="hidden" name="" id="long"
                                                value="{{ $user->longitude }}">
                                            {{-- <div class="col-md-3 col-xs-6"> <strong>Caregiver Status</strong>
                                                <br>
                                                @if ($user->is_online == 0)
                                                    <p class="badge rounded-pill bg-danger ms-auto mb-2 mb-md-0">offline
                                                    </p>
                                                @else
                                                    <p class="badge rounded-pill bg-success ms-auto mb-2 mb-md-0">online
                                                    </p>
                                                @endif
                                            </div> --}}
                                            {{-- <div class="col-md-3 col-xs-6"> <strong>DOB	</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->dob	 }}</p>
                                            </div> --}}
                                            {{-- </div> --}}
                                            {{-- <div class="col-md-3 col-xs-6"> <strong>Biography</strong>
                                                <br>
                                                <p class="text-muted">{{ $user->biography ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Language(s)</strong>
                                                <br>
                                                @php
                                                    $languages = explode(',', $user->language);
                                                @endphp

                                                @foreach ($languages as $language)
                                                    <p>{{ trim($language) }}</p>
                                                @endforeach
                                            </div> --}}
                                            {{-- <hr>
                                        <div class="col-md-3"> <strong>Media</strong><br>
                                            <h5>Agreement</h5>
                                            <p class="m-t-30"> <a
                                                    href="{{ URL::asset($user->agreement != null ? $user->agreement->media : null) }}"
                                                    target="_blank">
                                                    <img src="{{ asset($user->agreement != null ? $user->agreement->media : null) }}"
                                                        alt="Not Available" width="100">
                                                </a></p>
                                        </div>

                                        <div class="col-md-3" style="margin-top: 23px">
                                            <h5>Licens</h5>
                                            <p class="m-t-30"> <a
                                                    href="{{ URL::asset($user->license != null ? $user->license->media : null) }}"
                                                    target="_blank">
                                                    <img src="{{ asset($user->license != null ? $user->license->media : null) }}"
                                                        alt="Not Available" width="100">
                                                </a></p> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="selfie" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">

                                            <div class="p-3">
                                                <span style="float:right;">
                                                    <form class="form-horizontal form-material"
                                                        action="https://test-cmolds.com/zauj_admin/public/users/391/update"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="p1wC3NiayGMMlY3sWxQqF6J6BlHk1OphgF8nCQQv">
                                                        <p class="text-center mt-4">Status not available</p>
                                                    </form>
                                                </span>
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-4">

                                                    <p class="text-center mt-4">Not Uploaded</p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="picture" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">

                                            <div class="row">
                                                <div class="col-sm-4">

                                                    <p class="text-center mt-4">


                                                        <a href="https://test-cmolds.com/zauj-uploads/users/PYz8K/pictures/geSGyjpg"
                                                            target="blank"> Click to view </a>
                                                        <span class="badge badge-info">pending</span>

                                                        <span style="float:right;" class="p-1">
                                                            <a href="https://test-cmolds.com/zauj_admin/public/picture/841/approved"
                                                                data-toggle="tooltip" data-original-title="Approved"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="icon-check" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="https://test-cmolds.com/zauj_admin/public/picture/841/rejected"
                                                                data-toggle="tooltip" data-original-title="Disapproved"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="icon-close" aria-hidden="true"></i>
                                                            </a>
                                                        </span>
                                                        <img src="https://test-cmolds.com/zauj-uploads/users/PYz8K/pictures/geSGyjpg"
                                                            alt="" class="h-50 w-100">

                                                    </p>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="identity" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">

                                            <div class="p-3">
                                                <span style="float:right;">

                                                    <form class="form-horizontal form-material"
                                                        action="https://test-cmolds.com/zauj_admin/public/users/391/identity"
                                                        method="post">
                                                        <input type="hidden" name="_token"
                                                            value="p1wC3NiayGMMlY3sWxQqF6J6BlHk1OphgF8nCQQv">
                                                        <p class="text-center mt-4">Status not available</p>

                                                    </form>
                                                </span>
                                            </div>

                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <p class="text-center mt-4">Not Uploaded</p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="setting" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material"
                                            action="https://test-cmolds.com/zauj_admin/public/users/391" method="POST">
                                            <input type="hidden" name="_token"
                                                value="p1wC3NiayGMMlY3sWxQqF6J6BlHk1OphgF8nCQQv"> <input type="hidden"
                                                name="_method" value="PATCH">
                                            <div class="form-group">
                                                <label class="col-sm-12">Status</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control form-control-line" name="status">
                                                        <option value="0" selected>Pending</option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Rejected</option>
                                                        <option value="3">InActive</option>
                                                        <option value="4">Blocked</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane" id="wallet" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Currency</strong>
                                    <br>
                                    <p class="text-muted">USD</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>FDP</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->wallet->fdp ?? '' }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Amount</strong>
                                    <br>
                                    <p class="text-muted">{{ $user->wallet->total_amount ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12 col-xs-6 b-r text-subtitle">
                            <h4 class="text-success">Transactions History</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="myTable2" class="table table-striped border">
                                <thead>
                                    <tr class="text-white" style="background-color: gray;">
                                        <th>S.No</th>
                                        <th>Transaction Type</th>
                                        <th>FDP</th>
                                        <th>Amount Type</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @if ($user->wallet)
                                        @foreach ($user->wallet->transactions as $transaction)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $transaction->type ?? '-' }}</td>
                                                <td>{{ $transaction->fdp ?? '-' }}</td>
                                                <td>{{ $transaction->amount_type ?? '-' }}</td>
                                                <td>{{ $transaction->created_at->format('d/m/Y') ?? '-' }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                    <div class="tab-pane" id="donations" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive  m-t-40">
                                <table id="myTableorder" class="table table-striped border" style="    font-size: small">
                                    <thead>
                                        <tr class="text-white" style="background-color: gray;">
                                            <th>S.No</th>
                                            <th>Victim</th>
                                            <th>Construction Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $num = 1;
                                        @endphp
                                        @foreach ($user->donation as $donate)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>
                                                    <a type="button" title="info"
                                                        onclick="openVictimModal({{ json_encode($donate->victim) }})"
                                                        style="color: blue; transition: color 0.3s ease;"
                                                        onmouseover="this.style.color='red'"
                                                        onmouseout="this.style.color='blue'">
                                                        {{ $donate->victim ? ucwords($donate->victim->da_occupant_name) : '-' }}
                                                    </a>
                                                </td>
                                                <td><span
                                                        class="badge bg-info">{{ $donate->construction_status ?? '-' }}</span>
                                                </td>
                                                <td>
                                                    <a title="info" type="button" data-toggle="modal"
                                                        data-target="#invoiceModal"
                                                        data-detail="{{ json_encode($donate->donationinvoices) }}"
                                                        class="customModelOpen">
                                                        <i class="fa fa-info-circle"
                                                            style="font-size: 20px; color: rgb(71, 181, 196)"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                            <div class="modal" id="saaaurveyModal" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content" style="font-size: small;">
                                                        <div class="modal-header bg-primary text-white"
                                                            style="background: linear-gradient(45deg, #01c0c8c2, transparent);"
                                                            style="background: linear-gradient(45deg, #01c0c8c2, transparent;">
                                                            <h5 class="modal-title"
                                                                id="orderModalLabel{{ $donate->id }}">Order Details</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul id="orderContent" class="list-group">
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- @endif --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="booking" role="tabpanel">
                        <div class="card-body">
                            {{-- <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Johnathan Doe"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="johnathan@admin.com"
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success text-white">Update Profile</button>
                                    </div>
                                </div>
                            </form> --}}

                        </div>
                    </div>
                    <div class="tab-pane" id="media" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTable11" class="table table-striped border">
                                    <thead>
                                        <tr class="card-success text-white">
                                            <th>Media Type</th>
                                            <th>Media Title</th>
                                            <th>Media Images</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($user->userMedia as $media)
                                            <tr>
                                                <td>{{ ucwords(str_replace('_', ' ', $media->media_type)) }}</td>
                                                <td>{{ ucwords(str_replace('_', ' ', $media->media_title)) }}</td>
                                                <td>
                                                    <a href="{{ URL::asset($media->media_url != null ? env('MEDIA_URL') . $media->media_url : 'images/user') }}"
                                                        target="_blank">
                                                        <img src="{{ $media->media_url != null ? env('MEDIA_URL') . $media->media_url : asset('images/user') }}"
                                                            alt="Not Available" width="50px" class="img-circle">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="withdraw_log" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive m-t-40">
                                <table id="myTableLogs" class="table table-striped border">
                                    <thead>
                                        <tr style="font-size: smaller;" class="card-info text-white">
                                            <th>S.No</th>
                                            <th>Payout Batch Id</th>
                                            <th>Sender Batch Id</th>
                                            <th>Amount</th>
                                            <th>Receiver Email</th>
                                            <th>Batch Status</th>
                                            <th>Date</th>
                                            {{-- <th>Date</th> --}}

                                        </tr>
                                    </thead>
                                    @php
                                        $num = 1;
                                    @endphp
                                    <tbody>
                                        {{-- @foreach ($user->withdrawlog as $logs)
                                            <tr style="font-size: smaller;">
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $logs->payout_batch_id ?? '-' }}</td>
                                                <td>{{ $logs->sender_batch_id ?? '-' }}</td>
                                                <td>${{ $logs->amount ?? '0' }}</td>
                                                <td>${{ $logs->receiver_email ?? ' ' }}</td>
                                                <td>{{ $logs->batch_status ?? '-' }}</td>
                                                <td>{{ $logs->created_at->format('d/m/Y') ?? '-' }}</td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Column -->
    </div>
    @endforeach
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    {{-- Custom pagination --}}
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
    <div class="modal" id="invoiceModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="font-size: small;        width: 120%;margin-left: -7%;">
                <div class="modal-header bg-primary text-white"
                    style="background: linear-gradient(45deg, #01c0c8c2, transparent);">
                    <h5 class="modal-title" id="surveyModalLabel">Invoice Detail</h5>
                    {{-- <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"> --}}
                    {{-- <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    {{-- <h3 id="surveyName" class="text-primary"></h3> --}}
                    <ul id="invoiceContent1" class="list-group">
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





        $('.customModelOpen').on("click", function() {
            // alert('dddd');
            var data = $(this).data('detail');
            // console.log(data);
            var modalContent = $('#invoiceContent1');
            var tableContainer = $('<div class="table-responsive"></div>');
            var table = document.createElement('table');
            table.classList.add('table', 'table-bordered');

            // Create a table header
            var thead = document.createElement('thead');
            thead.innerHTML =
                '<tr><th>ID</th><th>Amount</th><th>Charges</th><th>Total Amount</th><th>Checque No</th><th>Transaction Type</th><th>Transaction Reference</th><th>Card</th><th>Bank</th><th>IBAN</th><th>Account Title</th><th>Bank Routing Number</th><th>Transaction Status</th><th>Payment Status</th><th>Action</th></tr>';
            table.appendChild(thead);

            // Create a table body
            var tbody = document.createElement('tbody');

            // Iterate through donation_invoices and create table rows
            var num = 0;
            data.forEach(function(invoice, index) {
                num++;
                var row = document.createElement('tr');
                row.innerHTML = '<td>' + num + '</td>' +
                    '<td>' + invoice.amount + '</td>' +
                    '<td>' + invoice.charges + '</td>' +
                    '<td>' + invoice.total_amount + '</td>' +
                    '<td>' + (invoice.transaction_type === 'dod' ?
                        '<input name="checque_no" type="text" style="border: inset;" id="check_no_' +
                        invoice.id + '" value="' + invoice.check_no + '"/>' : invoice.check_no) + '</td>' +
                    '<td>' + invoice.transaction_type + '</td>' +
                    '<td>' + invoice.transaction_reference + '</td>' +
                    '<td>' + invoice.card + '</td>' +
                    '<td>' + invoice.bank + '</td>' +
                    '<td>' + invoice.iban + '</td>' +
                    '<td>' + invoice.account_title + '</td>' +
                    '<td>' + invoice.bank_routing_number + '</td>' +
                    '<td>' + (invoice.transaction_type === 'dod' ? getTransactionStatusDropdown(invoice.id,
                        invoice.transaction_status) : invoice.transaction_status) + '</td>' +
                    '<td>' + invoice.payment_status + '</td>' +
                    '<td style="color: slategray;">' + (invoice.transaction_type === 'dod' ?
                        '<button class="btn btn-warning" onclick="updateInvoice(' + invoice.id +
                        ')">Update</button>' : 'Disabled') + '</td>';

                tbody.appendChild(row);
            });

            table.appendChild(tbody);
            tableContainer.append(table);

            // Empty the modal content and append the table container
            modalContent.empty();
            modalContent.append(tableContainer);

            // Show the modal
            $('#invoiceModal').modal('show');
        });

        function getTransactionStatusDropdown(invoiceId, currentStatus) {
            var statusOptions = ['pending', 'completed', 'declined'];

            var dropdown = '<select name="transaction_status" id="transaction_status_' + invoiceId +
                '" style="border: inset;">';
            statusOptions.forEach(function(status) {
                dropdown += '<option value="' + status + '" ' + (status === currentStatus ? 'selected' : '') + '>' +
                    status + '</option>';
            });
            dropdown += '</select>';

            return dropdown;
        }

        function updateInvoice(invoiceId) {
            // Get the updated check_no value
            var updatedCheckNo = $('#check_no_' + invoiceId).val();
            // Get the updated transaction_status value
            var updatedTransactionStatus = $('#transaction_status_' + invoiceId).val();

            // Perform AJAX request to update the invoice
            $.ajax({
                method: 'POST',
                url: '/invoice/update/' + invoiceId, // Replace with your actual route
                data: {
                    check_no: updatedCheckNo,
                    transaction_status: updatedTransactionStatus,
                    _token: '{{ csrf_token() }}' // Add this line to include the CSRF token
                },
                success: function(response) {
                    // Handle the success response
                    console.log(response);

                    // Show toastr message
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                    }
                    toastr.success(response.message);

                    // Refresh the page after a short delay (e.g., 1 second)
                    setTimeout(function() {
                        location.reload(true);
                    }, 1500);
                },
                error: function(error) {
                    // Handle the error
                    console.error(error);
                }
            });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAquzgo847shlU-SpPXLZMgShv6EW9pQmw&callback=initMap"></script>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of the marker
            const lati = document.getElementById("lat").value;
            const long1 = document.getElementById("long").value;
            const uluru = {
                lat: parseFloat(lati),
                lng: parseFloat(long1)
            };

            // Create a geocoder object
            const geocoder = new google.maps.Geocoder();

            // Reverse geocode the location to get the address
            geocoder.geocode({
                location: uluru
            }, (results, status) => {
                if (status === "OK") {
                    if (results[0]) {
                        // Extract the formatted address
                        const address = results[0].formatted_address;

                        // The map, centered at the marker
                        const map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 20,
                            center: uluru,
                        });

                        // The marker, positioned at the marker location
                        const marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                        });

                        // Create an info window to display the location name
                        const infowindow = new google.maps.InfoWindow({
                            content: address,
                        });

                        // Open the info window when the marker is clicked
                        marker.addListener("click", () => {
                            infowindow.open(map, marker);
                        });
                    } else {
                        console.log("No results found");
                    }
                } else {
                    console.log("Geocoder failed due to: " + status);
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable11').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        $(document).ready(function() {
            $('#myTableorder').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        $(document).ready(function() {
            $('#myTableLogs').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        $(document).ready(function() {
            $('#myTable2').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    ['5 rows', '10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
    </script>
@endsection
