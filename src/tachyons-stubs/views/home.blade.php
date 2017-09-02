@extends('layouts.app')

@section('content')
<section class="mw5 mw7-ns center pa3 ph5-ns">
    <article class="center mw5 mw6-ns br3 hidden ba b--black-10 mv4">
        <h1 class="f4 bg-near-white br3 br--top black-60 mv0 pv2 ph3">Dashboard</h1>
        <div class="pa3 bt b--black-10">
            @if (session('status'))
                <div class="flex pa4 bg-lightest-green green">
                    <span class="lh-title ml3">
                        {{ session('status') }}
                    </span>
                </div>
            @endif

            You are logged in!
        </div>
    </article>
</section>
@endsection
