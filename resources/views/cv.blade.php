@extends('layout.base')

@php
if (!empty($isPdf) && $isPdf) {
	$localAsset = $localMix =  'public_path';
} else {
	$localMix =  'mix';
	$localAsset = 'asset';
}
@endphp

@section('page-title', 'Curriculum vitae di Lingyong Sun')

@section('head')
		<meta name="description" content="Curriculum vitae di Lingyong Sun aggiornato a Settembre 2015">
		<meta name="author" content="Linyong Sun">
		<meta name="keywords" content="curriculum vitae, cv, curriculum, Lingyong, Sun, Lingyong Sun"/>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="stylesheet" type="text/css" href="{{ $localMix('css/cv/main_style.css') }}">
		@endsection

@section('body')
<header>
	<h1>
		<img class="logo-auropass" src="{{ $localAsset('images/europass-inline.svg') }}" alt="logo europass" title="logo europass" />
		<span>Curriculum Vitae</span>
	</h1>
</header>

<!--
informazioni personali
-->
@component('cv.informazioni-personali', ['withMail' => $withMail])
@endcomponent
<!-- fine informazioni personali -->

<!--
esperienze lavorative
-->
@component('cv.esperienze-lavorative')
@endcomponent
<!-- fine esperienze lavorative -->

<!-- istruzione e formazione -->
@component('cv.istruzione-formazione')
@endcomponent
<!-- fine iscruzione e formazione -->

<!-- competenze -->
@component('cv.competenze')
@endcomponent
<!-- fine competenze -->

@if(Lang::has('cv.cdt'))
<section id="consenso_td">
	<h1>
		{{ __('cv.cdt.title') }}
	</h1>
	<p>{{ __('cv.cdt.content') }}</p>
</section>
@endif
@endsection
