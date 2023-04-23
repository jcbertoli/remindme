<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReminderRequest;
use App\Http\Requests\DeleteReminderRequest;
use App\Repositories\ReminderRepository;

class ReminderController extends Controller
{

    private $repository;

    public function __construct(ReminderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(CreateReminderRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth()->user()->id;

        $reminder = $this->repository->create($data);

        if (!$reminder)
            redirect()->route('dashboard')->with('showReminderModal', true)->with('errors', 'Could not create reminder.')->withInput();

        return redirect()->route('dashboard')->with('showReminderModal', true)->with('createReminderMessage', 'Reminder successfully created!');
    }

    public function delete(DeleteReminderRequest $request)
    {
        $reminder = $this->repository->deleteById($request->validated());

        if (!$reminder)
            redirect()->route('dashboard')->with('errors', 'Could not delete reminder.');

        return redirect()->route('dashboard')->with('createReminderMessage', 'Reminder successfully deleted!');
    }
}
