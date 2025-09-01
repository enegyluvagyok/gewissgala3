@if ($crud->hasAccess('update'))
  <a href="{{ route('link-widget.fetch-meta', $entry->getKey()) }}"
     class="btn btn-sm btn-link" title="Meta frissítése">
    <i class="la la-sync"></i> Meta frissítése
  </a>
@endif