@extends('layouts.app')

@section('title', 'Travel')

@section('content')
    <section class="section">
        <ul class="list">
            <li class="card card--country">
                <a href="">
                    <div class="card__info">
                        <div class="card__overlay">
                            <p class="card__title">Spain</p>
                        </div>
                    </div>
                    <div class="card__container">
                        <img class="card__img" src="{{ asset('storage/images/fabio-comparelli-uq2E2V4LhCY-unsplash.jpg') }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
                    </div>
                </a>
            </li>
            <li class="card card--country">
                <a href="">
                    <div class="card__info">
                        <div class="card__overlay">
                            <p class="card__title">Spain</p>
                        </div>
                    </div>
                    <div class="card__container">
                        <img class="card__img" src="{{ asset('storage/images/fabio-comparelli-uq2E2V4LhCY-unsplash.jpg') }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
                    </div>
                </a>
            </li>
            <li class="card card--country">
                <a href="">
                    <div class="card__info">
                        <div class="card__overlay">
                            <p class="card__title">Spain</p>
                        </div>
                    </div>
                    <div class="card__container">
                        <img class="card__img" src="{{ asset('storage/images/fabio-comparelli-uq2E2V4LhCY-unsplash.jpg') }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
                    </div>
                </a>
            </li>
            <li class="card card--country">
                <a href="">
                    <div class="card__info">
                        <div class="card__overlay">
                            <p class="card__title">Spain</p>
                        </div>
                    </div>
                    <div class="card__container">
                        <img class="card__img" src="{{ asset('storage/images/fabio-comparelli-uq2E2V4LhCY-unsplash.jpg') }}" alt="fabio-comparelli-uq2E2V4LhCY-unsplash.jpg">
                    </div>
                </a>
            </li>
        </ul>
    </section>
@endsection 