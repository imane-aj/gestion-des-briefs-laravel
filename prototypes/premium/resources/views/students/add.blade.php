<form action="{{route('student.index')}}" method="post">
    @csrf
    <input type="text" name="name">
    <input type="text" name="lastName">
    <input type="email" name="email">
    <input type="hidden" name="promotion_id" value="{{$promotion->id}}">
    <button type="submit">add student</button>
</form>