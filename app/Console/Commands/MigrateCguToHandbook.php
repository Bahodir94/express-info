<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\CguSite;
use App\Models\HandbookCategory;
use Illuminate\Support\Facades\File;
use App\Models\Company;

class MigrateCguToHandbook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:cgutohandbook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate concrete CGU sites to Handbook as companies';

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
        $this->info('Collecting information...');
        $sites = [326 => ['Официальный Портал Президента Республики Узбекистан', 'Правительственный Портал   Республики Узбекистан', 'Сенат Олий Мажлиса Республики Узбекистан', 'Законодательная Палата Олий Мажлиса Республики Узбекистан', 'Уполномоченный Олий Мажлис Республики Узбекистан по Правам Человека (Омбудсман)', 'Хокимият г.Ташкента'],
                    327 => ['Министерство Юстиции Республики Узбекистан', 'Генеральная Прокуратура Республики Узбекистан', 'Министерство Внутренних Дел Республики Узбекистан', 'Государственный Налоговый Комитет Республики Узбекистан', 'Государственный Таможенный Комитет Республики Узбекистан'],
                    328 => ['Министерство Культуры Республики Узбекистан', 'Министерство Дошкольного Образования Республики Узбекистан', 'Министерство Высшего и Среднего Специального Образования Республики Узбекистан', 'Министерство Народного Образования Республики Узбекистан', 'Министерство Физической Культуры и Спорта Республики Узбекистан'],
                    329 => ['Министерство Занятости и Трудовых Отношений Республики Узбекистан', 'Агентство Внешней Трудовой Миграции Республики Узбекистан'],
                    330 => ['Министерство Здравоохранения Республики Узбекистан', 'Государственный Комитет Ветеринарии Республики Узбекистан'],
                    331 => ['Министерство Жилищно-Коммунального Хозяйства Республики Узбекистан', 'Узбекэнерго'],
                    332 => ['Министерство по Развитию Информационных Технологий и Коммуникаций Республики Узбекистан', 'MUIC', 'UNICON'],
                    333 => ['Министерство Финансов Республики Узбекистан', 'Государственный Комитет Республики Узбекистан по Статистике', 'Министерство по Инвестициям и Внешней Торговли Республики Узбекистан', 'Министерство Иностранных Дел Республики Узбекистан', 'Государственный Комитет Республики Узбекистан по Развитию Туризма'],
                    335 => ['Министерство Строительства Республики Узбекистан', 'Государственный Комитет Республики Узбекистан по Земельным Ресурсам, Геодезии, Картографии и Государственному Кадастру', 'Государственный Комитет Республики Узбекистан по Геологии и Минеральным Ресурсам', 'Министерство Водного Хозяйства Республики Узбекистан', 'Государственный Комитет Лесного Хозяйства Республики Узбекистан', 'Государственный Комитет Республики Узбекистан по Экологии и Охране Окружающей Среды']];
        $companyDirectory = public_path() . '/' . Company::UPLOAD_DIRECTORY;
        $siteDirectory = public_path() . '/' . CguSite::UPLOAD_FILE_PATH;
        $this->info('Begin migration...');
        foreach ($sites as $categoryId => $sites) {
            foreach ($sites as $site) {
                $this->info("Migrating $site to category $categoryId");
                $cguSite = CguSite::where('ru_title', 'like', "%$site%")->first();
                if (!$cguSite) {
                    $this->error("Site $site not found!");
                    continue;
                }
                $newCompany = Company::create([
                    'ru_title' => $cguSite->ru_title,
                    'ru_description' => $cguSite->ru_description,
                    'url' => $cguSite->link,
                    'category_id' => $categoryId
                ]);
                if ($cguSite->image) {
                    try {
                        File::copy($siteDirectory . $cguSite->image, $companyDirectory . $cguSite->image);
                    } catch(\Exception $e) {
                        $this->error("Error: $e");
                    }
                }
                $this->info('Done!');
            }
        }
    }
}
