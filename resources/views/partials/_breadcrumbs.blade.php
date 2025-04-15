@php
//print_r($breadcrumbs);
//var_dump($breadcrumbs);
//echo("<br>\n");
@endphp
@foreach ($breadcrumbs as $linkHref => $linkText)
  @if ($loop->last)
    {{ $linkText }}
  @else
    <a href="{{ $linkHref }}" title="To {{ $linkText }} Page">{{ $linkText }}</a> &raquo;
  @endif
@endforeach
