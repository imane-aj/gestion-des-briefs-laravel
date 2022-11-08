<form action="{{route('tache.store')}}" method="POST">
    @csrf
    <input type="text" name="name">
    <input type="date" name="startDate">
    <input type="date" name="endDate">
    <input type="hidden" name="brief_id" value="{{$brief->id}}">
    <button type="submit">add</button>
</form>