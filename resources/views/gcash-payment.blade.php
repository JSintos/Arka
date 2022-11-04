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
                <div class="card-header" style="text-align: center;" >Image of Gcash Account</div>
                <p>After paying through GCash, please fill out the required details below.</p>
                <p>Premium subscription will be applied to your account after verfication of payment.</p>
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
                    <form action="{{route('gcash-payment')}}" method="POST">
                    @csrf
                        <div class="mt-4">
                           <label for="referenceNumber"><strong>Reference Number:</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="referenceNumber" name="referenceNumber" required>
                       </div>
                       <div class="mt-4">
                           <label for="phoneNumber"><strong>Phone Number:</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="phoneNumber" name="phoneNumber" required>
                       </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
</div>

</x-auth-card>
</x-guest-layout>