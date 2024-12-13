<div>
    @section('content')
    <div class="content-wrapper">
        <livewire:contact-create/>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($data as $contact)
            <?php $no++; ?>
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->phone }}</td>
            <td>
                <button class="btn btn-sm btn-info text-white">Edit</button>
                <button class="btn btn-sm btn-danger text-white">Edit</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
@endsection
</div>
