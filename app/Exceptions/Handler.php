<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        //HttpResponseException::class,
        'Symfony\Component\HttpKernel\Exception\HttpException',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof NotFoundHttpException) {
            return response()->view('errors.404');
        }

        if($e instanceof \Symfony\Component\Debug\Exception\FatalErrorException 
        && !config('app.debug')) {
            return response()->view('errors.500');
        }

        if ($e instanceof TokenMismatchException){
            //redirect to a form. Here is an example of how I handle mine
            return redirect($request->fullUrl())->with('csrf_error',"Opps! Seems you couldn't submit form for a longtime. Please try again");
        }

        if ($e instanceof HttpResponseException){
            if($e->getResponse()->getStatusCode()==403){
                return response()->view('errors.403');
            }else{
                //return "HttpResponseException Code:".$e->getResponse()->getStatusCode();
            }

        }

        return parent::render($request, $e);
    }
}
