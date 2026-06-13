<h1>Add User form</h1>

//purpose -> This prints all validation errors.
<pre>
@php
    print_r($errors->all());      //Returns all validation messages in array format.
@endphp
</pre>

<!-- action → URL where data is sent -->

<form action="/submit" method="post">
    @csrf
     <label>Name:</label>
    <input type="text" name="username" value="{{ old('username') }}">
    <!-- access it using( $request->username) /( $request['username' )-->

    @error('username')
    {{ $message }} 
    <!-- If validation fails for username: Laravel automatically stores error message. -->
    @enderror

    <br><br>

    <label>Email:</label>
    <input type="email" name="useremail" value="{{ old('useremail') }}">
    @error('useremail')
    {{ $message }}
    @enderror

    <br><br>

    <label>Age:</label>
    <input type="number" name="userage" value="{{ old('userage') }}">
    @error('userage')
        {{$message}}
    @enderror

    <br><br>

    <label>City:</label>
    <select name="city">
        <option value="">Select city</option>
        <option value="Delhi">Delhi</option>
        <option value="Mumbai">Mumbai</option>
    </select>
    @error('city')
        {{ $message }}
    @enderror 

    <br><br><br><br>

    <button type="submit">Submit</button>

</form>