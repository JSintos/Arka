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
<form method="POST" action="{{ route('register') }}">
  <p>
    <input type="checkbox" name="community" id="architecture" value="Architecture">
    <label for="architecture">Architecture</label>
  
  <p>
    <input type="checkbox" name="community" id="biology" value="Biology">
    <label for="biology">Biology</label>
  <p>
    <input type="checkbox" name="community" id="business" value="Business">
    <label for="business">Business</label>
  <p>
    <input type="checkbox" name="community" id="computerScience" value="Computer Science">
    <label for="computerScience">Computer Science</label>
  </p>
  <div class="flex items-center justify-end mt-4">
    <x-button class="ml-4">
    {{ __('Submit') }}
    </x-button>
</div>

  
</form>
</div>
</x-auth-card>
</x-guest-layout>
<!--scripts -->
<script src="js/community.js"></script>