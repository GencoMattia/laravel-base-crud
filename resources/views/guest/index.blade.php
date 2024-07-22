@extends("layout.app")

@section("page-title", "Animals Index")

@section("main-content")
    <main>
        @dump($animals)
    </main>
@endsection
