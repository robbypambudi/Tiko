<!doctype html>
<html>
<head>
  @include('includes.head')
</head>
<body class="leading-normal tracking-normal" style="font-family: 'Source Sans Pro', sans-serif;">
  <div class="">
    <div id="main" class="row">
      <div class="min-h-screen grid md:grid-cols-2 grid-cols-1">
        <form action="{{route('login')}}" method="POST" class="flex flex-col items-center justify-center">
          @csrf
          <div class="w-3/4">
            <h1 class="text-4xl font-bold text-center">Selamat Datang</h1>
            <div class="mt-5 flex flex-col space-y-4">
              <x-input id="email" label="Email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autofocus placeholder="Email" />
              <x-input id="password" label="Password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" placeholder="Password" />
            </div>
            <x-button class="mt-5 w-full" color="blue" label="Login" />
          </div>
        </form>
        <div class="login-background hidden md:block">
        </div>
      </div>
    </div>
  </div>
</body>
</html>