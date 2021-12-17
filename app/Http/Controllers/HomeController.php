<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Common;
use App\Models\Category;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $allCategories = Category::all()->toArray();
//echo '<pre>'.print_r($allCategories, true).'</pre>'; exit();
        $filter_category = array();
        foreach($allCategories as $data){
            if($data['parent_id'] == 0){
                $filter_category[$data['category_row_id']]['parent'] = $data;
            } else {
                $filter_category[$data['parent_id']]['child'][] = $data;
            }
        }
        //echo '<pre>'.print_r($filter_category, true).'</pre>'; exit();
        return view('welcome', compact('filter_category'));
       
        
    }
    function livesearch(Request $request){
        $term = $request->get('term');
        $data = DB::table('products')->where("product_name","LIKE","%$term%")->get()->toArray();
        //dd($data);
        $output = array();
         if(count($data) > 0) {
          foreach($data as $row) {
            //dd($row);
           $temp_array = array();
           $image_path = asset('/uploads/products/').'/'.$row->product_row_id.'/thumbnail/'.$row->product_image;
           $temp_array['id'] = $row->product_row_id;
           $temp_array['value'] = $row->product_name;
           $temp_array['label'] = '<img src='.$image_path.' width="70" />&nbsp;&nbsp;&nbsp;'.$row->product_name.'';
           $output[] = $temp_array;
          }
         }
         else
         {
          $output['value'] = '';
          $output['label'] = 'No Record Found';
         }

        echo json_encode($output);
        //return response()->json($data);
    }
}
