<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class ImportCompanies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $companies = Company::all();
        foreach ($companies as $company) {
            $companyName = $company->ru_title;
            $aboutMySelf = $company->ru_description;
            $slug = $company->ru_slug;
            $phoneNumber = $company->phoneNumber;
            $categoryId = $company->category_id;
            $user = User::create([
                'company_name' => $companyName,
                'about_myself' => $aboutMySelf,
                'slug' => $slug,
                'phone_number' => $phoneNumber,
                'contractor_type' => 'agency',
                'email' => '',
                'password' => '',
                'name' => '',
            ]);
            $user->categories()->attach($categoryId);
            $user->roles()->attach(Role::where('name', 'contractor')->first()->id);
        }
    }
}
