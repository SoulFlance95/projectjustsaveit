@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header"><h4 class="text-center">Menu d'impression des étiquettes</h4></div>
     <div class="card-body text-center">
        <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-print"> Imprimer en 2 blocs de 5</i></a> <br><br>
        <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-print"> Imprimer en format C6</i></a> <br><br>
        <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-print"> Imprimer le bon de livraison</i></a> <br><br>
        <a href="#" class="btn btn-danger btn-lg"><i class="fa fa-print"> Imprimer en une seule fois</i></a> <br><br>

     </div>
     <div class="card-footer text-center bg-gray">
        <a href="{{route('admin.commandes.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Revenir au menu des commandes</a>
     </div>
</div>

<style>
    .text-green{
        color:green;
    }
    .text-red{
        color:red;
    }
</style>
@endsection
