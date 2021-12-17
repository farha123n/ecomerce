<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Product;
use App\Models\Category;
use App\Models\Common;
use DB;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;
use PDF;

class ProductController extends Controller
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
        //echo "view product";
        $common_model = new Common();  
        $data['all_records'] = $common_model->allProducts();
        //dd($data['all_records']);    
        return view('admin.product.index', ['data'=>$data]);
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
        return view('admin.product.create', ['data'=>$data]);
        
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
        $product_model = new Product();

        $product_model->product_name = $request->product_name;  
        $product_model->product_base_price = $request->product_base_price;
        $product_model->product_offer_price = $request->product_offer_price;

        $product_model->product_height = $request->product_height ? $request->product_height : null;
        $product_model->product_width = $request->product_width ? $request->product_width : null;
        $product_model->product_weight = $request->product_weight ? $request->product_weight : null;
        
        $product_model->category_row_id = $request->category_row_id;
        $product_model->product_sku = $request->product_sku;

        if($request->product_image){
            $product_image   = $request->file('product_image');
            $filename         = time().'_'.$product_image->getClientOriginalName();
            $product_model->product_image = $filename; 
        } else {
            $product_model->product_image = null;    
        }

        $product_model->product_short_description = $request->product_short_description ? $request->product_short_description : null;
        $product_model->product_long_description = $request->product_long_description ? $request->product_long_description : null;
        $product_model->is_featured = $request->featured_product ? 1 : 0;

        $product_model->save();
        $id = $product_model->product_row_id;
        //echo $product_model->product_row_id; exit();
        
        if($request->product_image){
            $product_image->move(public_path('uploads/products/').$id.'/original/',$filename);
            
            $image_resize = Image::make(public_path('uploads/products/').$id.'/original/'.$filename);
            $image_resize->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $save_path = public_path('uploads/products/').$id.'/thumbnail/';
            if (!file_exists($save_path)) {
                mkdir($save_path, 777, true);
            }
            $image_resize->save(public_path('uploads/products/').$id.'/thumbnail/'.$filename);
        }

        Alert::success('Product Added Successfully!', 'success');    
        return Redirect::to('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $common_model = new Common();  
        $filter_category = $common_model->filter_category();
        $categories = Category::where('parent_id', $id)->pluck('category_row_id');
        //dd($categories);
        $products = Product::whereIn('category_row_id', $categories)->get()->toArray();
        //dd($products);
        return view('products.all', compact('filter_category', 'products'));
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
        $data['single_info'] = DB::table('Products')->where('product_row_id', $id)->first();
        //dd($data['single_info']);
        return view('admin.product.edit', ['data'=>$data]);
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
        //dd($request);
        $product_model = new Product();

        
        // check whether is it for edit
        if( !$request->product_row_id) {          
            return false;           
        }
      
        // receive all post values. 
        $product_model = $product_model->find($request->product_row_id); // edit operation.
        $product_model->product_name = $request->product_name;  
        //$product_model->parent_id = $request->parent_id;
        DB::table('products')->where('product_row_id', $id)
        ->update([
            'product_name' =>$request['product_name'], 'category_row_id' =>$request['category_row_id'
        ]]);   
        
        // // parent changed ? 
        // $parent_id_changed = 0;
        // $prev_parent_id = DB::table('categories')->where('category_row_id', $request->category_row_id)->first()->parent_id;
        // if($request->parent_id != $prev_parent_id) {
        //     $parent_id_changed = 1; // just status to understand parent id has been changed
        // }
        
       
        // // get level,  level = parent level + 1.
        // $product_model->level = 0;
        // if($product_model->parent_id)
        // {
        //   // fetching modified parent id main category information
        //   $parent_cat_info =   DB::table('categories')->where('category_row_id',$product_model->parent_id)->first(); 
        //   $product_model->level = $parent_cat_info->level + 1;
        // }                
                
                
        // $product_model->save();
        
         
        // // update has_child status of present parent         
        // if($product_model->parent_id)
        // {
        //    if($parent_cat_info->has_child != 1)
        //    { 
        //        DB::table('categories')->where('category_row_id', $request->parent_id)
        //         ->update([
        //           'has_child'=> 1
        //         ]);
        //    }
        // } 
        
        // // update  has_child status of previous parent 
        // if($parent_id_changed)
        // {            
        //    $total_child_count = DB::table('categories')->where('parent_id', $prev_parent_id)->count();
        //    if($total_child_count == 0)
        //    {
        //         DB::table('categories')->where('category_row_id', $prev_parent_id)
        //         ->update([
        //           'has_child'=> 0
        //         ]);
        //    }      
        // } 
      
      Session::flash('success-message', 'Successfully Performed !');        
      return Redirect::to('/admin/product');
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
       DB::table('products')->where('product_row_id', $id)->delete();
            
       //Session::flash('success-message', 'Successfully Deleted !');        
       Alert::toast('Product Deleted Successfully!', 'success');
       return Redirect::to('/admin/product');
    }

    public function downloadProducts(){
        $allProducts = Product::with('getCategory')->get();
        //dd($allProducts);
        $pdf = PDF::loadView('admin.product.pdf', compact('allProducts'));
        return $pdf->download('all_products.pdf');
    }
}
