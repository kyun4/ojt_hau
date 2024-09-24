@extends('layouts.super_ui')

@section('title') Coordinators @endsection
@section('content')
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>School</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>MIddle Name</th>
                        <th>Last Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{$account->profile->school->school}}</td>
                            <td>{{$account->username}}</td>
                            <td>{{$account->profile->first_name}}</td>
                            <td>{{$account->profile->middle_name}}</td>
                            <td>{{$account->profile->last_name}}</td>
                            <td>{{$account->status}}</td>

                            @if ($account->status == 'Active')
                                <td>
                                    <button title="Password Reset" class="btn btn-sm btn-success" style="color:#000 !important" onclick="password_reset('{{base64_encode($account->id)}}')"><i class="fas fa-fw fa-sync"></i></button>
                                    <button title="update" class="btn btn-sm btn-warning" style="color:#000 !important" onclick="user_update('{{base64_encode($account->id)}}')"><i class="fas fa-fw fa-pen"></i></button>
                                    <button title="Archive" class="btn btn-sm btn-danger" style="color:#000 !important" onclick="user_archive('{{base64_encode($account->id)}}','{{$account->status}}')"><i class="fas fa-fw fa-box"></i></button>
                                </td>
                            @else
                                <td>
                                   <button title="Restore" class="btn btn-sm btn-warning" style="color:#000 !important"
                                   onclick="user_archive('{{base64_encode($account->id)}}','{{$account->status}}')"><i class="fas fa-fw fa-box-open"></i></button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection
@section('script')
    <script>
        function password_reset(id){
            var conf = confirm("Are you sure to reset the password?");
            if(conf == true) window.open('/admin/password/reset/'+id,'_parent');
        }
        function user_update(id){
            window.open('/admin/coordinator/update/'+id,'_parent');
        }
        function user_archive(id,status){
            if(status == 'Active'){
                var conf = confirm('Are you sure to archive this account?');
                if(conf == true) window.open('/admin/coordinator/archive/'+id,'_parent');
            }
            else if(status == 'Archived'){
                var conf = confirm('Are you sure to restore this account?');
                if(conf == true) window.open('/admin/coordinator/archive/'+id,'_parent');
            }

        }
    </script>
@endsection
