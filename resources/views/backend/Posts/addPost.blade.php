
@extends('layouts.backendlayout')

@section('backend')


<div class="container  mt-3 pt-4">

    <div class="card">
        <div class="card-header">Add Post</div>
        <div class="card-body">
            <form action=" {{ route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                @method('post')


                <div class="my-3">  
                    <input name="title" type="text" class="form-control my-2" placeholder="post title">
                       </div>

                       <div>  
                        <input name="featuredImg" type="file" class="form-control my-3">
                           </div>

                               
                           <div class="row">

                            <div class="col-lg-6">
                                <select name="category"  class="form-control my-2 categorySelect">
                                    <option disabled selected>Select Category</option>
                                    @foreach ($categories as $category )
                                              <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                            
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <select name="subcatagory" class="form-control my-2 subcategorySelect">
                                    <option disabled selected>Select Category</option>
                                </select>
                            </div>
                           </div>




                           <div class="my-3">
                            <textarea name="content"  id="editor" placeholder="Content Goes Here...."></textarea>
                           </div>
                           <button class="btn btn-primary">Submit</button>


            </form>
        </div>
    </div>


</div>
    


@push('customJs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!---<script>

$('.deleteBtn').click(function (event){
  event.preventDefault()
    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
   $(this).next('form').submit()
  }
});

});

    </script>---->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    
    
    
    <script>
    
        //$.ajax({
            //URL
            //method
            //data
            //success
            //error
       // })
    
      //class hole . diya class ay name
      //$('.categorySelect')
     // R ID hole  # diya nam dita hobe
      //$('#categorySelect')//
     
    
     
      $('.categorySelect').change(getSubcategory)  
      function getSubcategory() {
           //alert('hi')
           $.ajax({
    
            url:`{{ route('subcategory.get') }}`,
            method:'get',
            data: {
                categoryId:$(this).val()
                   },
            success:function(res){
        
                let options=[]
                if(res.length >0){
         
                    res.forEach(subcatagory => {
    
                   let optionTag = `<option value="${subcatagory.id}">${subcatagory.title}</option>`
                     options.push(optionTag)
    
                    })
                        $('.subcategorySelect').html(options)
                }else{
                       
                    let optionTag = `<option disable selected>no subcategory has been found</option>`
                    $('.subcategorySelect').html(optionTag)
                }
            
            }
            
    
           });
           
      };
          </script>
    
    
    
    @endpush
    
    @endsection











