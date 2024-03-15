<x-backend>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Subategory </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.subcategory.create') }}" class="btn btn-outline-primary">
                    <i class="icofont-plus icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    @if(session('successMsg') != NULL)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>SUCCESS!</strong> {{session('successMsg')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $i = 1;
                                @endphp
                                @foreach($subcategories as $subcategory)
                                @php
                                $id = $subcategory->id;
                                $name = $subcategory->name;
                                $photo = $subcategory->photo;
                                $categoryid = $subcategory->category_id;
                                $category = $subcategory->category->name;
                                @endphp
                                <tr>
                                    <td> {{$i++}} </td>
                                    <td><img src="{{asset($photo)}}" class="img-fluid" style="width: 90px; object-fit: cover;">
                                         {{$name}} </td>
                                    <td> {{$category}} </td>
                                    <td>
                                        <a href=" {{route('backside.subcategory.edit',$id)}} " class="btn btn-warning">
                                            <i class="icofont-ui-settings icofont-1x"></i>
                                        </a>
                                        <form action="{{ route('backside.subcategory.destroy',$id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-outline-danger" type="submit"> 
                                                <i class="icofont-close icofont-1x"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</x-backend>