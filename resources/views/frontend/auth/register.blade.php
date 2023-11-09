<div class="col-2">

    <h2>{{ trans('message.register') }}</h2>

    <form method="post" class="register" action="{{ route('home.register') }}">
        {{ csrf_field() }}
        <p class="form-row form-row-wide">
            <label for="email">Email<span class="required">*</span></label>
            <input type="text" class="input-text" name="email" id="email" placeholder="{{ trans('message.inputEmail') }}" />
            @error('email')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <p class="form-row form-row-wide">
            <label for="first_name">{{ trans('message.register.first_name') }}<span class="required">*</span></label>
            <input type="text" class="input-text" name="first_name" id="first_name" placeholder="{{ trans('message.register.enter_first_name') }}" />
            @error('first_name')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <p class="form-row form-row-wide">
            <label for="last_name">{{ trans('message.register.last_name') }}<span class="required">*</span></label>
            <input type="text" class="input-text" name="last_name" id="last_name" placeholder="{{ trans('message.register.last_name') }}" />
            @error('last_name')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <p class="form-row form-row-wide">
            <label for="password">Password<span class="required">*</span></label>
            <input class="input-text" type="password" name="password" id="password" placeholder="{{ trans('message.inputPassword') }}" />
            @error('password')
                <span class="error" style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <p class="form-row"><input type="submit" class="button" value="{{ trans('message.register') }}" /></p>
    </form>

</div><!-- .col-2 -->