@extends('index')
@section('section')
    <h1>Résultat de la recherche</h1>

    @if (count($recettes) !== 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">titre</th>
                <th scope="col">ingredients</th>
                <th scope="col">duree de preparation</th>
                <th scope="col">photo</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($recettes as $recette)

                <tr>
                    <th scope="row"></th>
                    <td> {{ $recette->titre }}</td>
                    <td> {{ $recette->ingredients }}</td>
                    <td>  {{ $recette->duree }}</td>
                    <td> <img src="{{ $recette->photo }}" alt=""> </td>
                </tr>

            @endforeach
            @else
                <p>Aucune recette ne correspond à cette recherche</p>
    @endif

@stop
