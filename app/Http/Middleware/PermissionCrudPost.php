<?php

namespace App\Http\Middleware;

use Closure;
use App\Supports\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionCrudPost
{   
     /** @var Notify */
     protected $notify;

     /**
     * Constructor
     * 
     * @param Notify $notify
     */
    public function __construct(Notify $notify)
    {
        $this->notify = $notify;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        $user = Auth::user();
        if (intval($user->level) < 5) {
            $this->notify->warning('Você não tem permissão no Artigos [Criar, Editar, Deletar]');
            return redirect()->route('dash');
        }

        return $next($request);
    }
}
