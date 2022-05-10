<?php

namespace App\Http\Middleware;

use Closure;
use App\Supports\Notify;
use Illuminate\Http\Request;

class CheckLevel
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
    
    public function handle(Request $request, Closure $next, string $level)
    {   
        $levels = [
            'visitor' => [1],
            'admin'   => [4, 5, 6, 7],
            'leader'  => [10]
        ];

        $levelIds = $levels[$level] ?? [];

        if (!in_array(intval(auth()->user()->level), $levelIds)) {
            $this->notify->warning('Você não tem permissão fazer ações no setores artigos, video, slides, destaques e usuários');
            return redirect()->back();
        }

        return $next($request);
    }
}
