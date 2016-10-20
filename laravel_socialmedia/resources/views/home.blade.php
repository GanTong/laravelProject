@extends('layouts.app')

@section('content')
<div class="container spark-screen">

     @include('flash::message')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        {!! Form::open(['files' => true]) !!}

            <div class="panel panel-default">
                <div class="panel-heading">Add a new status</div>

                <div class="panel-body">
                  Welcome <font size="4" color="#20B2AA"><b> {{ Auth::user()->name }} </b></font>, you have successfully logged in! <br></br>
                

                <div class="form-group">

                <label>Write a new status...</label>

                <textarea class="form-control" name="status-text" id="status-text"></textarea>

                </div>

                    <div class="panel-footer clearfix">

                        <div  class="row">

                            <div class="col-md-6">

                                <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-image"></i>
                                </label>

                                <input id="file-upload" name="status_image_upload" type="file" />

                            </div>

                                <div class="col-md-6">

                                <button class="btn btn-info pull-right btn-md"><i class="fa fa-plus"></i>Add status</button>

                                </div>

                            </div>
                    
                    </div>

              {!! Form::close() !!}

              @foreach($top_15_posts as $status)

                {!! view('layouts.app-internal.user-status-layout', [ 

                    'status' => $status,
                    'user' => \App\Eloquent\User::find($status->users_id),
                    'comments' => \App\Eloquent\StatusComments::where('status_id', $status->id)->orderBy('id', 'DESC')->get(),
                    'comment_count' => \App\Eloquent\StatusComments::where('status_id', $status->id)->count(),
                    'like_count' => \App\Eloquent\StatusLikes::where('status_id', $status->id)->count(),
                    
                ]) 
                !!}                

                @endforeach

        </div>
    </div>
</div>
@endsection
