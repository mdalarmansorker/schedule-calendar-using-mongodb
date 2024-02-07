<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Calendar Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col">
            @if(session('success'))
                <div role="alert" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold lg:px-28">Schedule Calendar</h1>
            </div>
            <div class="rounded-lg shrink-0 w-full max-w-xl shadow-2xl bg-base-100">
                <form class="p-4" method="post" action="{{ route('login') }}">
                    @csrf
                    <!-- Email -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" placeholder="email" name="email" class="input input-bordered" required />
                        @error('email') <p class="text-red-500"> {{ $message }} </p> @enderror

                    </div>
                    <!-- Password -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" placeholder="password"name="password" class="input input-bordered" required />
                        @error('password') <p class="text-red-500"> {{ $message }} </p> @enderror

                        <label class="label">
                            <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                        </label>
                    </div>
                    
                    
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>