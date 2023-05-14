<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionMessage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(isset($_SESSION["msg"])) {
            $_SESSION["flash_message"] = $_SESSION["msg"];
            $type = $_SESSION["msg_type"];
            if($type == "success") {
                $_SESSION['flash_message_type'] = "alert-success";
            }
            elseif($type == "danger") {
                $_SESSION['flash_message_type'] = "alert-danger";
            }
            else {
                $_SESSION['flash_message_type'] = "alert-primary";
            }
        }
        else {
            $_SESSION["flash_message"] = null;
            $_SESSION["flash_message_type"] = null;
        }
        $_SESSION["msg"] = null;
        $_SESSION["msg_type"] = null;
        return $next($request);
    }
}
