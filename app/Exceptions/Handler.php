<?php

namespace App\Exceptions;
use App\Exceptions\ExceptionsTrait\ExceptionTrait;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
//use Exception;


class Handler extends ExceptionHandler
{
    use ExceptionTrait;

    protected $dontReport = [
        //
    ];

    /** 
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */

    public function register()

    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


    public function report(Throwable $e)

    {
        parent::report($e);

    }

    public function render($request, Throwable $e)

    {
       if ($request->expectsJson()){

            return $this->apiException($request , $e);
           }
        //dd($e);
        return parent::render($request, $e);

    }
}
