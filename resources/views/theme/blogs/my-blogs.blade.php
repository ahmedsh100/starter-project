@extends('theme.master')
@section('title', 'My BLogs')

@section('content')
    @include('theme.partials.hero', ['title' => 'My BLogs'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col" width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            @if (count($blogs)>0)
                                @foreach ( $blogs as $blog )
                                <tr>
                                  <td>
                                    <a href="{{route('blogs.show',['blog'=>$blog])}}" target="_blank">
                                    {{$blog->name}}
                                    </a>
                                  </td>
                                  <td>
                                    <a href="{{route('blogs.edit',['blog'=>$blog])}}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger mr-2">Delete</a>
                                  </td>
                                </tr>              
                                @endforeach
                            @endif
                        </tbody>
                      </table>
                      @if (count($blogs)>0)
                      {{$blogs->render("pagination::bootstrap-4")}}

                      @endif
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
