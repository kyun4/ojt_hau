@extends('layouts.super_ui')

@section('title') Schools @endsection
@section('content')
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Schools</th>
                        <th>Status</th>
                        <th width='10%' >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $school)
                        <tr>
                            <td>{{$school->school}}</td>
                            <td>{{$school->status}}</td>
                            {{-- <td align="center">
                                <a href="/admin/school/update/{{base64_encode($school->id)}}">
                                    <button class="btn btn-sm btn-warning" style="color: #000"><i class="fas fa-fw fa-pen"></i></button>
                                </a>
                            </td> --}}
                            <td>
                                <a href="/admin/school/update/{{base64_encode($school->id)}}">
                                    <button class="btn btn-sm btn-warning" style="color: #000"><i class="fas fa-fw fa-pen"></i></button>
                                </a>
                                @if ($school->status == 'Active')
                                    <button title="Archive" class="btn btn-sm btn-danger" style="color:#000 !important" onclick="school_archive('{{base64_encode($school->id)}}','{{$school->status}}')"><i class="fas fa-fw fa-box"></i></button>
                                @else
                                    <button title="Restore" class="btn btn-sm btn-success" style="color:#000 !important"
                                    onclick="school_archive('{{base64_encode($school->id)}}','{{$school->status}}')"><i class="fas fa-fw fa-box-open"></i></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection

@section('script')
    <script>
        function school_update(id){
            window.open('/admin/school/update/'+id,'_parent');
        }
        function school_archive(id,status){
            if(status == 'Active'){
                var conf = confirm('Are you sure to archive this school?');
                if(conf == true) window.open('/admin/school/archive/'+id,'_parent');
            }
            else if(status == 'Inactive'){
                var conf = confirm('Are you sure to restore this school?');
                if(conf == true) window.open('/admin/school/archive/'+id,'_parent');
            }
            else if(status == 'Archived'){
                var conf = confirm('Are you sure to restore this school?');
                if(conf == true) window.open('/admin/school/archive/'+id,'_parent');
            }

        }
    </script>
@endsection
