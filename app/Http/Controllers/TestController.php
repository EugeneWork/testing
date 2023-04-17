<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Services\EmailService;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use ApiResponse;

    const TEXT = 'Test text';
    /**
     * @var EmailService
     */
    protected $emailService;

    /**
     * @param EmailService $emailService
     */
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * @param TestRequest $request
     * @return JsonResponse
     */
    public function test(TestRequest $request): JsonResponse
    {
        $sendEmail = $this->emailService->send($request->get('email'), self::TEXT);
        if ($sendEmail == 'Success') {
            return $this->responseSuccess('Success');
        }
        return $this->responseError("Can't send email ,problem with server");
    }
}
