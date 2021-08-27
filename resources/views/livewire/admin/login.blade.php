<div>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-xl-6 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-0">
                <div class=" justify-content-center">
                    <div class="">
                        <div class="card">
                            <div class="card-header">{{ __('Login') }}</div>

                            <div class="card-body">
                                @if (session()->has("error"))
                                {{session("error")}}
                                @endif
                                <form wire:submit.prevent='login'>

                                    <div class="form-group ">
                                        <label for="email"
                                            class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                        <input id="email" wire:model='email' type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}"  autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group ">
                                        <label for="password"
                                            class=" col-form-label text-md-right">{{ __('Password') }}</label>

                                        <input id="password" wire:model='password' type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                             autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>



                                    <div class="form-group  mb-0">
                                        <button type="submit" class="btn w-100 btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>