@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Select Communities')

<!-- Select community options -->
<div class="form-container">
  <form method="POST" action="{{ route('community') }}" class="community-box">
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
      <div class="mb-3">
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

@endsection

