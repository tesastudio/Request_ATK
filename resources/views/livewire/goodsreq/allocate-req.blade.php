<div>
    {{-- @section('content') --}}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-6">
          <div class="col-sm-6">
            <h1>{{ $header_title }} </h1>
          </div>
          <div>
            <div class="col-sm-12" style="text-align: right;">
              <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Next</a>
            </div>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Goods List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name of Goods</th>
                      <th>Qty Request</th>
                      <th>Unit</th>
                      <th>Qty Avail</th>
                      <th>Create by</th>
                      <th>Dept Request</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($goodslist as $item)
                      <tr>
                        {{-- 'goods_reqs.id','depts.deptname', 'usercreated.name as created','userdept.name as depthead' , 'item.name','item.goods_type','goods_req_dets.req_qty','goods_req_dets.unit']); --}}
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->req_qty }}</td>
                        <td>{{ $item->unit }}</td>
                        <td>{{ $item->qty_oh }}</td>
                        <td>{{ $item->created }}</td>
                        <td>{{ $item->deptname }}</td>
                        {{-- <td>{{ $item->goods_type }}</td> --}}
                        <td>
                          {{-- <a href="{{ url('admin/admin/select/'.$item->id ) }}" class="btn-xs btn-primary">Select</a>  --}}
                          <a wire:click="select({{ $item->id }})" class="btn btn-warning btn-xs">Select</a>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          {{-- <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Selected Goods</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name of Goods</th>
                      <th>Type</th>
                      <th>Qty</th>
                      <th>Unit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($goodsreqdet as $item_req)
                      <tr>
                        <td>{{ $item_req->id }}</td>
                        <td>{{ $item_req->name }}</td>
                        <td>{{ $item_req->goods_type }}</td>
                        <td>{{ $item_req->req_qty }}</td>
                        <td>{{ $item_req->unit }}</td>
                        <td>
                          <a wire:click="unselect({{ $item_req->id }})" class="btn btn-danger btn-xs">UnSelect</a>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="col-sm-10">
            <button type="button" class="btn btn-primary" wire:click="submit()">Process</button>
            <button type="button" class="btn btn-warning" wire:click="clearall()">Clear All</button>
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div> --}}
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row -->
        
        <!-- /.row -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Launch static backdrop modal
        </button>
      </div><!-- /.container-fluid -->
    </section>


  </div>

  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


{{-- @endsection --}}
</div>