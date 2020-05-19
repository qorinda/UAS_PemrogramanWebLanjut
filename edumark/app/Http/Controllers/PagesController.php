<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $_client;
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/edu/api/',
            'auth' => ['admin', '1234']
        ]);
    }

    public function home()
    {
        $response = $this->_client->request('GET', 'courses', [
            'query' => [
                'api_key' => 'laravel123'
            ]
        ]);
        $courses = json_decode($response->getBody()->getContents(), true)['data'];
        return view('user.home', compact('courses'));
    }

    public function courses()
    {
        $response = $this->_client->request('GET', 'courses', [
            'query' => [
                'api_key' => 'laravel123'
            ]
        ]);
        $courses = json_decode($response->getBody()->getContents(), true)['data'];
        return view('user.courses', compact('courses'));
    }

    public function course(int $id)
    {
        $response = $this->_client->request('GET', 'courses', [
            'query' => [
                'api_key' => 'laravel123',
                'id' => $id
            ]
        ]);
        $course = json_decode($response->getBody()->getContents(), true)['data'][0];
        return view('user.course', compact('course'));
    }

    public function pay(Course $course)
    {
        $users = User::all();
        return view('user.pay', ['course' => $course])->with('users', $users);
    }

    public function paid_off(User $user, int $id)
    {
        $response = $this->_client->request('POST', 'invoices', [
            'form_params' => [
                'id_user' => $user->id,
                'id_course' => $id,
                'api_key' => 'laravel123'
            ]
        ]);
        return view('user.paid_off');
    }
}
