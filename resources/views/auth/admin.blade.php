@extends('components.template')
@section('title', 'login')
@section('content')

<div class="hero bg-teal-600 min-h-screen">
    <div class="hero-content flex-col lg:flex-row-reverse">
        <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold text-white">Login</h1>
            <p class="py-6 text-white">
                Login sebagai admin
            </p>
        
        </div>
        <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl">
            <form class="card-body">
            <div class="form-control">
                <label class="label">
                <span class="label-text">Email</span>
                </label>
            <input type="email" placeholder="email" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label">
                <span class="label-text">Password</span>
                </label>
                <input type="password" placeholder="password" class="input input-bordered" required />
                <label class="label">
                <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                </label>
            </div>
            <div class="form-control mt-6">
                <button class="btn btn-primary">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection