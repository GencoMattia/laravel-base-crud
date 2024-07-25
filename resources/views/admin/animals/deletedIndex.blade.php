@extends("layout.app")

@section("page-title", "Deleted Animals Index")

@section("main-content")
    <main>
        <div class="container">
            @if (session("message"))
                <div class="alert alert-success">
                    {{ session("message") }}
                </div>
            @endif
            <section class="row">
                @foreach ( $animals as $animal )
                <div class="card p-0 text-center" style="width: 18rem;">
                    <img src="{{ $animal->img_url }}" class="card-img-top" alt="{{ $animal->name }} img">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $animal->name }}
                        </h5>
                        <form action="{{ route("admin.animals.restore", $animal) }}" class="d-inline-block" method="POST" data-animal-id="{{ $animal->id }}" data-animal-name="{{ $animal->name }}">
                            @csrf
                            @method("PATCH")

                            <button type="submit" class="btn btn-warning">
                                Ripristina
                            </button>
                        </form>
                        <form action="{{ route("admin.animals.permanentDelete", $animal) }}" class="animal-delete d-inline-block" method="POST" data-animal-id="{{ $animal->id }}" data-animal-name="{{ $animal->name }}">
                            @csrf
                            @method("DELETE")

                            <button type="submit" class="btn btn-danger">
                                Rimuovi
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </section>
        </div>
    </main>
@endsection

@section("custom-script")
    @vite("resources/js/delete-confirm.js")
@endsection
