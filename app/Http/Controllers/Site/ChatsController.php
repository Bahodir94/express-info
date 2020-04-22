<?php

namespace App\Http\Controllers\Site;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Chat\Chat;
use App\Models\Chat\Message;
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

    public function sendMessage(Request $request) {
        $currentUser = auth()->user();
        $chatId = $request->get('chatId');
        $message = $request->get('message');
        $messageData = [
            'user_id' => $currentUser->id,
            'chat_id' => $chatId,
            'text' => $message
        ];
        $message = Message::create($messageData);
        broadcast(new MessageSent($message->load('user')));
        return [
            'status' => 'success',
            'message' => $message
        ];
    }
}
