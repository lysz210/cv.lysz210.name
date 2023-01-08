<section id="informazioni_personali">
    <h1>{{__('cv.anagrafica.title')}}</h1>
    <dl>
        <dt>
            {{__('cv.anagrafica.nominativo.title')}}
        </dt>
        <dd>
            <p>
                <span id="nome">Lingyong</span> <span id="cognome">Sun</span>
            </p>
        </dd>
        @if($withMail)
        <dt>Email</dt>
        <dd>{{ env('MAIL_PERSONAL') }}</dd>
        @endif
        <dt>
            {{__('cv.anagrafica.socials.title')}}
        </dt>
        <dd>
            <dl id="contatti_social">
                @foreach (json_decode(Storage::disk('data')->get('me/social-accounts.json')) as $social)
                <dt>{{ $social->name }}</dt>
                <dd>
                    <a href="{{ $social->url }}">{{ $social->username }}</a>
                </dd>
                @endforeach
                <dt>
                    Skype
                </dt>
                <dd>
                    lysz210
                </dd>
                <dt class="print_only">
                    Curriculum online
                </dt>
                <dd class="print_only">
                    <a href="{{Request::url()}}" target="blank">Curriculum vitae online</a>
                </dd>
            </dl>
        </dd>
    </dl>
</section>
