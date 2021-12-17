<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Category;
use App\Models\Common;
use DB;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $common_model = new Common();  
        $data['all_records'] = $common_model->allCategories();
        //dd($data['all_records']);    
        return view('admin.category.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $common_model = new Common();      
        $data['all_records'] = $common_model->allCategories();
        //echo '<pre>'.print_r($data['all_records'], true).'</pre>'; exit();
        return view('admin.category.create', ['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $category_model = new Category();
        $category_model->category_name = $request->category_name;  
        $category_model->parent_id = $request->parent_id;
$category_model->level = 0;
        if($category_model->parent_id) {
            $parent_cat_info =   DB::table('categories')->where('category_row_id', $category_model->parent_id)->first(); 
            $category_model->level = $parent_cat_info->level + 1;
        }
        //dd($request->category_image);
        
        if($request->category_image){
           // $category_image = time().'.'.$request->category_image->extension();  
            //$request->category_image->move(public_path('uploads/category'), $category_image);
            //$category_model->category_image = $category_image;
            $category_image   = $request->file('category_image');
            $filename         = time().'_'.$category_image->getClientOriginalName();
            //echo $filename; exit();
            $category_image->move(public_path('uploads/category').'/original/',$filename);
            
            $image_resize = Image::make(public_path('uploads/category').'/original/'.$filename);
            $image_resize->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('uploads/category').'/thumbnail/'.$filename);
            $category_model->category_image = $filename;
        } else {
            $category_model->category_image = null;    
        }
        $category_model->category_short_description = $request->short_desc;
        $category_model->category_long_description = $request->long_desc;
        $category_model->is_featured = $request->is_featured ? 1 : 0;
        //exit();

        $category_model->save();


        if($category_model->parent_id) {
            if($parent_cat_info->has_child != 1) { 
                 DB::table('categories')
                  ->where('category_row_id', $request->parent_id)
                  ->update([
                    'has_child'=> 1
                  ]);
            }
        }       
        $details = [
            'title' => 'Category Management',
            'body' => 'A new category "'.$request->category_name.'" has been created'
        ];
       
        \Mail::to('romeoasif@gmail.com')->send(new \App\Mail\UserNotification($details));
        Alert::success('Category Created Successfully!', 'success');    
        return Redirect::to('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $common_model = new Common();       
        $data['all_records'] = $common_model->allCategories();
        $data['single_info'] = DB::table('categories')->where('category_row_id', $id)->first();
        //dd($data['single_info']);
        return view('admin.category.edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
       // dd($request);
        $category_model = new Category();

        
        // check whether is it for edit
        if( !$request->category_row_id) {          
            return false;           
        }
      
        // receive all post values. 
        $category_model = $category_model->find($request->category_row_id); // edit operation.
        $category_model->category_name = $request->category_name;  
        $category_model->parent_id = $request->parent_id;   
        
        // parent changed ? 
        $parent_id_changed = 0;
        $prev_parent_id = DB::table('categories')->where('category_row_id', $request->category_row_id)->first()->parent_id;
        if($request->parent_id != $prev_parent_id) {
            $parent_id_changed = 1; // just status to understand parent id has been changed
        }
        
       
        // get level,  level = parent level + 1.
        $category_model->level = 0;
        if($category_model->parent_id)
        {
          // fetching modified parent id main category information
          $parent_cat_info =   DB::table('categories')->where('category_row_id',$category_model->parent_id)->first(); 
          $category_model->level = $parent_cat_info->level + 1;
        }                
                
                
        $category_model->save();
        
         
        // update has_child status of present parent         
        if($category_model->parent_id)
        {
           if($parent_cat_info->has_child != 1)
           { 
               DB::table('categories')->where('category_row_id', $request->parent_id)
                ->update([
                  'has_child'=> 1
                ]);
           }
        } 
        
        // update  has_child status of previous parent 
        if($parent_id_changed)
        {            
           $total_child_count = DB::table('categories')->where('parent_id', $prev_parent_id)->count();
           if($total_child_count == 0)
           {
                DB::table('categories')->where('category_row_id', $prev_parent_id)
                ->update([
                  'has_child'=> 0
                ]);
           }      
        } 
      
      Session::flash('success-message', 'Successfully Performed !');        
      return Redirect::to('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( !$id ) { 
        return false;
       }
       
       // main category Cannnot be deleted if it has child
       $has_child = DB::table('categories')->where('category_row_id', $id)->where('has_child', 1)->first();
       if($has_child) {           
        return false;
       }                             
       
       $parent_id = DB::table('categories')->where('category_row_id', $id)->first()->parent_id;                                                
       DB::table('categories')->where('category_row_id', $id)->delete(); 
       
       // has child of status of parent id.
       if($parent_id) {
        if( !DB::table('categories')->where('parent_id', $parent_id)->count()) {
           DB::table('categories')
                ->where('category_row_id', $parent_id)
                ->update([
                  'has_child'=> 0
                ]);
           }      
       }  
       
       
       //Session::flash('success-message', 'Successfully Deleted !');        
       Alert::toast('Category Deleted Successfully!', 'success');
       return Redirect::to('/admin/category');
    }
}
