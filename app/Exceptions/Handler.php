<?php

namespace App\Exceptions;

use Throwable;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    use ApiResponses;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof HttpException && $request->wantsJson()){

            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];
    }

    if($exception instanceof ModelNotFoundException  && $request->wantsJson()){
        $model = strtolower(class_basename($exception->getModel()));
        return $this->errorResponse("Does not exits any instance of {$model} with given id", Response::HTTP_NOT_FOUND);
    }

    if($exception instanceof AuthorizationException && $request->wantsJson()){
        return $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN);
    }

    if($exception instanceof AuthenticationException && $request->wantsJson()){
        return $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
    }

    if($exception instanceof ValidationException && $request->wantsJson()){
        $errors = $exception->validator->errors()->getMessages();
        return $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    if(env('APP_DEBUG', false)){
        return parent::render($request, $exception);
    }
    return parent::render($request, $exception);
    }
}
