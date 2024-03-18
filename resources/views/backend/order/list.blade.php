<x-backend>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Order </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.item.create') }}" class="btn btn-outline-primary">
                    <i class="icofont-plus icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        @if(session('successMsg') != NULL)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> ✅ SUCCESS!</strong>
                            {{ session('successMsg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Brand</th>
                                        <th> Price </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                   
                                    <tr>
                                        <td> {{$i++}}. </td>
                                        <td> 
                                            <div class="d-flex no-block align-items-center">
                                                <div class="mr-3">
                                                    <img src=""
                                                    alt="user" class="rounded-circle" width="50"
                                                    height="45" />
                                                </div>
                                                <div class="">
                                                    <h5 class="text-dark mb-0 font-16 font-weight-medium"></h5>
                                                    <span class="text-muted font-14">
                                                       
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td> 
                                            
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info">
                                                <i class="icofont-info icofont-1x"></i>
                                            </a>

                                            <a href="" class="btn btn-warning">
                                                <i class="icofont-ui-settings icofont-1x"></i>
                                            </a>

                                            <form action="" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

                                               
                                                <button class="btn btn-outline-danger" type="submit"> 
                                                    <i class="icofont-close icofont-1x"></i>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-backend>