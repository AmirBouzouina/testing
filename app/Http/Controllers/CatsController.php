<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\RecipeIngredient;
use App\RecipeDirection;
use App\Recipe;
use App\User;
use File;
use DB;
class CatsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:api')
    		->except(['index', 'show']);
    }
    public function index()
    {
        $count =   DB::table('recipes')
        ->select('category',DB::raw('count(category) AS count ')  )
        ->where('valida',1)
        ->groupBy('category')
        ->get();

    	return response()
    		->json([
    			'cats' => $count
    		]);
    }



    




}
