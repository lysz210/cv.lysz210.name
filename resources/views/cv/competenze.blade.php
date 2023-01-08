<section id="competenze_personali">
    <h1>{{ __('cv.competenze.title') }}</h1>

    <dl>

        <dt>
            {{ __('cv.competenze.lingue.madre.title') }}
        </dt>
        <dd>
            {{ __('cv.competenze.lingue.madre.content') }}
        </dd>

        <dt>
            {{ __('cv.competenze.lingue.altre.title') }}
        </dt>
        <dd>
            <table>
                <thead>
                    <tr>
                        <th> </th>
                        @foreach(__('cv.competenze.lingue.altre.cols') as $col)
                        <th>{{ $col }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach(__('cv.competenze.lingue.altre.list') as $lingua)
                    <tr>
                        <td>{{ $lingua['name'] }}</td>
                        @foreach(__('cv.competenze.lingue.altre.cols') as $k => $v)
                        <td>{{ $lingua[$k] }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            {!! __('cv.competenze.lingue.altre.footer') !!}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </dd>

        <dt>
            {{ __('cv.competenze.informatiche.title') }}
        </dt>
        <dd>
            <x-lista :value="__('cv.competenze.informatiche.list')"></x-lista>
        </dd>

        <dt>
            {{ __('cv.competenze.patente.title') }}
        </dt>
        <dd>
            {{ __('cv.competenze.patente.content') }}
        </dd>
    </dl>
</section>
