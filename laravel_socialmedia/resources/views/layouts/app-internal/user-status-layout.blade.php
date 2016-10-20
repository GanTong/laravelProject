 <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }} - {{ $status->created_at->diffForHumans() }}</div>

        <div class="panel-body">
            <div class="row">
               	<div class="col-md-1">
                  <img src ="{{$user->getAvatar()}}" height="50" width="80" class="img-responsive">
              	</div>	

                	<div class="col-md-11">
                 	<p> {{ $status->status_text }} </p>

                      @if($status->type == 1)

                      <img src="{{asset('status_images/'.$status->image_url)}}" class="img-responsive" style="width: 100%;">


                      @endif


                    </div>

                    	<div class="col-md-12">
                    	<hr>
                    		<ul class="list-unstyled list-inline">
                    			<li>                 				
                    			<button class="btn btn-s btn-info" type="button" data-toggle="collapse" data-target="#view-comments-{{$status->id}}" aria-expanded="false" aria-controls="view-comments-{{$status->id}}">
                    			<i class="fa fa-comments-o"></i>View Comment</button> 
                    			</li>
                    					
                    			<li>

                    					@if (App\Eloquent\StatusLikes::where(['status_id' => $status->id, 'user_id' => Auth::user()->id])->first())

                    					@else
                    						{!! Form::open() !!}
                    						{!! Form::hidden('like_status', $status->id) !!}
                    						<button type="submit" class="btn btn-s btn-primary"><i class="glyphicon glyphicon-thumbs-up"></i>Like</button> 
                    						{!! Form::close() !!}
                    					@endif
                    			</li>

                    			<li>
                    			{{$comment_count}} comments
                    			</li>

                    			<li>
                    			{{$like_count}} likes

                    			</li>                      

                    		</ul>
                    </div>
              </div>
          </div>             
          		<div class="panel-footer clearfix">

          			{!! Form::open() !!}
          			{!! Form::hidden('post_comment', $status->id) !!}

						<div class="form-group">
          					<div class="input-group">
          						<input type="text" class="form-control" name="comment-text" id="comment-text" placeholder="Post a comment...">
          						<span class="input-group-btn">
          							<button class="btn btn-default" type="submit"><i class="fa fa-send"></i></button>
          							
          						</span>
          					</div>
          				</div>

          			{!! Form::close() !!}



          						<div class="collapse" id="view-comments-{{$status->id}}">

          								@if($comments->first())
          									@foreach($comments as $comment)

          									<blockquote>
          										<div class="row">
          											<div class="col-md-1">
          											<img src="{{ \App\Eloquent\User::find($comment->user_id)->getAvatar() }}" class="img-responsive">
          											</div>

          											<div clas="col-md-11">
          												<ul class="list-inline list-unstyled">
          													<li>
          														<a href="">{{ \App\Eloquent\User::find($comment->user_id)->name }}</a>
          													</li>

          													<li>
          														posted {{ $comment->created_at->diffForHumans() }}
          													</li>

          												</ul>

          												<p>{{$comment->comment_text}}</p>

          											</div>
          										</div>
          											<hr>
         									</blockquote>

          										
          									@endforeach

          								@else
          									<font color="red"><p>This status contains no comments.</p></font>

          								@endif

          						</div> 

          		</div>
</div>