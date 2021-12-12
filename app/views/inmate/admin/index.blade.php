@extends('inmate.admin.base')

@section('content')
    <div class="row">
        <div class="col-lg-4 mt-3">
            <div class="card card-body shadow bg-khaki">
                <h4 class="card-title text-dark">Prisoners</h4>
                <h5><span class="badge badge-light">{{ !empty($prisoners) ? count($prisoners) : 0 }}</span></h5>
            </div>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card card-body shadow">
                <h4 class="card-title">All Transfers</h4>
                <h5><span class="badge badge-warning">{{ $transfers->all }}</span></h5>
            </div>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card card-body shadow bg-warning">
                <h4 class="card-title">Pending Transfers</h4>
                <h5><span class="badge badge-light">{{ $transfers->pending }}</span></h5>
            </div>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card card-body shadow bg-success">
                <h4 class="card-title text-light">Approved Transfers</h4>
                <h5><span class="badge badge-light">{{ $transfers->approved }}</span></h5>
            </div>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card card-body shadow bg-danger">
                <h4 class="card-title text-light">Denied Transfers</h4>
                <h5><span class="badge badge-light">{{ $transfers->denied }}</span></h5>
            </div>
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card card-body shadow">
                <h4 class="card-title">Familty Relatives</h4>
                <h5><span class="badge badge-warning">{{ !empty($transfers->familty) ? count($transfers->familty) : 0 }}</span></h5>
            </div>
        </div>
    </div>
@endsection