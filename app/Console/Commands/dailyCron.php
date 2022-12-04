<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Controller;
/*use App\Models\NotificationModel;
use App\Events\NotificationEvent;
use App\Models\VoteManagementModel;
use App\Models\GalleryModel;
use App\Models\WeeklyWinnersModel;
use App\Models\DailyWinnersModel;
use App\Models\SiteSettingModel;
use App\Common\Services\MailService;*/

use DB;
use Carbon;
use Validator;
use Session;
use Redirect;
use DateTime;

class dailyCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To create daily/weekly winner at the end of each day.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
       /* $this->WeeklyWinnersModel              = new WeeklyWinnersModel();
        $this->DailyWinnersModel               = new DailyWinnersModel();
        $this->GalleryModel                    = new GalleryModel();
        $this->VoteManagementModel             = new VoteManagementModel();
        $this->NotificationModel               = new NotificationModel();
        $this->SiteSettingModel                = new SiteSettingModel();
        $this->MailService                     = new MailService();*/
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

    }
}