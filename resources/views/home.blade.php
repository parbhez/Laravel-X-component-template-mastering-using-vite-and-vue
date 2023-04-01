<x-app-layout>

    <x-slot name="title">| Home </x-slot>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('assets/css/plugin/analog-clock.css') }}">
        <style>
            #btnId {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }
        </style>
    </x-slot>

    <x-slot name="maincontent">
        @php $data = ['apple', 'ball', 'bat']; @endphp
        <home :data='@json($data)'></home>

        <div class="row">
            <div class="col-md-6">
                <h4>Test jQuery into Vite</h4>
                <p>This is a paragraph.</p>
                <button id="btnId">Show/Hide</button>
            </div>
        </div>

    </x-slot>


    <x-slot name="scripts">
        <script type="module">
            document.addEventListener('DOMContentLoaded', function () {
                $(document).ready(function(){
                    console.log("Hello");
                    $("button").click(function(){
                        $("p").toggle();
                    });
                });
            }, false);

        </script>
    </x-slot>
</x-app-layout>
