<a href="{{ route('create') }}">Create Store</a><br><br>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Loja</th>
        <th>Ações</th>
    </thead>
    <tbody>
    @foreach($stores as $store)
        <tr>
            <td>{{ $store->id }}</td>
            <td>{{ $store->name }}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $stores->links() }}

