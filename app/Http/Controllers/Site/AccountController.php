<?php

namespace App\Http\Controllers\Site;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;


    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('account.completed');

        $this->userRepository = $userRepository;
    }

    /**
     * Show main account page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();
        $accountPage = 'personal';
        return view('site.pages.account.index', compact('user', 'accountPage'));
    }

    public function savePersonal(Request $request, int $id)
    {
        $request->validate([
            'firstName' => 'required|max:255|string',
            'secondName' => 'required|string|max:255',
            'gender' => 'required|string',
            'birthday_date' => 'required|date',
            'about_myself' => 'required|string|max:5000',
        ]);
        $this->userRepository->update($id, $request);

        return redirect()->route('site.account.index')->with('success', 'Ваши личные данные обновлены');
    }
}
