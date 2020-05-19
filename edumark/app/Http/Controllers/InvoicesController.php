<?php

namespace App\Http\Controllers;

use App\Invoice;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Http\Request;

class InvoicesController extends Controller
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
        $response = $this->_client->request('GET', 'invoices', [
            'query' => [
                'api_key' => 'laravel123'
            ]
        ]);
        $invoices = json_decode($response->getBody()->getContents(), true)['data'];
        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $response = $this->_client->request('GET', 'invoices', [
            'query' => [
                'api_key' => 'laravel123',
                'id' => $invoice->id
            ]
        ]);
        $invoice = json_decode($response->getBody()->getContents(), true)['data'][0];
        return view('admin.invoices.show', compact('invoice'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $response = $this->_client->request('DELETE', 'invoices', [
            'form_params' => [
                'id' => $invoice->id,
                'api_key' => 'laravel123'
            ]
        ]);

        return redirect('/admin/invoices');
    }
}
