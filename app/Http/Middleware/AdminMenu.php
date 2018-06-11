<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Customer;
use Illuminate\Support\Facades\Event;

class AdminMenu
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
            $customer = Customer::find(session('customer_id'));
            $event->menu->add($customer->name);
            $event->menu->add(
                [
                    'text' => trans('messages.city').' / '.trans('messages.village'),
                    'url'  => route('admin.cities.index'),
                    'icon' => 'university'
                ]

            );
        });

        return $next($request);
    }
}