<div class="label-error">
    <label for="{{ $for }}">{{ Str::title($for) }}</label>
    @error($for)
    <span class="error-message">{{ $message }}</span>
    @enderror
</div>

