@props([
    'slot' => config('services.adsense.slot_main'),
])

@php
    $client = config('services.adsense.client');
    $slotId = $slot;
    $adtest = app()->environment('production') ? 'off' : 'on';
@endphp

@if($client && $slotId)
<div class="my-2 flex justify-center">
    <ins class="adsbygoogle"
         style="display:block;min-height:250px"
         data-ad-client="{{ $client }}"
         data-ad-slot="{{ $slotId }}"
         data-ad-format="auto"
         data-full-width-responsive="true"
         data-adtest="{{ $adtest }}"></ins>
</div>
<script>
(function(){
    if (!window._adsenseLoaded) {
        var s = document.createElement('script');
        s.async = true;
        s.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $client }}';
        s.setAttribute('crossorigin','anonymous');
        document.head.appendChild(s);
        window._adsenseLoaded = true;
    }
    (adsbygoogle = window.adsbygoogle || []).push({});
})();
</script>
@endif