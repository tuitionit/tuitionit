@if ($errors->any())
    <div class="alert uk-alert alert-danger uk-alert-danger">
        @foreach ($errors->all() as $error)
            {!! $error !!}<br/>
        @endforeach
    </div>
@elseif (session()->get('flash_success'))
    <div class="alert uk-alert alert-success uk-alert-success">
        @if(is_array(json_decode(session()->get('flash_success'), true)))
            {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_success') !!}
        @endif
    </div>
@elseif (session()->get('flash_warning'))
    <div class="alert uk-alert alert-warning uk-alert-warning">
        @if(is_array(json_decode(session()->get('flash_warning'), true)))
            {!! implode('', session()->get('flash_warning')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_warning') !!}
        @endif
    </div>
@elseif (session()->get('flash_info'))
    <div class="alert uk-alert alert-info uk-alert-info">
        @if(is_array(json_decode(session()->get('flash_info'), true)))
            {!! implode('', session()->get('flash_info')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_info') !!}
        @endif
    </div>
@elseif (session()->get('flash_danger'))
    <div class="alert uk-alert alert-danger uk-alert-danger">
        @if(is_array(json_decode(session()->get('flash_danger'), true)))
            {!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_danger') !!}
        @endif
    </div>
@elseif (session()->get('flash_message'))
    <div class="alert uk-alert alert-info uk-alert-info">
        @if(is_array(json_decode(session()->get('flash_message'), true)))
            {!! implode('', session()->get('flash_message')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_message') !!}
        @endif
    </div>
@endif
