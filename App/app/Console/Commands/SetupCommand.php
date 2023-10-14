<?php

namespace App\Console\Commands;

use App\Enums\Achievement\StatusEnum;
use App\Enums\Achievement\TypeEnum;
use App\Models\Achievement;
use App\Models\Faq;
use App\Models\Setting;
use Illuminate\Console\Command;

class SetupCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'setup';

    /**
     * @var string
     */
    protected $description = 'setup';

    /**
     * @return void
     */
    public function handle(): void
    {
        $faq = new Faq();
        $faq->q = 'Q';
        $faq->a = 'A';
        $faq->save();

        $setting = new Setting();
        $setting->contact = 'contact@example.com';
        $setting->hcaptcha_public = '10000000-ffff-ffff-ffff-000000000001';
        $setting->hcaptcha_secret = '0x0000000000000000000000000000000000000000';
        $setting->referral_program_parameter = 'r';
        $setting->referral_program_commission_percentage = 25;
        $setting->freebie_tether = 0;
        $setting->freebie_timeout = 0;
        $setting->freebie_limit_per_day = 0;
        $setting->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::F;
        $achievement->description = 'Завершите 50 заявок в разделе "Кран"';
        $achievement->tether = 0;
        $achievement->purpose = 50;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::F;
        $achievement->description = 'Завершите 100 заявок в разделе "Кран"';
        $achievement->tether = 0;
        $achievement->purpose = 100;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::F;
        $achievement->description = 'Завершите 150 заявок в разделе "Кран"';
        $achievement->tether = 0;
        $achievement->purpose = 150;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::F;
        $achievement->description = 'Завершите 200 заявок в разделе "Кран"';
        $achievement->tether = 0;
        $achievement->purpose = 200;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::F;
        $achievement->description = 'Завершите 250 заявок в разделе "Кран"';
        $achievement->tether = 0;
        $achievement->purpose = 250;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::F;
        $achievement->description = 'Завершите 300 заявок в разделе "Кран"';
        $achievement->tether = 0;
        $achievement->purpose = 300;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::L;
        $achievement->description = 'Завершите 50 заявок в разделе "Короткие ссылки"';
        $achievement->tether = 0;
        $achievement->purpose = 50;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::L;
        $achievement->description = 'Завершите 100 заявок в разделе "Короткие ссылки"';
        $achievement->tether = 0;
        $achievement->purpose = 100;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::L;
        $achievement->description = 'Завершите 150 заявок в разделе "Короткие ссылки"';
        $achievement->tether = 0;
        $achievement->purpose = 150;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::L;
        $achievement->description = 'Завершите 200 заявок в разделе "Короткие ссылки"';
        $achievement->tether = 0;
        $achievement->purpose = 200;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::L;
        $achievement->description = 'Завершите 250 заявок в разделе "Короткие ссылки"';
        $achievement->tether = 0;
        $achievement->purpose = 250;
        $achievement->status = StatusEnum::Y;
        $achievement->save();

        $achievement = new Achievement();
        $achievement->type = TypeEnum::L;
        $achievement->description = 'Завершите 300 заявок в разделе "Короткие ссылки"';
        $achievement->tether = 0;
        $achievement->purpose = 300;
        $achievement->status = StatusEnum::Y;
        $achievement->save();
    }
}
