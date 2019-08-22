<?php

namespace App\Http\Controllers;

use App\Repositories\UserClickRepositoryIterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\Tracking\Track;


class HomeController extends Controller
{
    use Track;
    /**
     * UserClick repository
     *
     * @var UserClickRepositoryIterface
    */
    private $userClicks;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserClickRepositoryIterface $userClickRepository)
    {
        $this->middleware('auth');

        $this->userClicks = $userClickRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Catch user click on company
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
    */
    public function userClick(Request $request)
    {
        if ($request->has('companyId'))
        {
            $companyId = $request->get('companyId');
            if ($request->hasCookie('showedCompanies'))
            {
                $showedCompanies = $request->cookie('showedCompanies');
                $showedCompanies = explode('@', $showedCompanies);
                if (!in_array($companyId, $showedCompanies))
                {
                    $clickData = [
                        'browser' => $this->getBrowser(),
                        'os' => $this->getOs(),
                        'company_id' => $companyId
                    ];
                    $this->userClicks->create($clickData);
                    array_push($showedCompanies, $companyId);
                    $showedCompaniesCookies = implode('@', $showedCompanies);
                    // TODO: Implement redirect logic. Later
                }
            }
        }
        else {
            abort(400);
        }
    }
}
