<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplicationRequest;
use App\Models\Apply;
use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(Job $job)
    {
        $applications = $job->applications;
    }

    public function store(JobApplicationRequest $request, Job $job)
    {
        $validatedData = $request->validated();

        $application = new Apply;
        $application->full_name = $validatedData['full_name'];
        $application->email = $validatedData['email'];
        $application->current_address = $validatedData['current_address'];
        $application->phone_number = $validatedData['phone_number'];
        $application->education = $validatedData['education'];
        $application->cv_file = $validatedData['cv_file']->store('resumes');
        $application->coverletter_file = $validatedData['coverletter_file']->store('resumes');

        $application->job_id = $job->id;
        $application->save();

        return response()->json(['data'=>'Application submitted successfully']);


    }


    public function show(Apply $application)
    {
        return response()->json(['data' => $application]);
    }

    public function update(JobApplicationRequest $request, Apply $application)
    {
        $validatedData = $request->validated();

        $application->full_name = $validatedData['full_name'];
        $application->email = $validatedData['email'];
        $application->current_address = $validatedData['current_address'];
        $application->phone_number = $validatedData['phone_number'];
        $application->education = $validatedData['education'];
        if ($request->hasFile('cv_file')) {
            $application->cv_file = $request->file('cv_file')->store('resumes');
        }
        if ($request->hasFile('coverletter_file')) {
            $application->coverletter_file = $request->file('coverletter_file')->store('resumes');
        }

        $application->save();

        return response()->json(['data'=>'Application updated successfully']);
    }

    public function destroy(Apply $application)
    {
        $application->delete();
        return response()->json(['data'=>'Application deleted successfully']);
    }
}
