<h1>ola, essa é minha view</h1>

@foreach ($lista as $item)
 <p>
    id:{{$item->id}}
    name:{{$item->name}}
    email:{{$item->email}}
    password:{{$item->password}}
 </p>
 @endforeach

 <style>
table,
th,
td{
    border: 1px solid black;
    border-collapse: collaps;
 </style>

 @dump($lista)
 <table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
         </tr> 
    </thead>
    <tbody>
        @foreach ($lista as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
            