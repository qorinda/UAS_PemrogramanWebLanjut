<?php

namespace App\Http\Controllers;

use App\Course;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Http\Request;

class CoursesController extends Controller
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
        $response = $this->_client->request('GET', 'courses', [
            'query' => [
                'api_key' => 'laravel123'
            ]
        ]);
        $courses = json_decode($response->getBody()->getContents(), true)['data'];
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'id_teacher' => 'required',
            'nama_course' => 'required',
            'keterangan_course' => 'required',
            'kategori_course' => 'required',
            'harga_course' => 'required',
            'rating_course' => 'required'
            // 'gambar_courses' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $response = $this->_client->request('POST', 'courses', [
            'form_params' => [
                'id_teacher' => $request->id_teacher,
                'nama_course' => $request->nama_course,
                'keterangan_course' => $request->keterangan_course,
                'kategori_course' => $request->kategori_course,
                'harga_course' => $request->harga_course,
                'rating_course' => $request->rating_course,
                'gambar_course' => $request->gambar_course,
                'api_key' => 'laravel123'
            ]
        ]);

        if ($request->hasFile('gambar_course')) {
            $image = $request->file('gambar_course');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $image->move($destinationPath, $name);
        }

        $courses = json_decode($response->getBody()->getContents(), true);
        return redirect('/admin/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $response = $this->_client->request('GET', 'courses', [
            'query' => [
                'api_key' => 'laravel123',
                'id' => $course->id
            ]
        ]);
        $course = json_decode($response->getBody()->getContents(), true)['data'][0];
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'id_teacher' => 'required',
            'nama_course' => 'required',
            'keterangan_course' => 'required',
            'kategori_course' => 'required',
            'harga_course' => 'required',
            'rating_course' => 'required'
            // 'gambar_courses' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $response = $this->_client->request('PUT', 'courses', [
            'form_params' => [
                'id' => $course['id'],
                'id_teacher' => $request['id_teacher'],
                'nama_course' => $request['nama_course'],
                'keterangan_course' => $request['keterangan_course'],
                'kategori_course' => $request['kategori_course'],
                'harga_course' => $request['harga_course'],
                'rating_course' => $request['rating_course'],
                'gambar_course' => $request['gambar_course'],
                'api_key' => 'laravel123'
            ]
        ]);

        $courses = json_decode($response->getBody()->getContents(), true);
        return redirect('/admin/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $response = $this->_client->request('DELETE', 'courses', [
            'form_params' => [
                'id' => $course->id,
                'api_key' => 'laravel123'
            ]
        ]);

        return redirect('/admin/courses');
    }
}
