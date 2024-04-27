@error($name)
    <div {{ $attributes->merge(['class' => 'text-danger fs-7']) }}>{{ $message }}</div>
@enderror
