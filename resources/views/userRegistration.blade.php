
<form action="{{ route('event') }}" method="post">
    {{ csrf_field() }}

    <input type="text" name="name">
    <input type="submit">

</form>
