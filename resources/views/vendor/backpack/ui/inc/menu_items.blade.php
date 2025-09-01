{{-- Ez a fájl határozza meg a menüt a Backpack adminban --}}

{{-- Dashboard --}}
<x-backpack::menu-item 
    title="Kezdőlap" 
    icon="la la-home" 
    :link="backpack_url('dashboard')" 
/>

{{-- Felhasználók --}}
<x-backpack::menu-item 
    title="Felhasználók" 
    icon="la la-users" 
    :link="backpack_url('user')" 
/>

{{-- Harcosok --}}
<x-backpack::menu-item 
    title="Versenyzők" 
    icon="la la-user-ninja" 
    :link="backpack_url('fighter')" 
/>

{{-- Meccsek --}}
<x-backpack::menu-item 
    title="Mérkőzések" 
    icon="la la-fist-raised" 
    :link="backpack_url('fight')" 
/>

{{-- Órarend --}}
<x-backpack::menu-item 
    title="Órarend" 
    icon="la la-calendar-alt" 
    :link="backpack_url('schedule-item')" 
/>

{{-- Galéria --}}
<x-backpack::menu-item 
    title="Galéria" 
    icon="la la-images" 
    :link="backpack_url('main-gallery')" 
/>

{{-- Link Widgetek --}}
<x-backpack::menu-item 
    title="Linkek / Partnerek" 
    icon="la la-link" 
    :link="backpack_url('link-widget')" 
/>
