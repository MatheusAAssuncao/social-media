<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_users = User::all();
        print_r($_users); exit;
        $data = [
            'friends' => [
                ['firstName' => 'Jane', 'surname' => 'Warren'],
                ['firstName' => 'John', 'surname' => 'Doe'],
                ['firstName' => 'Marcos', 'surname' => 'Lucas'],
                ['firstName' => 'Rita', 'surname' => 'Pegorari'],
                ['firstName' => 'Maria', 'surname' => 'Gonçalves'],
                ['firstName' => 'Juliano', 'surname' => 'Santos'],
                ['firstName' => 'Jeremias', 'surname' => 'Duarte'],
                ['firstName' => 'Matheus', 'surname' => 'Gomes'],
            ],
        ];

        return Inertia::render('Home', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
