<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\requests\create_categories_request;
use App\Models\Categories;
use Validator, Str;

class CategoryController extends Controller
{
    public function __construct(){

       $this->middleware('auth');
       //$this->middleware('isadmin');
       $this->middleware('Middleware_Permission');
       $this->middleware('userstatus');
    }


    public function getcategory(Request $request){

        $category = categories::select('*')->OrderBy('id_category', 'desc')->paginate(10);

        return view('admin.category.index', compact('category'));
    }


    public function categoryadd(Request $request, $id_category=null){


        $type = $request->get('type');
        $data = $request->get('data');

       if($id_category != null):
        $category = categories::buscarpor($type, $data)->select('*')->where('id_category', '=', $id_category)->OrderBy('id_category', 'desc')->paginate(10);

        return view('admin.category.create',compact('category'));
    else:
            $category = categories::buscarpor($type, $data)->select('*')->OrderBy('id_category', 'desc')->paginate(10);

        return view('admin.category.create',compact('category'));
    endif;
    
    }



    public function categoryStore(Request $request){

         
     $rules = [


            'name'=>'required|unique:categories',
            'module'=>'required',
            'icon'=>'required',




     ];
       


        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()):
            

            return back()->withErrors($validator)->withInput()->with('message', 'Se ha producido un error')->with('typealert', 'danger');

        else:

            $category = new Categories;
            $category->name = e($request->input('name'));
            $category->module = $request->get('module');
            $category->icon = e($request->input('icon'));
            $category->slug = Str::slug($request->input('name'));
            $category->save();

         return back()->with('message', 'Datos registrados correctamente')->with('typealert', 'success');
         
         endif;

    }


    public function categoryedit(Request $request, $id_category, $search=''){


        $type = $request->get('type');
        $data = $request->get('data');

        if($search == null):
        $category = categories::buscarpor($type, $data)->select('*')->OrderBy('id_category', 'desc')->paginate(10);
        $categorys = categories::findOrFail($id_category);
        return view('admin.category.edit',compact('categorys', 'category'));

         else:

        $category = categories::buscarpor($type, $data)->select('*')->where('id_category', '=', $search)->get();
        $categorys = categories::findOrFail($id_category);


        return view('admin.category.edit',compact('categorys', 'category'));
        endif;


    }

    public function categoryupdate(Request $request, $id_category){


        $rules = [

          
            'name'=>'required',
            'module'=>'required',
            'icon'=>'required',


        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()):

            return back()->withErrors($validator)->withInput()->with('message', 'Se ha producido un error')->with('typealert', 'danger');

         else:

        $category = categories::findOrFail($id_category);
         $category->name = e($request->input('name'));
         $category->module = $request->get('module');
         $category->icon = e($request->input('icon'));
         //$category->slug = Str::slug($request->input('name'));
         $category->update();

         return redirect('/admin/categories/create/register')->with('message', 'Datos Actualizados correctamente')->with('typealert', 'success');

     endif;
    }


    public function categorydelete($id)
    {

        $category = categories::find($id);
        
        $category->delete();
        return back()->with('message', 'Registro eliminado correctamente')->with('typealert', 'danger');;


    }




}


