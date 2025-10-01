@extends('theme.master')
@section('title', 'Register')

@section('content')
    @include('theme.partials.hero', ['title' => 'Add New Blog'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('blogs.store')}}" class="form-contact contact_form" method="post"
                        novalidate="novalidate" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input class="form-control border" name="name" type="text" placeholder="Enter your blog title"
                                value="{{old('name')}}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="customFile">
                                <label class="custom-file-label border" for="customFile">Choose blog image</label>
                            </div>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <select class="form-control border" name="category_id">
                                <option value="">Select Category</option>
                                @if (count($categories)>0)
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                @else
                                    <option value="">No categories available</option>
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <textarea class="w-100 border" name="description" placeholder="description" rows="4">{{old('description')}}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

    <script>
        // JavaScript 
        document.getElementById('customFile').addEventListener('change', function(e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : 'Choose blog image';
            document.querySelector('.custom-file-label').textContent = fileName;
        });
    </script>

    <style>
        .custom-file-input {
            cursor: pointer;
        }
        .custom-file-label {
            background-color: #fff;
            color: #495057;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            transition: all 0.15s ease-in-out;
        }
        .custom-file-label::after {
            content: "Browse";
            background-color: #e9ecef;
            border-left: 1px solid #ced4da;
            padding: 0.375rem 0.75rem;
            margin-left: auto;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>
@endsection
