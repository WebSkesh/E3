<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Event;

class CustomersMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Event::listen('JeroenNoten\LaravelAdminLte\Events\BuildingMenu', function ($event) {
            $event->menu->add('CUSTOMERS MENU');
            $event->menu->add([
                'text' => 'Клієнти',
                'url'  => 'customers',
                'icon' => 'user',
            ]);
        });

        return $next($request);
    }
}
