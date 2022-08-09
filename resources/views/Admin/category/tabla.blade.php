   
            <div class="panel shadow">


                <div class="header" ><h2 class="title"><i class="fa-solid fa-folder"></i> Category</h2> </div>

                <nav class="navbar navbar-expand-lg bg-light ">
                    <div class="navegacion">
                    <form class="row g-3">

                    <div class="col-auto">
                        <select class="form-select" name="type">
                            <option value="name"> Name</option>
                        </select>
                    </div>

                  <div class="col-auto">
                    <input type="text" name="data" class="form-control form-control-sm">
                    </div>
                    
                    <div class="col-auto">
                    <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
                    </div>
                </form>
                </div>

                </nav>



                <table class="table">
                    
                     <thead>
                         <tr>
                            <th>Id</th>
                           <th>Name</th>
                           <th>Module</th>
                           <th>Icon</th>
                           <th>Options</th>
                         </tr>   
                     </thead>
                     <tbody>
                        @foreach($category as $categories)
                         <tr>

                             
                             <td>{{$categories->id_category}}</td>
                             <td>{{$categories->name}}</td>
                             <td>{{$categories->module}}</td>
                             <td>{{$categories->icon}}</td>
                             <td>
                                 <div class="opts">
                                  <form action="{{route('category.delete', $categories->id_category)}}" method="POST">
                    
                    @csrf @method('DELETE')

                 @if(kvfj(auth::user()->permission, 'edit_category'))
                <a href="{{route('edit_category', $categories->id_category)}}" data-toggle="tooltip" data-bs-placement="top" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                @endif

                                     
                  {{-- elemento "a" como boton submit--}}

                  @if(kvfj(auth::user()->permission, 'category.delete'))
                   <a href="#" onclick='this.parentNode.submit(); return false;' data-toggle="tooltip" data-bs-placement="top" title="Eliminar" style="color:red"> 
                                               <i class="fa-solid fa-trash-can"></i></a>
                  @endif

                      {{-- elemento "a" como boton submit--}}


                </form>
                                           
                                      
                                  
                                 </div>
                             </td>
                         </tr>
                         @endforeach

                     </tbody>


                </table>
                
            </div>
