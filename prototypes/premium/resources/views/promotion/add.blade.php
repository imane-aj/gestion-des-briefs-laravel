<form action="{{route('promotion.store')}}" method="post">
    @csrf
    <input type="text" name="name">
    <button type="submit">add promotion</button>
</form>