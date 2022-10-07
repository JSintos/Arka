<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
<!-- Select community options -->
<div>
<h2>What's your top 3 interests?</h2>
<!-- <form method="POST" action="{{ route('proxy-community') }}">
@csrf
  <p>
    <input type="checkbox" name="community[architecture]" id="architecture" value="Architecture">
    <label for="architecture">Architecture</label>
  
  <p>
    <input type="checkbox" name="community[biology]" id="biology" value="Biology">
    <label for="biology">Biology</label>
  <p>
    <input type="checkbox" name="community[business]" id="business" value="Business">
    <label for="business">Business</label>
  <p>
    <input type="checkbox" name="community[computerScience]" id="computerScience" value="Computer Science">
    <label for="computerScience">Computer Science</label>
  </p>
  <div class="flex items-center justify-end mt-4">
    <x-button class="ml-4">
    {{ __('Submit') }}
    </x-button>
</div>
</form> -->

<form method="POST" action="{{ route('proxy-community') }}">
  @csrf
  <p>

  <select id="firstDropbox" name="community[0]" class="selectCommunity">
    <div class="dropdown-content">
      <option value="">Choose 1st interest</option>
      @foreach($communities as $community)
        <option value = "{{ $community->communityName }}">{{ $community->communityName }}</option>
      @endforeach
    </div>
  </select>
  <p>
  <select id="secondDropbox" name="community[1]" class="selectCommunity">
    <div class="dropdown-content">
      <option value="">Choose 2nd interest</option>
      @foreach($communities as $community)
        <option value = "{{ $community->communityName }}">{{ $community->communityName }}</option>
      @endforeach
    </div>
  </select>
  <p>
  <select id="thirdDropbox" name="community[2]" class="selectCommunity">
    <div class="dropdown-content">
      <option value="">Choose 3nd interest</option>
      @foreach($communities as $community)
        <option value = "{{ $community->communityName }}">{{ $community->communityName }}</option>
      @endforeach
    </div>
  </select>
  <div class="flex items-center justify-end mt-4">
    <x-button class="ml-4">
    {{ __('Submit') }}
    </x-button>
    
</form>
</div>
</div>



</x-auth-card>
</x-guest-layout>

