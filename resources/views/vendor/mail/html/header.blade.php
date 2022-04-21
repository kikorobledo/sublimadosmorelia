<tr>
<td class="header">
<a href="{{ $url }}" style="display: flex; flex-direction: column;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('storage/img/logo2.png') }}" class="logo" alt="Logo">
@else
<img src="{{ asset('storage/img/logo2.png') }}" style="margin: auto; width:150px"  alt="Logo">
{{ $slot }}
</div>
@endif
</a>
</td>
</tr>
