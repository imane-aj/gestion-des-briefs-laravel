<form action="{{route('tache.update', $tache->id)}}" method="post">
    @csrf
    @method('put')
    <input type="text" name='name' value="{{$tache->name}}">
    <input type="date" name="startDate" value="{{$tache->startDate}}">
    <input type="date" name="endDate" value="{{$tache->endDate}}">
    <input type="hidden" name="brief_id" value="{{$tache->brief_id}}">
    <button type="submit">update</button>
</form>