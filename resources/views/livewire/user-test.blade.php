<div>
    {{-- @section('content') --}}
    User Test
    Ini dalam content       
    <form action="">
        <label for="">Dept</label>
        <input type="text" wire:model="dept">
        <button type="button" name="submit" class="btn btn-primary" wire:click="store()">Simpan</button>
    </form>
    {{-- @endsection --}}
    {{-- @section('bawah')
        Ini bawah ya
    @endsection --}}
</div>
