<form method="post" action="/submit">
    @csrf
    Name:
    <input type="text" name="name">
    <br>
    Email:
    <input type="text" name="email">
    <input type="text" name="age">
    <br>
    <br>
    <button type="submit">Submit</button>
</form>   