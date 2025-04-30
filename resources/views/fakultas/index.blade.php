<h1>Fakultas</h1>

<table>
    <tr>
        <th>Nama</th>
        <th>singkatan</th>
        <th>dekan</th>
        <th>wakil dekan</th>
    </tr>
@foreach($fakultas as $item)
    <tr>
        <td>{{$item->nama}}</td>
        <td>{{$item->singkatan}}</td>
        <td>{{$item->dekan}}</td>
        <td>{{$item->wakil_dekan}}</td>
    </tr>

@endforeach
</table>