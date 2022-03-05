<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // user
        if($request->path()=="seller-dashboard-login" && $request->session()->has('seller')){
            return redirect()->route('buy-leads');
        }
        if($request->path()=="user-register" && $request->session()->has('seller')){
            return redirect()->route('buy-leads');
        }
        if($request->path()=="user-register/{refer}" && !$request->session()->has('seller')){
            return redirect()->route('buy-leads');
        }
        if($request->path()=="seller-dashboard" && !$request->session()->has('seller')){
            return redirect()->route('user-login');
        }
        if($request->path()=="profile-details" && !$request->session()->has('seller')){
            return redirect()->route('user-login');
        }
        if($request->path()=="free-leads" && !$request->session()->has('seller')){
            return redirect()->route('user-login');
        }
        if($request->path()=="premium-leads" && !$request->session()->has('seller')){
            return redirect()->route('user-login');
        }
        if($request->path()=="regular-leads" && !$request->session()->has('seller')){
            return redirect()->route('user-login');
        }
        if($request->path()=="seller-lead-manager" && !$request->session()->has('seller')){
            return redirect()->route('user-login');
        }
        if($request->path()=="user/my-balance" && !$request->session()->has('seller')){
            return redirect()->route('user-login');
        } 
        if($request->path()=="recharge-points" && !$request->session()->has('seller')){
            return redirect()->route('user-login');
        }
        if($request->path()=="payment-verify" && !$request->session()->has('seller')){
            return redirect()->route('user-login');
        }

        //admin
        if($request->path()=="9851240938/kanxiko-admin" && ($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('seller');
        }
        if($request->path()=="9851240938/admin" && !$request->session()->has('admin')){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/admin/add" && !$request->session()->has('admin')){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/seller" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/embed/facebook" && !$request->session()->has('admin')){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/wallet/credit-point" && !$request->session()->has('admin')){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/wallet/details" && !$request->session()->has('admin')){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/banner/add-homepage-banner" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/banner/add-user-dashboard-banner" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/products" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/unverified-products" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/orders/buyer" && !($request->session()->has('admin')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/orders/seller" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/product/add-product" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/category/details" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/{name}/subcategory/details" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/seller/edit/{id}" && !($request->session()->has('admin')||$request->session()->has('buyer_department')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/enquiry/details" && !$request->session()->has('admin')){
            return redirect()->route('admin-login');
        }
        if($request->path()=="9851240938/seller/leads" && !($request->session()->has('admin')||$request->session()->has('seller_department'))){
            return redirect()->route('admin-login');
        }
        
        //register yourself
        if($request->path()=="buyer-form" && !$request->session()->has('product')){
            return redirect()->route('order-form');
        }
        return $next($request);
    }
}
