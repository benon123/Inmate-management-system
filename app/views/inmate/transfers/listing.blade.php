@extends('inmate.inmate_base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h4>Transfers Requests</h4>
            <table class="table table-bordered table-striped table-light">
                <thead>
                    <th>Transfer ID</th>
                    <th>Requested On</th>
                    <th>Transfer Status</th>
                </thead>
                <tbody>
                    @foreach ($transfer as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if ($item->transfer_status == 'pending')
                                    <span class="badge badge-warning">{{$item->transfer_status }}</span>
                                @elseif($item->transfer_status == 'complete')
                                    <span class="badge badge-primary">{{$item->transfer_status }}</span>
                                @elseif($item->transfer_status == 'denied')
                                    <span class="badge badge-danger">{{$item->transfer_status }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection