@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block text-green-400">
        <button type="button" class="close" data-dismiss="alert"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block text-red-400">
        <button type="button" class="close" data-dismiss="alert"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block text-yellow-400">
        <button type="button" class="close" data-dismiss="alert"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block text-blue-400">
        <button type="button" class="close" data-dismiss="alert"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Verifique os seguintes erros:(
    </div>
@endif --}}