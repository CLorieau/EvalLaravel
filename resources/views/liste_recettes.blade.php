@extends('index')
@section('section')
    <h1>Liste de toutes les recettes</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">titre</th>
                <th scope="col">ingredients</th>
                <th scope="col">duree de préparation</th>
                <th scope="col">photo</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($recettes as $recette)
            <tr>
                <td> {{ $recette->titre }}</td>
                <td> {{ $recette->ingredients }}</td>
                <td>  {{ $recette->duree }}</td>
                <td>  <img src="{{ $recette->photo }}"></td>
            </tr>
            @endforeach
            </tbody>
        </table>


@stop
