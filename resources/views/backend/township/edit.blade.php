<x-backend>
    @php
    $id = $township->id;
    $name = $township->name;
    $price = $township->price;
    @endphp
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Township Edit Form </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.township.index') }}" class="btn btn-outline-primary">
                    <i class="icofont-double-left"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action=" {{route('backside.township.update',$id)}} " method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name_id" name="name" value=" {{$name}} ">
                                    <div class="text-danger form-control-feedback">
                                        {{$errors->first('name') }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="price_id" name="price" value=" {{$price}} ">
                                    <div class="text-danger form-control-feedback">
                                        {{$errors->first('price') }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <!-- button cannot be a-tag or type=button -->
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