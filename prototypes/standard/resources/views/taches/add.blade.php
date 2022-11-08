<form action="{{route('tache.store')}}" method="POST">
    @csrf
    <input type="text" name="name">
    <input type="date" name="startDate">
    <input type="date" name="endDate">
    <input type="hidden" name="briefToken" value="{{$brief->token}}">
    <button type="submit">add</button>
</form>