<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class UserNavigationTracker
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(Request $request, Closure $next)
    {
        $previous_url = url()->previous();
        $navigationHistory = session()->get('navigation_history', [url()->previous()]);

        if($request->url() !== $navigationHistory[ count($navigationHistory) - 2 ])
        {
            array_push($navigationHistory, $request->url());
        }

        if($request->url() === $navigationHistory[ count($navigationHistory) - 2 ])
        {
            array_pop($navigationHistory);
            $previous_url = $navigationHistory[ count($navigationHistory) - 2 ];
        }

        session()->put('navigation_history', $navigationHistory);
        view()->share('previous_url', $previous_url);
        return $next($request);
    }
}
