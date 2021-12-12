@extends('inmate.admin.base')

@section('content')
    <div class="row justify-content-center">
        <h4>Prisoner Transfer Requests</h4>
        <div class="col-md-12">
           <table class="table table-bordered table-striped table-warning">
             <thead>
                <tr>
                    <th>Prisoner ID</th>
                    <th>Name</th>
                    <th>Date Joined</th>
                    <th>Profile</th>
                </tr>
             </thead>
             <tbody>
                 @foreach ($collection as $item)
                     <tr>
                         <td>{{ $item->p_id }}</td>
                         <td>{{ $item->fname . " " . $item->lname }}</td>
                         <td>{{ $item->date_joined }}</td>
                         <td> <a href="{{ url('inmate/admin/dashboard/prisoner/'.$item->p_id) }}">View</a> </td>
                     </tr>
                 @endforeach
             </tbody>
           </table>
        </div>
    </div>
@endsection
