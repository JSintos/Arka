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
                <div class="card-header" style="text-align: center;" ></div>
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
                    <form action="{{route('organizational-subscription')}}" method="POST">
                    @csrf
                        <div class="mt-4">
                           <label for="fullName"><strong>Full Name:</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="fullName" name="fullName" required>
                       </div>
                       <div class="mt-4">
                           <label for="emailAddress"><strong>Email:</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="emailAddress" name="emailAddress" required>
                       </div>
                       <div class="mt-4">
                           <label for="companyName"><strong>Company Name:</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="companyName"  name="companyName" required>
                       </div>
                       <div class="mt-4">
                           <label for="companySize"><strong>Company Size:</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="companySize" name="companySize" required>
                       </div>
                       <div class="mt-4">
                           <label for="country"><strong>Country:</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="country" name="country"  required>
                       </div>
                       <div class="mt-4">
                           <label for="details"><strong>Anything else?</strong></label>
                           <input type="text" class="block mt-1 w-full" id ="details" name="details"  required>
                       </div>
                       <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                                {{ __('Submit') }}
                        </x-button>
                    </form>
                
                </div>
            </div>
        </div>
</div>

</x-auth-card>
</x-guest-layout>
