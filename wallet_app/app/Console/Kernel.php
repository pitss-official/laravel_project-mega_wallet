<?php

namespace App\Console;

use App\Money;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function (){
            $pending = DB::table('pendings')->where('isPending', 1)->get();
            if($pending != null){
                foreach ($pending as $p){
                    if(strtotime(date('Y-m-d')) > strtotime($p->scheduled_at)){
                        var_dump("hi");
                        $receiverID = $p->receivedBy;
                        $senderID = $p->sentBy;
                        $receiver = \App\User::find($receiverID);
                        $sender = \App\User::find($senderID);

                        $receiver->balance = $receiver->balance + $p->amount;
                        $sender->balance = $sender->balance - $p->amount;



                        $money = new Money();
                        $money->amount = $p->amount;
                        $money->sentBy = $p->sentBy;
                        $money->receivedBy = $p->receivedBy;
                        $money->save();
                        $pElequoent = \App\Pending::find($p->id);
                        $pElequoent->isPending = 0;

                        $receiver->save();
                        $sender->save();
                        $pElequoent->save();
                        //$p->save();

                    }

                }
            }


        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
