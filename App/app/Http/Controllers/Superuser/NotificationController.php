<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\DatabaseNotification as Notification;

class NotificationController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Notification.index')
            ->with('collection', Notification::query()->orderByDesc('created_at')->paginate(50));
    }

    /**
     * @param Notification $notification
     * @return Application|Factory|View
     */
    public function show(Notification $notification): View|Factory|Application
    {
        return view('main.Superuser.Notification.show')
            ->with('notification', $notification);
    }

    /**
     * @param Notification $notification
     * @return RedirectResponse
     */
    public function destroy(Notification $notification): RedirectResponse
    {
        $notification->delete();

        return to_route('superuser.notification.index');
    }
}
