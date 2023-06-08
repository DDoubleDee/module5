<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Job;
use App\Models\Competence;
use App\Models\Candidate;
use App\Models\Level;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    return view('index', ["jobs" => Job::get()]);
});
Route::get('/job/{id}', function (Request $request, $id) {
    return view('job', ["job" => Job::where('id', $id)->get()->first(), "levels" => Level::get(), "competences" => Competence::where('job_id', $id)->get()]);
});
Route::post('/job/{id}/submit', function (Request $request, $id) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
    ]);
    if ($validator->fails()) {
        return back();
    }
    $candidate = Candidate::where(['job_id' => $id, 'email' => $request->input('email')])->get()->first();
    if(!is_null($candidate)){
        return back();
    }
    $competences = Competence::where('job_id', $id)->get();
    $in = array();
    foreach ($competences as $competence) {
        $in[$competence->competence] = $request->input('competence_'.strval($competence->id)).', '.srtval($competence->id);
    }
    $candidate = Candidate::create(["email" => $request->input('email'), "phone" => $request->input('phone'), "name" => $request->input('name'), "competences" => json_encode($in), "job_id" => $id]);
    return redirect('/');
});
Route::get('/joblist', function (Request $request) {
    $jobs = Job::get()->toArray();
    $out = array();
    for ($i=0; $i < count($jobs); $i++) { 
        $candidates = Candidate::where('job_id', $jobs[$i]["id"])->get();
        foreach ($candidates as $candidate) {
            $candidate->competences = json_decode($candidate->competences);
        }
        $out[$i] = ["job" => $jobs[$i]["job"], "candidates" => $candidates];
    }
    return view('joblist', ["jobs" => $out, "levels" => Level::get()]);
});