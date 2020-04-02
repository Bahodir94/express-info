<?php

namespace App\Http\Controllers\Site;

use App\Repositories\NeedTypeRepositoryInterface;
use App\Repositories\TenderRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TenderController extends Controller
{

    /**
     * @var NeedTypeRepositoryInterface
     */
    private $needRepository;

    /**
     * @var TenderRepositoryInterface
     */
    private $tenderRepository;

    public function __construct(NeedTypeRepositoryInterface $needRepository,
                                TenderRepositoryInterface $tenderRepository)
    {
        $this->needRepository = $needRepository;
        $this->tenderRepository = $tenderRepository;
    }

    public function create()
    {
        $needs = $this->needRepository->all();
        return view('site.pages.tenders.common.create', compact('needs'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'categories' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'files' => 'nullable',
            'budget' => 'required|string',
            'deadline' => 'required|date',
            'client_company_name' => Rule::requiredIf($request->get('client_type') === 'company'),
            'client_site_url' => 'nullable|string',
            'firstName' => 'required|string|max:255',
            'secondName' => 'required|string|max:255',
            'client_phone_number' => 'required|string|max:255',
            'client_email' => 'required|email'
        ])->validate();
        $tender = $this->tenderRepository->create($request);

        return redirect()->to('site.account.index')->with('success', "Тендер $tender->title создан");
    }
}
