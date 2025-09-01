@php
  /** @var \App\Models\MainGallery $entry */
  $url = $entry->image_url ?? (optional(Storage::disk('public'))->url($entry->image ?? '') ?: null);
@endphp

@if($url)
  <img src="{{ $url }}" alt="thumb" style="height:60px; width:auto; border-radius:6px; border:1px solid #c0974a;">
@else
  <span style="opacity:.7;">—</span>
@endif