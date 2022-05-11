<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Access extends Model
{
    use HasFactory;

    protected $fillable = [
        'users', 'views', 'pages'
    ];

    public function report(bool $page = false)
    {   
        $access = $this->whereDate('created_at', '=', date('Y-m-d'))->first();
       
        if (!$access) {
            $access = new Access();
            $access->users = 1;
            $access->views = 1;
            $access->pages = 1;

            setcookie("access", true, time() + 86400, "/");
            Session::put('access', true);

            $access->save();
            return $this;
        }

        if (!filter_input(INPUT_COOKIE, "access")) {
            $access->users += 1;
            setcookie("access", true, time() + 86400, "/");
        }

        if (!Session::has("access")) {
            $access->views += 1;
            Session::put('access', true);
        }

        $access->pages += ($page) ?  1 : 0 ;
        $access->save();
        return $this;
    }
}
