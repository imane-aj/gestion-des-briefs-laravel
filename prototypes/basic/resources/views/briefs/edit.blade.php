<form action="{{route('brief.update', $brief->token)}}" method="post">
    @csrf
    @method('put')
    <input type="text" name='name' value="{{$brief->name}}">
    <input type="date" name="livraisonDate" value="{{$brief->livraisonDate}}">
    <input type="date" name="recuperationDate" value="{{$brief->recuperationDate}}">
    <button type="submit">update</button>
</form>