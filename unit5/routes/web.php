<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;

Route::get('/', function () {
    return view('welcome');
});

//form validation'

Route::view('/form','addUser');
Route::post('/submit',[UserController::class,'addUser']);

Route::view('/custom','custom');
Route::post('/employee', [EmployeeController::class, 'store']);
//unit 6
// Till now you have done CRUD using Query Builder.
  
//INSERT DATA
Route::get('/add-user',function(){
    DB::table('students')->insert([
        'name'=>'Rishabh',
        'email' => 'rishabh@gmail.com',
        'age' => 21,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    return "Data inserted";
}); 


//FETCH DATA
Route::get('/all-user',function(){
    $students=DB::table('students')->get();              //get()->fetch all rows
    dd($students);                                      //Dump and die -> show data
});

//Show Data Properly
// Instead of dd():

Route::get('/all-users', function () {
    $students = DB::table('students')->get();
    foreach($students as $student)
    {
        echo $student->name;            //$student->name - name column value
        echo "<br>";
    }

});


// STEP 7 → Fetch One User
Route::get('/user/{id}', function ($id) {
    $student = DB::table('students')
                ->where('id', $id)
                ->first();

    dd($student);

});

//  Update Record
Route::get('/update/{id}', function ($id) {
    DB::table('students')
        ->where('id', $id)
        ->update([
            'name' => 'Updated Name'
        ]);

    return "Updated";

});

// Delete Record
Route::get('/delete/{id}', function ($id) {

    DB::table('students')
        ->where('id', $id)
        ->delete();

    return "Deleted";

});




Route::get('/orm-add',function(){
    student::create([
        'name' => 'Rishabh ORM',
        'email' => 'orm@gmail.com',
        'age' => 22
    ]);
    return "ORM data inserted";
});


// Fetch All Records using ORM
Route::get('/orm-all', function(){
    $students = Student::all();
    dd($students);
});


// Display Properly
// Instead of dd():

Route::get('/orm-all2', function(){
    $students = Student::all();
    foreach($students as $student)
    {
        echo $student->name;
        echo "<br>";

        echo $student->email;
        echo "<br><br>";
    }

});


// Fetch Single Record
Route::get('/orm-user/{id}', function($id){
    $student = Student::find($id);
    dd($student);
});


// find($id)
// DB::table('students')
//     ->where('id',$id)
//     ->first();


// Update Record
Route::get('/orm-update/{id}', function($id){
    $student = Student::find($id);
    $student->update([
        'name' => 'Updated ORM'
    ]);
    return "Updated Successfully";
});


// Delete Record
Route::get('/orm-delete/{id}', function($id){
    $student = Student::find($id);
    $student->delete();
    return "Deleted Successfully";
});