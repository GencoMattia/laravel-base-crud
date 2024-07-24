@extends("layout.app")

@section("page-title", "Animals Index")

@section("main-content")
    <main>
        <div class="container">
            <section class="row">
                @foreach ( $animals as $animal )
                <div class="card p-0 text-center" style="width: 18rem;">
                    <img src="{{ $animal->img_url }}" class="card-img-top" alt="{{ $animal->name }} img">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $animal->name }}
                        </h5>
                        <a href="{{ route("admin.animals.show", $animal->id) }}" class="btn btn-primary">
                            Vedi dettagli
                        </a>
                        <a href="{{ route("admin.animals.edit", $animal->id) }}" class="btn btn-success">
                            Modifica
                        </a>
                    </div>
                </div>
                @endforeach
            </section>
        </div>
        @dump($animals)
    </main>
@endsection
