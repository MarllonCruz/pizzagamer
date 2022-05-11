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
            'visitor' => [
                'number' => [1],
                'message' => ''
            ],
            'admin'   => [
                'number' => [4, 5, 6, 7],
                'message' => 'Você não tem permissão fazer ações no setores artigos, video, slides, destaques e usuários'
            ],
            'leader'  => [
                'number' => [10],
                'message' => 'Você não tem permissão fazer ações no setor usuários'
            ]
        ];

        $levelIds = $levels[$level] ?? [];
        $number   = $levelIds['number'] ?? [];
        $message  = $levelIds['message'] ?? null;

        if (!in_array(intval(auth()->user()->level), $number)) {
            $this->notify->warning($message);
            return redirect()->back();
        }

        return $next($request);
    }
}
