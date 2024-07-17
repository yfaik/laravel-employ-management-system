<!DOCTYPE html>
<html>
<head>
    <title>Liste des Références Matekexpot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>
    <div class="container">
        <h1 class="mt-5">Liste des Références Matek expot</h1>

        
        <form method="GET" action="{{ url('/matekexpots') }}" class="form-inline mb-3">
            <input type="text" name="search" class="form-control mr-sm-2" placeholder="Rechercher une référence" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Rechercher</button>
            <div class="mt-3">
    <a href="{{ url('/matekexpots') }}" class="btn btn-secondary">Retour à la liste des Références</a>
</div>
            
        </form>

        <a href="matekexpots/create" class="btn btn-success mb-3">Créer une nouvelle Référence</a>
        
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Référence</th>
                    <th>Article</th>
                    <th>Photo</th>
                    <th>Couleur</th>
                    <th>Prix</th>

                    
                </tr>
            </thead>
            <tbody>
                @foreach ($matekexpots as $matekexpot)
                    <tr>
                        <td>{{ $matekexpot->reference }}</td>
                        <td>{{ $matekexpot->article }}</td>
                        
                        <td>
                            <img src="{{ asset('storage/' . $matekexpot->photo_path) }}" alt="Photo de {{ $matekexpot->reference }}"  style="max-width: 100px; height: auto;">
                        </td>
                        <td>
                            <div style="width: 50px; height: 20px; background-color: {{ $matekexpot->color }};"></div>
                        </td>
                        <td>{{ $matekexpot->price }}</td>
                   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
