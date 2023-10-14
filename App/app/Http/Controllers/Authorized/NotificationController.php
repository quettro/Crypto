<?php

namespace App\Http\Controllers\Authorized;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function xhr(Request $request): JsonResponse
    {
        $collection = $request->user()->unreadNotifications->map(fn ($item) => $item->data);

        return response()
            ->json(['success' => true, 'data' => $collection]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function xhrReadAll(Request $request): JsonResponse
    {
        $request->user()->unreadNotifications()->get()->markAsRead();
        $request->user()->makeActivity('Прочитаны все непрочитанные уведомления.');

        return response()
            ->json(['success' => true]);
    }
}
