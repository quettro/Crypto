@props(['k'])

<div {{ $attributes->merge(['class' => 'h-captcha', 'data-sitekey' => $k, 'data-theme' => 'light']) }}></div>
