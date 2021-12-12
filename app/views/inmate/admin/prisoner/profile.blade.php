@extends('inmate.admin.base')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Prisoner Profile  <button type="button" class="btn btn-outline-info btn-sm"
                id="printProfile">Print Profile</button></h4>
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
                            Age: <span class="text-muted">{{ (date('Y') - substr($collection->dob, 0, 4)) }}</span>
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
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        jQuery(() => {
            $("#printProfile").on('click', function(){
                $("#profile").printSection();
            });
        });
    </script>
@endsection