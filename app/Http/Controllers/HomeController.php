<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function list()
    {
        $client = new \GuzzleHttp\Client();

        $data = $client->request('GET', 'https://api.apify.com/v2/key-value-stores/6t65lJVfs3d8s6aKc/records/LATEST?disableRedirect=true')->getBody();

        $data_positive = $client->request('GET', 'https://api.apify.com/v2/datasets/7Fdb90FMDLZir2ROo/items?format=json&clean=1', [
            'query' => ['lastUpdatedAtApify']
        ])->getBody();

        // $all_country = $client->request('GET', 'https://api.covid19api.com/country/south-africa/status/confirmed/live?from=2020-03-01T00:00:00Z&to=2021-01-01T00:00:00Z')->getBody();
        
        $positive_cases = json_decode($data_positive);

        $current_data = json_decode($data);
        
        return view('home', compact('current_data', 'positive_cases'));
    }
}
