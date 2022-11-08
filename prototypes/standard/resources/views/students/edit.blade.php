<form action="{{route('student.update', $student->token)}}" method="post">
    @csrf
    @method('put')
    <input type="text" name="name" value="{{$student->name}}">
    <input type="text" name="lastName" value="{{$student->lastName}}">
    <input type="email" name="email" value="{{$student->email}}">
    <button type="submit">update student</button>
</form>