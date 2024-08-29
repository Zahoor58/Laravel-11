<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;
// wrapp them with data container c
// class job{
//     public static function all(): array
//     {
//         return   [
//             [
//                 'id'=>1,
//                 'title'=>"Director",
//                 'salary'=>"$50,000"
//             ],
//             [
//                 'id'=>2,
//                 'title'=>"Programmer",
//                 'salary'=>"$10,000"
//             ],
//             [
//                 'id'=>3,
//                 'title'=>"Teacher",
//                 'salary'=>"$40,000"
//             ]
//             ];
//     }
// }
$jobs = [
    [
        'id'=>1,
        'title'=>"Director",
        'salary'=>"$50,000"
    ],
    [
        'id'=>2,
        'title'=>"Programmer",
        'salary'=>"$10,000"
    ],
    [
        'id'=>3,
        'title'=>"Teacher",
        'salary'=>"$40,000"
    ]
    ];
Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function(){
    // return a string 
    // return "About Page";
    // return a json
    // return ['foo'=>'bar'];
    // return a view 
    return view('jobs',[
        'jobs'=>Job::all()

        
    
]);
});

Route::get("/contact", function(){
    return view("contact");
});


Route::get("/jobs/{id}", function($id) use ($jobs){
    
        // $jobs=

        // [
        //     [
        //         'id'=>1,
        //         'title'=>"Director",
        //         'salary'=>"$50,000"
        //     ],
        //     [
        //         'id'=>2,
        //         'title'=>"Programmer",
        //         'salary'=>"$10,000"
        //     ],
        //     [
        //         'id'=>3,
        //         'title'=>"Teacher",
        //         'salary'=>"$40,000"
        //     ]
        //     ];

        // \Illuminate\Support\Arr::first($jobs, function($job) use ($id){
        //     return $job['id'] == $id;
        // });

        // $job=Arr::first($jobs, fn($job) => ($job['id']) ==$id);
        // dd($job);

        $job=Job::find($id);
    return view("job",['job'=>$job]);
});
