<x-backend>
    @php
    $id = $brand->id;
    $name = $brand->name;
    $logo = $brand->logo;
    @endphp
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Brand Edit Form </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.brand.index') }}" class="btn btn-outline-primary">
                    <i class="icofont-double-left icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="{{ route('backside.brand.update',$id) }}" method="POST" enctype="multipart/form-data">
                            @csrf {{-- token sign for laravel => cross site request forgery --}}
                            @method('PUT')
                            <input type="hidden" name="oldLogo" value="{{$logo}}">
                            <div class="form-group row">
                                <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name_id" name="name" value="{{$name}}">
                                    <div class="text-danger form-control-feedback">
                                        {{$errors->first('name') }} {{-- error a myar gyi htae ka ta khu pl htoke chin --}}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Logo </label>
                                <div class="col-sm-10">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="home" aria-selected="true">Old Logo</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newprofile" role="tab" aria-controls="profile" aria-selected="false">New Logo</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="oldprofile" role="tabpanel" aria-labelledby="home-tab"><img src="{{asset($logo)}}" class="img-fluid w-25"></div>
                                        <div class="tab-pane fade" id="newprofile" role="tabpanel" aria-labelledby="profile-tab"><input type="file" id="photo_id" name="logo">
                                            <div class="text-danger form-control-feedback">
                                                {{$errors->first('photo') }} {{-- error array khan htae ka first array ko htoke chin --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="icofont-save"></i>
                                        Update
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-backend>