@extends('layouts.header')
@section('content')
@section('title','Select Communities')
</div>
</nav>

<!-- Select community options -->
<div class="form-container">
  <form method="POST" action="{{ route('proxy-community') }}" class="community-box">
    <h3>What's your top 3 interests?</h3>
    <p class="mb-4">Get started by joining the communities of your choice.</p> 
      @csrf
      <div class="mt-4 mb-3">
        <select id="firstDropbox" name="community[0]" class="form-select">
          <option value="">Choose 1st community..</option>
          @foreach($communities as $community)
          <option value = "{{ $community->communityName }}">{{ $community->communityName }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <select id="secondDropbox" name="community[1]" class="form-select">
          <option value="">Choose 2nd community..</option>
          @foreach($communities as $community)
          <option value = "{{ $community->communityName }}">{{ $community->communityName }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-2">
        <select id="thirdDropbox" name="community[2]" class="form-select">
          <option value="">Choose 3rd community..</option>
          @foreach($communities as $community)
          <option value = "{{ $community->communityName }}">{{ $community->communityName }}</option>
          @endforeach
        </select>
      </div>
    <div class="button">
      <button class="main-btn" type="submit">Proceed</button>
    </div>
  </form>
</div>

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
    
    
@endsection

