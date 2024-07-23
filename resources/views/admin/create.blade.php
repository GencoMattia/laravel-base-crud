@extends("layout.app")

@section("page-title", "Create new animal")

@section("main-content")
    <main>
        <div class="container mt-5">
            <h1 class="mb-4">Creare un nuovo animale</h1>
            <form class="row g-3" action="{{ route('admin.animal.store') }}" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Nome:</label>
                <input class="form-control form-control-sm" type="text" placeholder="Inserisci il nome" aria-label="animal name" id="name" name="name">
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Descrizione:</label>
                <textarea class="form-control" placeholder="Inserisci descrizione" aria-label="animal description" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="col-md-6">
                <label for="origin" class="form-label">Origini:</label>
                <input class="form-control form-control-sm" type="text" placeholder="Inserisci l'origine" aria-label="animal origin" id="origin" name="origin">
            </div>

            <div class="col-md-6">
                <label for="img_url" class="form-label">URL Immagine:</label>
                <input class="form-control form-control-sm" type="text" placeholder="Inserisci url Immagine" aria-label="animal img_url" id="img_url" name="img_url">
            </div>

            <div class="col-12">
                <label for="additional_info" class="form-label">Informazioni Addizionali:</label>
                <textarea class="form-control" placeholder="Inserisci informazioni addizionali" aria-label="animal additional_info" id="additional_info" name="additional_info" rows="3"></textarea>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">
                    Inserisci
                </button>
                <button type="reset" class="btn btn-warning">
                    Reset
                </button>
            </div>
            </form>
        </div>
    </main>
@endsection
