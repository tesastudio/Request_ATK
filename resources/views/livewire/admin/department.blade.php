<div>
    {{-- @section('content') --}}
    <div class="content-wrapper">
            <!-- START FORM -->
            @if ($errors->any())
                <div class="pt-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="pt-3">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <form>
                    @csrf
                    <div class="mb-3 row">
                        <label for="deptname" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" wire:model="deptname">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="depthead" class="col-sm-2 col-form-label">Depthead</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" wire:model="depthead">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            @if ($updateData == false)
                            <button type="button" class="btn btn-primary" name="submit" wire:click="store()">SIMPAN</button>
                            @else
                            <button type="button" class="btn btn-primary" name="submit" wire:click="update()">UPDATE</button>
                            @endif
                            <button type="button" class="btn btn-primary" name="submit" wire:click="clear()">CLEAR</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- AKHIR FORM -->
        
            <!-- START DATA -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h1>Data Department</h1>
                <div class="pb-3 pt-3">
                    <input type="text" class="form-control mb-3 w-25" placeholder="Search.." wire:model.live="katakunci">
                </div>
                @if ($department_selected_id)
                <a wire:click="delete_confirmation('')" class="btn btn-danger btn-sm mb-3"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">Del {{ count($department_selected_id) }} data</a>
                @endif
                <table class="table table-striped table-sortable">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="col-md-1">No</th>
                            <th class="col-md-4 sort @if ($sortColumn=='deptname'){{ $sortDirection }}  @endif" wire:click="sort('deptname')">Dept Name</th>
                            <th class="col-md-3 sort @if ($sortColumn=='depthead'){{ $sortDirection }}  @endif" wire:click="sort('depthead')">Dept Head</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataDepartment as $key=>$value)
                            
                        <tr>
                            <td><input type="checkbox" wire:key="{{ $value->id }}" value="{{ $value->id }}" wire:model.live="department_selected_id"></td>
                            <td>{{ $dataDepartment->firstItem() + $key }}</td>
                            <td>{{ $value->deptname }}</td>
                            <td>{{ $value->depthead }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Edit</a>
                                <a wire:click="delete_confirmation({{ $value->id }})" class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">Del</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $dataDepartment->links() }}
            </div>
            <!-- AKHIR DATA -->
            <div wire:ignore.self class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p>Yakin ingin menghapus data ini</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                      <button type="button" class="btn btn-primary" wire:click="delete()" data-bs-dismiss="modal">Ya</button>
                    </div>
                  </div>
                </div>
              </div>
    </div>
    {{-- @endsection --}}
</div>
