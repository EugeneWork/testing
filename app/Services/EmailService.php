<?php

namespace App\Services;

use App\Jobs\TestEmailJob;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class EmailService
{
    /**
     * @param $email
     * @param $text
     * @return string
     */
    public function send($email, $text): string
    {
        try {
            TestEmailJob::dispatch($email, $text);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return 'Success';
    }
}
