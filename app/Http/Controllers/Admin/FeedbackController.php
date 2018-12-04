<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use function GuzzleHttp\Promise\queue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($id){
        $feedback = Feedback::where("feedback.id",$id)
            ->join("users","feedback.user_id","users.id")
            ->select("feedback.*","users.name","users.email")
            ->first();

        if(empty($feedback)){
            return back()->with("erro","Não foi possível localizar este feedback.");
        }

        return view("admin.feedback.index",["feedback" => $feedback]);
    }

    public function listar(Request $request){
        $feedback = Feedback::join("users","feedback.user_id","users.id")
                    ->select("feedback.*","users.name","users.email")->get();

        return view("admin.feedback.listar",["feedbacks" => $feedback]);
    }
}
