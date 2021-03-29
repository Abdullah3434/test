<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DayDite;
use App\DietPlan;
use App\QuestionAnswer;
use Session;
class DietPlanController extends Controller
{
    public function dietPlanList()
	{
		$data = DB::table('diet_plans')->paginate(10);
		return view('admin.dietPlanList')->with('data',$data);
    }
    
	public function createDietPlan()
	{
		$data = "";
		return view('admin.dietPlanForm')->with('data',$data);
	}










}
