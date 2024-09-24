@extends('layouts.student_ui')
@section('title')
{{$post}}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9">                   
            <div style="border:1px dotted #CCC;padding:10px">
                <div style="width:auto;margin-top:-23px;">
                    <strong style="background-color: #FFF;border:1px dotted #CCC">{{$post_list[0]->title}}({{$post_list[0]->created_at->format('M d, Y')}})</strong>
                </div>
                <br/>
                <small>Post by: {{$post_list[0]->user->profile->first_name}} {{$post_list[0]->user->profile->middle_name}} {{$post_list[0]->user->profile->last_name}} ({{$post_list[0]->user->role->role_description}})</small>
                <p>
                    @php
                        echo urldecode($post_list[0]->details);
                    @endphp
                </p>
            </div>        
        </div>
        <div class="col-md-3">
            <strong style="text-transform:uppercase" class="text-primary">{{$post}} List</strong>
            @foreach ($post_list as $item)   
                <div>
                    <small><a href="" style="color:black">{{$item->title}}({{$item->created_at->format('M d, Y')}})</a></small>
                </div>
            @endforeach
        </div>
    </div>
@endsection