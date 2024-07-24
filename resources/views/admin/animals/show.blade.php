@extends("layout.app")

@section("page-title", "Animals Index")

@section("main-content")
    <main>
        <div class="container">
            <section class="row">
                <div class="card p-0" style="width: 18rem;">
                    <img src="{{ $animal->img_url }}" class="card-img-top" alt="{{ $animal->name }} img">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $animal->name }}
                        </h5>
                        <p class="card-text">
                            {{ $animal->description }}
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            {{ $animal->origin }}
                        </li>
                        <li class="list-group-item">
                            {{ $animal->additional_info }}
                        </li>
                    </ul>
                    <a href="{{ route("admin.animals.index") }}" class="btn btn-primary">
                        Torna all'indice
                    </a>
                </div>
            </section>
        </div>
    </main>
@endsection
