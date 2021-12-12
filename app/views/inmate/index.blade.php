@extends('inmate.inmate_base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h4>Request Transfer for your Family Member in castody</h4>
            <div class="card card-body">
                <form action="{{ url('inmate/transfer/new') }}" method="POST" id="transferFrom">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="user_id" class="pw-100">
                                    Inmate Family Member Id 
                                    <input type="text" name="user_id" class="form-control"
                                     value="{{ $user->username }}" readonly/>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="prisoner_id" class="pw-100">
                                    Prisoner Id 
                                    <input type="text" name="prionser_id" class="form-control"
                                     value="{{ $inmate->p_id }}" readonly/>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="transfer_to" class="pw-100">
                                    Prison to transfer to 
                                    <input type="text" name="transfer_to" class="form-control"/>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="pw-100">
                            Reason For Transfer 
                            <textarea name="reason" class="form-control"></textarea>
                        </label>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-warning" id="transfer-btn">Request Transfer</button>
                            <button type="reset" class="btn btn-danger">Clear Form</button>
                        </div>
                    </div>
                    <div class="response" id="response"></div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        request({form: 'transferFrom', btn: 'transfer-btn'});
    </script>
@endsection