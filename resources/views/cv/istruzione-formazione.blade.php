<section id="istruzione e formazione">
    <h1>{{ __('cv.istruzione.title') }}</h1>
    <dl>
    @foreach(__('cv.istruzione.corsi') as $corso)
        <dt>
            {{ $corso['periodo'] }}
        </dt>
        <dd>
            {!! $corso['istituto'] !!}
            <p>
                {!! $corso['corso'] !!}
            </p>
        </dd>
    @endforeach
    </dl>
</section>
