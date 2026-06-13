<h1>File Upload</h1>
<form method="post" action="/upload" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form> 