@extends('inmate.admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Prisoner Profile  <button type="button" class="btn btn-outline-info btn-sm"
                id="printProfile">Print Transfer Request</button></h4>
            <div class="card card-body shadow bg-khaki" id="profile">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="text-center">CELL NO: {{ $collection->cell_no }}</h5>
                        <img src="{{  asset('img/75-751492_prisoner-png-transparent.png')}}" width="200"/>
                        <p class="text-center">{{ $collection->p_id }}</p>
                        <p class="text-center">
                            {{ date('D d M Y', strtotime($collection->date_joined)) }} - 
                            {{ date('D d M Y', strtotime($collection->release_date)) }}
                        </p>
                    </div>
                    <div class="col-lg-8">
                        <h5 class="font-weight-bold text-danger">
                            Sur Name: <span class="text-muted">{{ strtoupper($collection->fname) }}</span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Given Name: <span class="text-muted">{{ strtoupper($collection->lname) }}</span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Gender: <span class="text-muted">{{ $collection->gender == 'M' ? "MALE" : "FEMALE" }}</span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Date of Birth: <span class="text-muted">{{ $collection->dob }}</span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Age: <span class="text-muted">{{ (intval(date('Y')) - intval(substr($collection->dob, 0, 4))) }}</span>
                        </h5>
                        <hr/>
                        <h5 class="font-weight-bold text-danger">
                            Facility: <span class="text-muted">{{ $collection->facility }}</span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Crime: <span class="text-danger">{{ $collection->crime }}</span>
                        </h5>
                        <h5 class="font-weight-bold text-danger">
                            Release Date: <span class="text-muted">{{ $collection->release_date }}</span>
                        </h5>
                        <hr/>
                        <h5 class="font-weight-bold text-danger">
                            Rehub: <span class="text-muted">{{ $collection->rehub }}</span>
                        </h5>
                    </div>
                </div>
                <hr/>
                <h4>TREANSFER REQUEST</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Transfer Id:</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>{{ $collection->t_id}}</h5>
                    </div>       

                    <div class="col-lg-6">
                        <h5>Transfer  to: </h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>{{ $collection->transfer_to}}</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Reason for Transfer:</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>{{ $collection->reason}}</h5>
                    </div>
                </div>
                <hr>
                <h4>REQUESTED BY</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Name :</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>{{ $collection->first_name . " " . $collection->last_name }}</h5>
                    </div>       

                    <div class="col-lg-6">
                        <h5>Email : </h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>{{ $collection->email}}</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Phone Number:</h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>{{ $collection->phone_number}}</h5>
                    </div>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-end">
                @if ($collection->transfer_status == 'pending')
                    <button type="button" class="btn btn-primary ml-3 transfer"
                    data-url="{{ url("inmate/admin/dashboard/prison/transfer/actions") }}"
                     data-action="approve"
                     data-_token="{{_token()}}"
                     data-p_id="{{ $collection->p_id }}"
                     data-id="{{ $collection->t_id }}">Approve Transfer Request</button>
                    <button type="button" class="btn btn-danger ml-3 transfer"
                     data-url="{{ url("inmate/admin/dashboard/prison/transfer/actions") }}"
                     data-action="deny" 
                     data-_token="{{_token()}}"
                     data-p_id="{{ $collection->p_id }}"
                     data-id="{{ $collection->t_id }}">Deny Transfer Request</button>
                @endif
                @if ($collection->transfer_status == 'approved')
                    <button type="button" class="btn btn-success ml-3" disabled>Transfer Request was Approved</button>
                @endif
                @if ($collection->transfer_status == 'denied')
                    <button type="button" class="btn btn-danger ml-3" disabled>Transfer Request was Denied</button>
                @endif
            </div>
        </div>
        <div id="response"></div>
    </div>
@endsection
@section('scripts')
    <script>
        jQuery(() => {
            $("#printProfile").on('click', function(){
                $("#profile").printSection();
            });
            elementDataRequest({selector: 'class', el: 'transfer', method: 'POST'});
        });    
    </script>
@endsection