<x-backend>
     <main class="app-content">
      <div class="app-title">
      <div>
        <h1> <i class="icofont-list"></i>Invoice </h1>
      </div>
      <ul class="app-breadcrumb breadcrumb side">
        <a href="{{ route('backside.order.index') }}" class="btn btn-outline-primary">
          <i class="icofont-double-left icofont-1x"></i>
        </a>
      </ul>
    </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i>JetPack</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">{{$order->orderdate}}</h5>
                </div>
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>JetPack Mall</strong><br>Pan Ta Naw St<br>Sanchanug<br>Yangon<br>Email: jetpack@gmail.com</address>
                </div>
                <div class="col-4">To
                  <address><strong>{{$order->user->name}}</strong><br>{{$order->user->address}}<br>Phone: {{$order->user->phone}}<br>Email: {{$order->user->email}}</address>
                </div>
                <div class="col-4"><b>Invoice #007612</b><br><br><b>Order ID:</b> {{$order->voucherno}}<br><b>Payment Due:</b> 2/22/2014<br><b>Account:</b> 968-34567</div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
                        <th>Product</th>
                        <th>Serial</th>
                        <th>Description</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i = 1; @endphp 
                      @foreach($order->items as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->codeno}}</td>
                        <td>{{$item->description}}</td>
                        <td>$ {{$item->price}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </main>
</x-backend>