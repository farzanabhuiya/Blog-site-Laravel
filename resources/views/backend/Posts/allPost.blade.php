



@extends('layouts.backendlayout')

@section('backend')


<div class="container">
    <table class="table">
<tr>
        <td>#</td>
        <td><h4>Post Title</h4></td>
        <td><h4>Popular</h4></td>
    </tr>

@foreach ($posts as $post)
<tr>
    <td>#</td>
    <td>{{ $post->title }}</td>
    <td>
        
        <span data-id="{{ $post->id }}" class="text- warning statusBtn">
            <i class="fa-{{ $post->is_popular == 1 ? "solid" : "regular"  }} fa-star"></i>
       </td>
</tr>
@endforeach
   
    </table>
</div>
    


@push('customJs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>


    <script>
        function liveStatusUpdate (event){
         $.ajax({

            url:`{{ route('post.status') }}`,
            method:'get',
            data:{
                    id:$(this).attr('data-id')
            },
           success: function(res){
               
            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
               showConfirmButton: false,
               timer: 3000,
              timerProgressBar: true,
             didOpen: (toast) => {
       toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
                   }
                });

           if(res =='success')
           {
            event.currentTarget.innerHTML = `<i class="fa-solid fa-star"></i>`

            Toast.fire({
            icon: "success",
             title: "Your post has added in popular"
       });
           }
           else
           {
            event.currentTarget.innerHTML = `<i class="fa-regular fa-star"></i>`

            Toast.fire({
             icon: "error",
             title: "Your post has been remove in popular"
                  });
           }
           }
         })
        }

        $('.statusBtn').click(liveStatusUpdate)
     </script>
    @endpush
    
    @endsection