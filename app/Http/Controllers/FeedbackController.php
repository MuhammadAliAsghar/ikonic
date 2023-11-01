<?php
  
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Vote;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
  
class FeedbackController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$allfeedbacks = Feedback::all(); 

        $allfeedbacks = DB::table('feedbacks')
        ->select('feedbacks.id', 'feedbacks.title', 'feedbacks.description', 'feedbacks.category', 'feedbacks.created_at', DB::raw('COUNT(votes.id) as vote_count'))
        ->leftJoin('votes', 'feedbacks.id', '=', 'votes.votefor')
        ->groupBy('feedbacks.id', 'feedbacks.title', 'feedbacks.description', 'feedbacks.category', 'feedbacks.created_at')
        ->get();
    
    
        return view('user.feedbacklist', ['allfeedbacks' => $allfeedbacks]);
    } 


    

    
    public function addfeedback()
    {
       
        return view('user.addfeedback');
    } 


    


    public function storefeedback(Request $request)
    {
       
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        Feedback::create($validatedData);

        return redirect('/feedbacklist')->with('success', 'Feddback created successfully!');
    }



    
    public function feedbackdetail(Request $request)
    {
      
       $feedbackdetail = Feedback::where('id', $request->feedback_id)->first(); 
        $comments = Comment::where('feedbackid' , $request->feedback_id)->get();
        return view('user.feedbackdetail', ['feedbackdetail' => $feedbackdetail, 'comments' => $comments]);


       
    }





  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
}