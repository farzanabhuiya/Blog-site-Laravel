


@extends('layouts.backendlayout')

@section('backend')


<div class="container  mt-4 pt-3">
    <div class="row">
        <div class="col-lg-8">
            <table class="table">
            <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Parent Category</th>
                </tr>
    @foreach ($subCatagories as $subCatagory )
           <tr>
                    <th>#</th>
                    <th>{{$subCatagory->title }}</th>
                    <th>{{ $subCatagory->category->title }}</th>
                </tr>
    @endforeach
            </table>
            
        </div>



        <div class="col-lg-4">
           <div class="card">
            <div class="card-header">
                <h2>Sub Catagory</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('subcategory.store') }}" method="post">
                    @csrf
                   
                    <input value=""  name="title" type="text" class="form-control my-2" placeholder="Category">
                    <select name="category_id" class="form-control my-2">
                        @forelse ($categories as $category )
                        <option value="{{  $category->id }}">{{ $category->title }}</option>
                        @empty
                        <option disabled selected>No catrgory found</option>
                        @endforelse
                               
                              
                    </select>
                    <button class="btn btn-primary" type="submit"> SubCategory</button>
                </form>
            </div>
           </div>
        </div>
    </div>
</div>
@endsection