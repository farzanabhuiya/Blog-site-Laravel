


@extends('layouts.backendlayout')

@section('backend')


<div class="container  mt-5 pt-4">
    <div class="row">
        <div class="col-lg-8">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                 @foreach ( $categories as $key=>$category)
     

                <tr>
                    <td>{{ $categories->firstItem() + $key }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <a href="{{ route('category.edit',$category->slug) }}" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm deleteBtn">Delete</a>
                        <form action="{{ route('category.delete',$category->id)}}" method="post">
                        @csrf
                    @method('DELETE')
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>
            <div>
            {{ $categories->links()}}
            </div>
        </div>



        <div class="col-lg-4">
           <div class="card">
            <div class="card-header">
                <h2>{{ $edit ? "Edit" : "Add"}} Catagory</h2>
            </div>
            <div class="card-body">
                <form action="{{  $edit ? route('category.update',$edit->slug):route('category.store') }}" method="post">
                    @csrf
                    @if ($edit)
                    @method('put')
                    @endif
                   
                    <input value="{{$edit ? $edit->title : '' }}"  name="title" type="text" class="form-control my-2" placeholder="">
                    <button class="btn btn-primary" type="submit"> {{ $edit ? "Update" : "Add"}}Category</button>
                </form>
            </div>
           </div>
        </div>
    </div>
</div>







@push('customJs')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

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

    </script>
@endpush

@endsection