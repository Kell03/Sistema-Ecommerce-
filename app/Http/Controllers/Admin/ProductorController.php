<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\products;
use App\Models\product_gallery;
use Validator, Str, Config, Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProductorController extends Controller
{
    public function __construct(){

       $this->middleware('auth');
       //$this->middleware('isadmin');
       $this->middleware('Middleware_Permission');
       $this->middleware('userstatus');
    }

    public function getproduct(Request $request, $estado=null){


        $type = $request->get('type');
        $data = $request->get('data');

        if($estado == '1' || $estado == '0'  ):

        $product = products::buscarpor($type,$data)->where('status', $estado)->select('*')->OrderBy('id_products', 'desc')->simplepaginate(10);

    
    elseif($estado == 'trash'):
        $product = products::buscarpor($type,$data)->onlyTrashed()->OrderBy('id_products', 'desc')->simplepaginate(10);

    elseif( $estado == null):
        $product = products::buscarpor($type,$data)->select('*')->OrderBy('id_products', 'desc')->simplepaginate(10);
    endif;

        return view('admin.products.index', compact('product'));
    }

    public function productadd(Request $request){

        
        return view('Admin.products.create', [
          
          'product' => new products,
          'category'=> Categories::get(),


        ]);
    }


    public function productstore(Request $request)
    {

         
  
    //

          $id = IdGenerator::generate(['table' => 'products', 'length' => 6, 'prefix' => "P-"]);

       



        $rules =[

           'name'=>'required|unique:products',
            'amount'=>'required|numeric|min:1',
            'img'=>'required',
           'category'=>'required',
            'prize'=>'required|numeric|min:1',
            'discount'=>'numeric',
            'total'=>'required|numeric|min:1',
            'description'=>'',


        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('message','Se ha producido un error')->with('typealert', 'danger');
        else:


            $path = '/'.date('y-m-d');
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, ' ' ,$request->file('img')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt; // rand para  crear un numero aleatorio yno se repita la variable
            $final_file = $upload_path.'/'.$path.'/'.$filename; 


            //codigo autoincremental
            $id = IdGenerator::generate(['table' => 'products', 'length' => 6, 'prefix' => "P-"]);

       


            $products = new products;
            $products->name =  e($request->input('name'));
            $products->amount = $request->get('amount');
            $products->category = $request->get('category');
            $products->status = $request->get('status');
            $products->id = $id;
            $products->img = $filename;
            $products->fecha = date('y-m-d');
            $products->prize = $request->get('prize');
            $products->discount = $request->get('discount');
            $products->total = $request->get('total');
            $products->description = $request->get('description');
            $products->slug = Str::slug($request->input('name'));
            //return $products->img = $request->get('img');;

            $products->save();

            if($request->hasFile('img')):

                $fi= $request->img->storeAs($path, $filename, 'uploads');
                $img = Image::make($final_file);
                $img->fit(50,50, function($constraint){
                    $constraint->upsize();
                });
                $img->save($upload_path.'/'.$path.'/t_'.$filename);


            endif;

            return redirect('admin/products')->with('message', 'Producto registrado exitosamente')->with('typealert', 'success');

        endif;

    }


    public function productedit(Request $request ,$id_products){







        $type = $request->get('type');
        $data = $request->get('data');
        $product =  products::findOrFail($id_products);
        $pg = product_gallery::select('*','product_gallery.fecha as fecha_gallery')->join('products as p', 'p.id_products', '=', 'product_gallery.product_Id')->where('product_gallery.product_id', '=', $id_products)->get();
        $Categories = Categories::get(); 


        return view('admin.products.edit',[

         'pg'=> $pg,
         'product'=> $product,
         'category'=> Categories::get(),


        ]);


    }

    public function productsupdate(Request $request, $id_products){


        $rules =[

            'name'=>'required',
            'amount'=>'required|numeric|min:1',
            'img'=>'',
            'category'=>'required',
            'prize'=>'required|numeric|min:1',
            'discount'=>'numeric',
            'total'=>'required|numeric|min:1',
            'description'=>'',


        ];




        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()):
            return back()->withErrors($validator)->withInput()->with('message','Se ha producido un error')->with('typealert', 'danger');
        else:

            if($request->file('img') == null):



            $products = products::findOrFail($id_products);
            $products->name =  e($request->input('name'));
            $products->amount = $request->get('amount');
            $products->category = $request->get('category');
            $products->status = $request->get('status');
            $products->prize = $request->get('prize');
            $products->discount = $request->get('discount');
            $products->total = $request->get('total');
            $products->description = $request->get('description');
            //$products->slug = Str::slug($request->input('name'));
            $products->update();



            return redirect('admin/products')->with('message', 'Producto actualizado exitosamente')->with('typealert', 'success');



            else:

             $path = '/'.date('y-m-d');
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, ' ' ,$request->file('img')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt; // rand para  crear un numero aleatorio yno se repita la variable
            $final_file = $upload_path.'/'.$path.'/'.$filename; 

            $products = products::findOrFail($id_products);
            $image_preview = $products->img;
            $products->name =  e($request->input('name'));
            $products->amount = $request->get('amount');
            $products->category = $request->get('category');
            $products->img = $filename;
            $products->img = date('y-m-d');
            $products->prize = $request->get('prize');
            $products->discount = $request->get('discount');
            $products->total = $request->get('total');
            $products->description = $request->get('description');
            //$products->slug = Str::slug($request->input('name'));
            $products->update();

             if($request->hasFile('img')):

                $fi= $request->img->storeAs($path, $filename, 'uploads');
                $img = Image::make($final_file);
                $img->fit(50,50, function($constraint){
                    $constraint->upsize();
                });


              unlink($upload_path.'/'.$path.'/'.$image_preview);
                unlink($upload_path.'/'.$path.'/t_'.$image_preview);
                $img->save($upload_path.'/'.$path.'/t_'.$filename);





            endif;

            return redirect('admin/products')->with('message', 'Producto actualizado exitosamente')->with('typealert', 'success');

          endif;

        endif;



    }


    public function addImage(Request $request, $id){


        $rules = [
            
            'image'=>'required',



        ];


        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()):

            return redirect()->back()->withErrors($rules)->withInput()->with('message','Se ha producido un error')->with('typealert', 'danger');

          else:


            $path = '/'.date('y-m-d');
            $fileExt = trim($request->file('image')->getClientOriginalExtension());
            $upload_path = Config::get('filesystems.disks.uploads.root');
            $name = Str::slug(str_replace($fileExt, ' ' ,$request->file('image')->getClientOriginalName()));
            $filename = rand(1,999).'-'.$name.'.'.$fileExt; // rand para  crear un numero aleatorio yno se repita la variable
            $final_file = $upload_path.'/'.$path.'/'.$filename; 

            $gallery = new product_gallery;
            $gallery->product_id = $id;
            $gallery->image = $filename;
            $gallery->fecha = date('y-m-d');
            $gallery->save();

              if($request->hasFile('image')):

                $fi= $request->image->storeAs($path, $filename, 'uploads');
                $img = Image::make($final_file);
                $img->fit(50,50, function($constraint){
                    $constraint->upsize();
                });
                $img->save($upload_path.'/'.$path.'/t_'.$filename);




            endif;

            return redirect()->back()->with('message', 'Imagen guardada exitosamente')->with('typealert', 'success');








        endif;




    }




    public function productdestroy($id_products){


        $products = products::findOrFail($id_products);
     

        $products->delete();

        return back()->with('message', 'Producto Eliminado exitosamente')->with('typealert', 'success');
    }

    public function product_gallerydestroy($id){

      
         $gallery = product_gallery::findOrFail($id);
         $image = $gallery->image;
         $fecha = $gallery->fecha;
         $upload_path = Config::get('filesystems.disks.uploads.root');
         $gallery->delete();
         unlink($upload_path.'/'.$fecha.'/'.$image);
         unlink($upload_path.'/'.$fecha.'/t_'.$image);

         return back()->with('message', 'Imagen Eliminada exitosamente')->with('typealert', 'success');



    }

    public function productrestore($id_products){

    $products = products::withTrashed()->where('id_products',$id_products)->first();
    $products->deleted_at =  null;
    $products->restore();
    return redirect('/admin/products')->with('message', 'Producto restaurado exitosamente')->with('typealert', 'success');

    }
}
