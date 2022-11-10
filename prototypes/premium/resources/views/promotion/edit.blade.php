
<form action="{{route('promotion.update', $promotion->token)}}" method="post">
    @csrf
    @method('put')
    <input type="text" name="name" value="{{$promotion->name}}">
    <button type="submit">update</button>
</form>

<a href="{{route('student.create', $promotion->token)}}">add student</a>
<table>
    <thead>
        <tr>
            <th>name</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>
                    <a href="{{route('student.edit', $value->token)}}">edit</a>
                    <form action="{{route('student.destroy', $value->token)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>