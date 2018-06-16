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
                    'text' => trans_choice('messages.city', 1).' / '.trans_choice('messages.village', 1),
                    'url'  => route('admin.cities.index'),
                    'icon' => 'university'
                ],
                [
                    'text' => trans_choice('messages.category', 2),
                    'url'  => route('admin.categories.index'),
                    'icon' => 'ellipsis-v'
                ],
                [
                    'text' => trans_choice('messages.institution', 2),
                    'url'  => route('admin.institutions.index'),
                    'icon' => 'building-o'
                ]
            );
        });

        return $next($request);
    }
}