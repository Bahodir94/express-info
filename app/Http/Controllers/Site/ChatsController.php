<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\ChatRepositoryInterface;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    /**
     * @var ChatRepositoryInterface
     */
    private $chatRepository;

    /**
     * ChatsController constructor.
     * @param ChatRepositoryInterface $chatRepository
     */
    public function __construct(ChatRepositoryInterface $chatRepository)
    {
        $this->middleware(['auth', 'account.completed']);

        $this->chatRepository = $chatRepository;
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $accountPage = 'chat';
        if ($request->has('chat_id')) {
            $chat = $this->chatRepository->getById($request->get('chat_id'));
            return view('site.pages.account.chat.show', compact('user', 'chat', 'accountPage'));
        }
        return view('site.pages.account.chat.index', compact('user', 'accountPage'));
    }
}
