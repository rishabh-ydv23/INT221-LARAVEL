<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ResourceController extends Controller
{
    /**
     * Display all users
     * GET /user
     */
    public function index()
    {
        return "Display all users";
    }

    /**
     * Show form to create new user
     * GET /user/create
     */
    public function create()
    {
        return "User creation form";
    }

    /**
     * Store new user
     * POST /user
     */
    public function store(Request $request)
    {
        return "User stored successfully";
    }

    /**
     * Display specific user
     * GET /user/{id}
     */
    public function show(string $id)
    {
        return "Display user id : $id";
    }

    /**
     * Show edit form
     * GET /user/{id}/edit
     */
    public function edit(string $id)
    {
        return "Edit form of user id : $id";
    }

    /**
     * Update user
     * PUT/PATCH /user/{id}
     */
    public function update(Request $request, string $id)
    {
        return "User updated successfully : $id";
    }

    /**
     * Delete user
     * DELETE /user/{id}
     */
    public function destroy(string $id)
    {
        return "User deleted successfully : $id";
    }
}