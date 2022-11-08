<form action="{{route('brief.store')}}" method="POST">
    @csrf
    <input type="text" name="name">
    <input type="date" name="livraisonDate">
    <input type="date" name="recuperationDate">
    <button type="submit">add</button>
</form>