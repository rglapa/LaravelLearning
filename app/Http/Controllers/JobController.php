<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(5);
        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function store()
    {
        request()->validate([
                'title' => ['required'],
                'salary' => ['required']
            ]
        );
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Job $job)
    {
        request()->validate([
                'title' => ['required'],
                'salary' => ['required']
            ]
        );

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);
        return redirect('/jobs' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
