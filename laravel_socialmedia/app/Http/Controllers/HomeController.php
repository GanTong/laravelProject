<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use Illuminate\Http\Request;
use App\Eloquent\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
//use Illuminate\Validation\Validator;
use Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



         if(Input::has('like_status'))

         {

             $status = Input::get('like_status');

             $selectedStatus = Status::find($status);
             $selectedStatus->like()->create([
                    'user_id' => Auth::user()->id,
                    'status_id' => $status
                ]);

              return redirect(route('home')); 
         }



        if(Input::has('post_comment'))
        {
            $status = Input::get('post_comment');
            $commentBox = Input::get('comment-text');
            $selectedStatus = Status::find($status);

            $selectedStatus->comments()->create([

                    'comment_text' => $commentBox,
                    'user_id' => Auth::user()->id,
                    'status_id' => $status

                ]);

            Flash::message('your comment has been posted.');
            return redirect(route('home'));

         }


        if(Input::has('status-text'))

        {

            $text = e(Input::get('status-text'));


            $rules = [

                'status-text' => 'required|string',

            ];


            $validator = Validator::make($request->all(), $rules);

            if(Input::hasFile('status_image_upload'))

            {
                $rules['status_image_upload'] = 'image';

                $validator = Validator::make($request->all(), $rules);

                if(!$validator->fails())

                {

                    $image = $request->file('status_image_upload');

                    $imageName = str_random(8).'_'.$image->getClientOriginalName();
                    //$imageFull = str_random(8).'_'.$image->getClientOriginalExtension();

                    $image->move('status_images', $imageName); 



                    $userStatus = new Status();
                    $userStatus->status_text = $text;
                    $userStatus->image_url = $imageName;
                    $userStatus->type = 1;
                    $userStatus->users_id = Auth::user()->id;
                    $userStatus->save();
                    Flash::success('Your status has been posted!');

                    return redirect(route('home'));


                } else {

                    return back()->with('error', 'Validation failed : '. $validator->errors);
                }

            
            } else {


             if(!$validator->fails())

                {

                    $userStatus = new Status();
                    $userStatus->status_text = $text;
                    $userStatus->users_id = Auth::user()->id;
                    $userStatus->save();
                    Flash::success('Your status has been posted!');

                    return redirect(route('home'));


                } else {

                    return back()->with('error', 'Validation failed : '. $validator->errors);
                }

            
        }

    }






        return view('home', [

            'top_15_posts' => Status::orderBy('id', 'DESC')->take(15)->get()


    ]);
}

}