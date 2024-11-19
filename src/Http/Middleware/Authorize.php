<?php

namespace JeroenOostendorp\LaravelNovaEdexmlImport\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Nova\Nova;
use JeroenOostendorp\LaravelNovaEdexmlImport\LaravelNovaEdexmlImport;
use Laravel\Nova\Tool;

class Authorize
{
    /**
     * Handle the incoming request.
     * @param Closure(Request):mixed $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tool = collect(Nova::registeredTools())->first([$this, 'matchesTool']);

        return optional($tool)->authorize($request) ? $next($request) : abort(403);
    }

    /**
     * Determine whether this tool belongs to the package.
     */
    public function matchesTool(Tool $tool): bool
    {
        return $tool instanceof LaravelNovaEdexmlImport;
    }
}
