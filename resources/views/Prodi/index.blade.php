<h1>Program Studi</h1>
<table>

<tr>
    <th>nama</th>
    <th>singkatan</th>
    <th>kaprodi</th>
    <th>sekretaris</th>
    <th>fakultas</th>
</tr>
@foreach($prodi as $item)
<tr>
    <td>{{$item->nama}}</td>
    <td>{{$item->singkatan}}</td>
    <td>{{$item->kaprodi}}</td>
    <td>{{$item->sekretaris}}</td>
    <td>{{$item->fakultas->nama}}</td>
    
</tr>
@endforeach
</table>