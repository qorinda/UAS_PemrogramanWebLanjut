<?php

namespace App\Http\Controllers;

use App\User;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $_client;
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/edu/api/',
            'auth' => ['admin', '1234']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->_client->request('GET', 'users', [
            'query' => [
                'api_key' => 'laravel123'
            ]
        ]);
        $users = json_decode($response->getBody()->getContents(), true)['data'];
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'gambar_courses' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $response = $this->_client->request('PUT', 'users', [
            'form_params' => [
                'id' => $user['id'],
                'name' => $request['name'],
                'email' => $request['email'],
                'api_key' => 'laravel123'
            ]
        ]);

        $courses = json_decode($response->getBody()->getContents(), true);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $response = $this->_client->request('DELETE', 'users', [
            'form_params' => [
                'id' => $user->id,
                'api_key' => 'laravel123'
            ]
        ]);

        return redirect('/admin/users');
    }
}
