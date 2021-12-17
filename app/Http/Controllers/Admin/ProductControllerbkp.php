<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
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
        //echo 'This is our product Page';
        $data['all_records']=product::all();
         return view('admin.product.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $data['all_records']=product::all();
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
        $product_model=new product();

        $product_model->product_name=$request->product_name;
        $product_model->product_price=$request->product_price;
        $product_model->product_height=$request->product_height;
        $product_model->product_width=$request->product_width;
        $product_model->product_weight=$request->product_weight;
        $product_model->category_row_id=$request->category_row_id;
        $product_model->product_sku=$request->product_sku;
         if($request->product_image){
            $product_image = time().'.'.$request->product_image->extension();  
            $request->product_image->move(public_path('uploads/products'), $product_image);
            $product_model->product_image = $product_image;
        } else {
            $product_model->product_image = null;    
        }
         $product_model->product_short_description = $request->product_short_description;
        $product_model->product_long_description = $request->product_long_description;
        $product_model->is_featured = $request->is_featured ? 1 : 0;
        $product_model->is_latest=$request->is_latest ? 1 : 0;
        $product_model->save();
        Alert::success('Product Created Successfully!', 'success');    
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
