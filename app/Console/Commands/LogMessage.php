<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class LogMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:message {message}';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log a message to the log file';

    /**
     * Execute the console command.
     */
    public function handle()
    {

           // گرفتن آرگومان message از کامند
        $message = $this->argument('message');

        // تاریخ و ساعت فعلی
        $now = Carbon::now()->toDateTimeString();

        // مسیر فایل لاگ
        $logFile = storage_path('logs/custom_log.log');

        // اضافه کردن پیام به فایل لاگ با تاریخ و ساعت
        $logEntry = "[{$now}] {$message}" . PHP_EOL;
        file_put_contents($logFile, $logEntry, FILE_APPEND);

          $this->info('Message logged!');
    }
}
