<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Category as ModelsCategory;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function AllCat(){
        
        // using eloquent
        
        // $categories=Category::all();
        //$categories=Category::latest()->get();
        $categories=Category::latest()->paginate(5);
        
        // using query builder 
        
        //$categories=DB::table('categories')->get();
        //$categories=DB::table('categories')->latest()->get();
        
        // one to many relationship using query builder
        // $categories=DB::table('categories')
        //             ->join('users','categories.user_id','users.id')
        //             ->select("categories.*",'users.name')
        //             ->latest()->paginate(5);
        
        
        
        //pagijnation
        //$categories=DB::table('categories')->latest()->paginate(5);




        return view('admin.category.index',compact('categories') );
    }
    public function AddCat(Request $request) {
        $validatedData = $request->validate( [
            'category_name' => 'required|unique:categories|max:225',
          
        ],[
            'category_name.required' => 'please input category name',
            'category_name.max' => 'category less then 255Chars',
          
        ]);
        // using eloquent
        
        Category::insert([
                'category_name'=>$request->category_name,
                'user_id'=>Auth::user()->id,
                'created_at'=>Carbon::now(),
            ]);
            
        // using eloquent

            // $category= new Category;
        // $category->category_name= $request->category_name;
        // $category->user_id= Auth::user()->id;
        // $category->save();


        // using query builder 

        // $data=array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=Auth::user()->id;
        // DB::table('categories')->insert($data);



        return Redirect()->back()->with('success','Category inserted Successfull');





    }

    public function EditCat($id){

        
        //using eloquent 
        // $categories=Category::find($id);


        //  using query builer 
        $categories=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));



    }

    public function Update (Request $request ,$id){
         //using eloquent 


        // $update = Category::find($id)->update([
        //     'category_name'=>$request->category_name,
        //     'user_id'=>Auth::user()->id
        // ]);


        
        //  using query builer
         $data=array();
        $data['category_name']=$request->category_name;
        $data['user_id']=Auth::user()->id;
        DB::table('categories')->update($data);


        return Redirect()->route('all.category')->with('success','Category Updated Successfull');


    }
}
