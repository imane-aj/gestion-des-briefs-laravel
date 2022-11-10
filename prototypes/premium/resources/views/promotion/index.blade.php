<a href="{{route('promotion.create')}}">add promotion</a>
<table>
    <thead>
        <tr>
            <th>name</th>
            <th>actions</th>
        </tr>
    </thead>
   <tbody>
        @foreach ($promotions as $value)
            <tr>
                <td><a href="{{route('promotion.edit', $value->token)}}">{{$value->name}}</a></td>
                <td>
                    <form action="{{route('promotion.destroy', $value->token)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
   </tbody>
</table>