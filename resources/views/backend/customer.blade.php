<x-backend>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Item </h1>
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
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th> No. </th>
                                        <th> Name </th>
                                        <th> Phone</th>
                                        <th> Address </th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($customers as $customer)
                                    @php
                                    $name = $customer->name;
                                    $profile = $customer->profile;
                                    $email = $customer->email;
                                    $phone = $customer->phone;
                                    $address = $customer->address;
                                    $status = $customer->status;
                                    @endphp
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> 
                                            <div class="d-flex no-block align-items-center">
                                                <div class="mr-3">
                                                    <img src="{{ asset($profile) }}"
                                                    alt="user" class="rounded-circle" width="50"
                                                    height="45" />
                                                </div>
                                                <div class="">
                                                    <h5 class="text-dark mb-0 font-16 font-weight-medium">{{$name}}</h5>
                                                    <span class="text-muted font-14">
                                                        {{$email}}  
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td> {{$phone}} </td>
                                        <td> 
                                            {{$address}}
                                        </td>
                                        <td>{{$status == 1 ? 'Active' : 'Inactive'}}</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">
                                                <i class="icofont-ui-settings icofont-1x"></i>
                                            </a>
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