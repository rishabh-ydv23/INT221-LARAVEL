<form method="POST" action="/employee">
    @csrf

    Name:
    <input type="text" name="name"><br><br>

    Email:
    <input type="email" name="email"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    Confirm Password:
    <input type="password" name="password_confirmation"><br><br>

    Phone:
    <input type="text" name="phone"><br><br>

    DOB:
    <input type="date" name="dob"><br><br>

    <button type="submit">Submit</button>
</form>