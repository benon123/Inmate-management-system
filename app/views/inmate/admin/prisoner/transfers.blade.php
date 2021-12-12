@extends('inmate.admin.base')

@section('content')
    <div class="row justify-content-center">
        <h4>Prisoners' <span class="text-primary">{{$level}}</span> Transfer Requests</h4>
        <div class="col-md-12">
           <table class="table table-bordered table-striped table-warning">
             <thead>
                <tr>
                    <th>Prisoner ID</th>
                    <th>Name</th>
                    <th>Profile</th>
                    <th>Actions</th>
                </tr>
             </thead>
             <tbody>
                 @foreach ($collection as $item)
                     <tr>
                         <td>{{ $item->p_id }}</td>
                         <td>{{ $item->fname . " " . $item->lname }}</td>
                         <td> <a href="{{ url('inmate/admin/dashboard/prisoner/'.$item->p_id) }}">View</a> </td>
                         <td>
                             <a href="{{ url('inmate/admin/dashboard/prison/transfer/'.$item->transfer_id) }}" class="btn btn-primary  btn-sm"><i class="fas fa-eye"></i></a>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
           </table>
        </div>
    </div>
@endsection
