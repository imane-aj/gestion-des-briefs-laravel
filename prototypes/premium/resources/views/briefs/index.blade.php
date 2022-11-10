<a href="{{route('brief.create')}}">add brief</a>
@foreach ($briefs as $value)

    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>livraison</th>
                <th>recuperation</th>
                <th>Tache</th>
                <th>assignement</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$value->name}}</td>
                <td>{{($value->livraisonDate ?$value->livraisonDate : 'no date')}}</td>
                <td>{{$value->recuperationDate ? $value->recuperationDate : 'no date'}}</td>
                <td><a href="{{route('tache.create', $value->token)}}">add tache</a></td>
                <td><a href="{{route('assignement.show', $value->token)}}">assigner</a></td>
                <td>
                    <a href="{{route('brief.edit', $value->token)}}">edit</a>
                    <form action="{{route('brief.destroy', $value->token)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    
@endforeach