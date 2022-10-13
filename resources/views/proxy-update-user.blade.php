
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/dashboard">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;" >{{Auth::user()->username}}'s Profile</div>
                    <div class="container">
                        @if ($errors->any())
                            <div class="mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                        @if(session()->get('message'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success: </strong>{{session()->get('message')}}
                        </div>
                        @endif
                <div class="card-body">
                    <form action="{{route('proxy-update-user')}}" method="POST">
                    @csrf
                        <div class="mt-4">
                           <label for="name"><strong>Name:</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="name" name="name" value="{{Auth::user()->username}}" required>
                       </div>
                       <div class="mt-4">
                           <label for="email"><strong>Email:</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="email" value="{{Auth::user()->email}}" name="email" required>
                       </div>
                    
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('change-password') }}">
                                {{ __('Change password') }}
                            </a>
                            <x-button class="ml-4">
                                {{ __('Update Profile') }}
                            </x-button>
                    </form>
                
                </div>
            </div>
        </div>
</div>

</x-auth-card>
</x-guest-layout>
