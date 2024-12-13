<div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal1">
    Tambah Product
  </button>
  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="Modal1">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="">
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" @error('name') is-invalid @enderror id="myInput" wire:model="name">
                @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Price</label>
                <input type="number" class="form-control" @error('price') is-invalid @enderror wire:model="price">
                @error('price')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent="store">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- <script>
    const myModal = document.getElementById('Modal1')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
    })
  </script> --}}
</div>

