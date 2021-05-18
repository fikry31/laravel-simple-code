<?php  
namespace App\Http\Middleware;  
use Closure;  
class checkYear  
{
    public function handle($request, Closure $next)
    {
        echo "Sozo Lab <br>";  
        return $next($request);
    }
}