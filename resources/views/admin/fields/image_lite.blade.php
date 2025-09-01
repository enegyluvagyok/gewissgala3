@php
  // Field config
  $name   = $field['name']   ?? 'image';
  $label  = $field['label']  ?? 'Kép';
  $disk   = $field['disk']   ?? 'public';
  $accept = $field['accept'] ?? 'image/*';

  /** @var \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud */
  $entry  = $crud->getCurrentEntry();
  $url    = $entry?->image_url ?? (optional(Storage::disk($disk))->url($entry->image ?? '') ?: null);
@endphp

<div class="form-group col-12">
  <label>{!! $label !!}</label>

  {{-- file input --}}
  <input
    type="file"
    name="{{ $name }}"
    accept="{{ $accept }}"
    class="form-control"
    @if(isset($field['required']) && $field['required']) required @endif
  >

  {{-- preview --}}
  @if($url)
    <div style="margin-top:10px; display:flex; align-items:center; gap:12px;">
      <img src="{{ $url }}" alt="preview" style="height:110px; width:auto; border-radius:8px; border:2px solid #c0974a;">
      <label style="display:flex; align-items:center; gap:6px; cursor:pointer;">
        <input type="checkbox" name="{{ $name }}_remove" value="1">
        <span>Jelenlegi kép törlése</span>
      </label>
    </div>
  @endif

  @if ($errors->has($name))
    <p class="help-block text-danger">{{ $errors->first($name) }}</p>
  @endif
</div>

@push('crud_fields_scripts')
<script>
  // egyszerű élő előnézet
  (function(){
    const wrap = document.currentScript.closest('.form-group');
    const input = wrap.querySelector('input[type=file]');
    input?.addEventListener('change', e=>{
      const f = e.target.files?.[0];
      if(!f) return;
      const img = wrap.querySelector('img') || Object.assign(document.createElement('img'), {
        style: 'height:110px;width:auto;border-radius:8px;border:2px solid #c0974a;margin-top:10px;display:block;'
      });
      img.src = URL.createObjectURL(f);
      if(!wrap.contains(img)) wrap.appendChild(img);
    });
  })();
</script>
@endpush
