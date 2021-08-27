<div>
    <div class="w-100">
        <form wire:submit.prevent='register'>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror"
                        wire:model="name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" wire:model="email" type="email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="roll" class="col-md-4 col-form-label text-md-right">{{ __('Roll') }}</label>

                <div class="col-md-6">
                    <select wire:model='roll' name="roll" id="roll"
                        class="form-control form-control-lg @error('roll') is-invalid @enderror">
                        <option value="" selected> ---- Select Roll ---- </option>
                        <option value="1">Admin</option>
                        <option value="0">Normal</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" wire:model="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password"
                        autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="image" wire:model='image' type="file" class="form-control" name="image"
                        autocomplete="image">
                    @if ($image)
                    <img src="{{$image->temporaryUrl()}}" style="width:70px;height:70px; " alt="">
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>