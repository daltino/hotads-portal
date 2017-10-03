<?php
/**
 * Created by PhpStorm.
 * User: angelpilot5
 * Date: 7/23/17
 * Time: 5:29 PM
 */

namespace App\Http\Controllers;


class FeedbackController extends Controller
{
    public function showFeedbackForm(){
        return view('feedback');
    }
}