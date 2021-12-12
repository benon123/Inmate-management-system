@extends('inmate.admin.base')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h4>User Listing</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-light bg-maroon">
                    <thead>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Account Type</th>
                        <th>Joined On</th>
                    </thead>
                    <tbody>
                        @php
                           $i = 0; 
                        @endphp
                        @foreach ($collection as $item)
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->first_name . " " . $item->last_name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ strtoupper($item->account_type) }}</td>
                                <td>{{ date("D d M Y", strtotime($item->created_at ))}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection