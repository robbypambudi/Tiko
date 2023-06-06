<div>
  <label class="font-semibold text-lg">
    {{ $attributes['label'] }}
  </label>
  <input {{ $attributes->merge(['class' => 'bg-[#F5F5F5] px-4 py-3 rounded-lg w-full text-[#BEBEBE]']) }} id='{{
  $attributes['name'] }}' name="{{ $attributes['name'] }}" value="{{ old($attributes['name'])
  }}" />
</div>