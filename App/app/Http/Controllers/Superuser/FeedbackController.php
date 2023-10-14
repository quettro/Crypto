<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Feedback\StoreRequest;
use App\Http\Requests\Superuser\Feedback\UpdateRequest;
use App\Models\Feedback;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Feedback.index')
            ->with('collection', Feedback::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.Feedback.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new Feedback($request->validated());
        $object->save();

        return to_route('superuser.feedback.show', $object->id);
    }

    /**
     * @param Feedback $feedback
     * @return Application|Factory|View
     */
    public function show(Feedback $feedback): View|Factory|Application
    {
        return view('main.Superuser.Feedback.show')
            ->with('feedback', $feedback);
    }

    /**
     * @param Feedback $feedback
     * @return Application|Factory|View
     */
    public function edit(Feedback $feedback): View|Factory|Application
    {
        return view('main.Superuser.Feedback.edit')
            ->with('feedback', $feedback);
    }

    /**
     * @param UpdateRequest $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Feedback $feedback): RedirectResponse
    {
        $feedback->update($request->validated());

        return to_route('superuser.feedback.show', $feedback->id);
    }

    /**
     * @param Request $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function destroy(Request $request, Feedback $feedback): RedirectResponse
    {
        $feedback->delete();

        return to_route('superuser.feedback.index');
    }
}
