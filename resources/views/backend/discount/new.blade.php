<x-backend>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1> <i class="icofont-list"></i> New Discounts </h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <a href="{{ route('backside.discount.index') }}" class="btn btn-outline-primary">
          <i class="icofont-double-left icofont-1x"></i>
        </a>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <form action="{{ route('backside.discount.store') }}" method="POST" enctype="multipart/form-data">

              @csrf
              <div class="form-group row">
                <label for="photo_id" class="col-sm-2 col-form-label"> Product </label>
                <div class="col-sm-10">
                  <select class="form-control" name="product_id">
                    <option> Choose Product </option>
                    @foreach($products as $product)
                    <option value="{{ $product->id }}"> {{ $product->name }} </option>
                    @endforeach
                  </select>
                    <div class="text-danger form-control-feedback">
						{{$errors->first('product_id') }}
					</div>
                </div>
              </div>
              <div class="form-group row">
                <label for="photo_id" class="col-sm-2 col-form-label"> Type </label>
                <div class="col-sm-10">
                  <select class="form-control" name="type">
                    <option> Choose Discount Type </option>
                    <option value="fixed"> Fixed Amount </option>
                    <option value="percent"> Percentage </option>
                  </select>
                    <div class="text-danger form-control-feedback">
						{{$errors->first('type') }}
					</div>
                </div>
              </div>

              <div class="form-group row">
                <label for="value_id" class="col-sm-2 col-form-label"> Value </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="value_id" name="amount" placeholder="Discount value">
                    <div class="text-danger form-control-feedback">
						{{$errors->first('amount') }}
					</div>
                </div>
              </div>

              <div class="form-group row">
                <label for="valid_date_id" class="col-sm-2 col-form-label"> Valid Date </label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="valid_date_id" name="valid_date">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">
                    <i class="icofont-save"></i>
                    Save
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  @section('script_content')

  <script type="text/javascript">
    $(document).ready(function() {

      $('#i_description').summernote();


      $('.input-images').imageUploader();

    });
  </script>
  @endsection

</x-backend>