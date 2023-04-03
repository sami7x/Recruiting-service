<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'posts'=>Job::get()
        ]);
    }

    public function store(Request $request, Job $job)
    {
        Job::create($request->all());

        return response()->json([
            'message' => 'Vacancy Created',
            'status' => 'success',
            'data' =>$job
        ]);
    }



    public function show($id, Job $job)
    {
        return response()->json(['post'=>$job] );
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());

        return response()->json([
            'message' => 'Vacancy Post Edited',
            'status' => 'success',
            'data' =>$job
        ]);
    }

    public function destroy( Job $job)
    {
        $job->delete();
        return response()->json([
            'message'=>'post deleted',
            'status'=>'success'
        ]);
    }
}
