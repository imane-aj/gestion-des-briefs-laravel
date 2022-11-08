<form action="{{route('student.index')}}" method="post">
    @csrf
    <input type="text" name="name">
    <input type="text" name="lastName">
    <input type="email" name="email">
    <button type="submit">add student</button>
</form>