@extends('layouts.app5')

@section('title')
My Influencers List
@parent
@stop

@section('bread1', 'Influencers List')
@section('bread2', 'Lists')


@section('head')
@livewireStyles
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script>

@endsection

@section('content')


<div class="container">
        @if (session()->has('message'))

            <div class="alert alert-success">

            {{ session('message') }}

            </div>

        @endif

                       


@livewire('brands.lists')

</div>
</div>






@include('livewire.brands.newlist')


@endsection

@section('footer')

@livewireScripts

    <script type="text/javascript">

        window.livewire.on('listAdded', () => {

            $('#newlist').modal('hide');

        });

    </script>


@endsection