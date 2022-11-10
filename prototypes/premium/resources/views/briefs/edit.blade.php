<form action="{{route('brief.update', $brief->token)}}" method="post">
    @csrf
    @method('put')
    <input type="text" name='name' value="{{$brief->name}}">
    <input type="date" name="livraisonDate" value="{{$brief->livraisonDate}}">
    <input type="date" name="recuperationDate" value="{{$brief->recuperationDate}}">
    <button type="submit">update</button>
</form>

<table>
    <thead>
        <tr>
            <th>nom</th>
            <th>Date debut</th>
            <th>Date de fin</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($taches as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->startDate}}</td>
                <td>{{$value->endDate}}</td>
                <td>
                    <a href="{{route('tache.edit', $value->id)}}">edit</a>
                    <form action="{{route('tache.destroy', $value->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>