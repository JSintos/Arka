
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/dashboard">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

<div class="container">
    <div class="row">

        <div class="col-md-10 offset-2">
            <div class="panel panel-default">
                <h2>Change password</h2>

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form method="POST" action="{{ route('change-password') }}">
                        @csrf

                        <div class="mt-4{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password"><strong>Current Password</strong></label>
                            <input id="current-password" type="password" class="block mt-1 w-full" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="mt-4{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password"><strong>New Password</strong></label>
                            <input id="new-password" type="password" class="block mt-1 w-full" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                                
                        </div>

                        <div class="mt-4 {{ $errors->has('new-password-confirmation') ? ' has-error' : '' }}">
                            <label for="new-password-confirmation"><strong>Confirm New Password</strong></label>
                            <input id="new-password-confirmation" type="password" class="block mt-1 w-full" name="new-password_confirmation" required>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('proxy-update-user') }}">
                                {{ __('Go Back') }}
                            </a>
                            <x-button class="ml-4">
                                {{ __('Change Password') }}
                            </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</x-auth-card>
</x-guest-layout>