<!DOCTYPE html>
<html>
<head>
    <title>Créer une Référence Matek expot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .table img {
            max-width: 100px;
            height: auto;
        }
        .form-section {
            margin-bottom: 50px;
        }
        .table-section {
            margin-top: 50px;
        }

        /* CSS for the medium-sized table */
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        thead {
            background-color: #f8f9fa;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e9ecef;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        .btn {
            margin: 5px;
        }

        .alert {
            width: 80%;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h1 class="mt-5">Créer une Référence Matekexpot</h1>
            <form action="{{ route('matekexpots.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="reference">Référence :</label>
                    <input type="text" class="form-control" id="reference" name="reference" required>
                </div>
                <div class="form-group">
                    <label for="article">Article :</label>
                    <input type="text" class="form-control" id="article" name="article" required>
                </div>
                <div class="form-group">
                    <label for="photo">Photo :</label>
                    <input type="file" class="form-control" id="photo" name="photo" required>
                </div>
                <div class="form-group">
                    <label for="color">Couleur :</label>
                    <input type="color" class="form-control" id="color" name="color" required>
                </div>
                <div class="form-group">
                    <label for="price">Prix :</label>
                    <input type="number" class="form-control" id="price" name="price" required step="0.01">
                </div>
                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>

        <div class="table-section">
            <h1>Liste des Références Matekexpot</h1>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Référence</th>
                        <th>Article</th>
                        <th>Prix</th>
                        <th>Couleur</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matekexpots as $matekexpot)
                        <tr>
                            <td>{{ $matekexpot->reference }}</td>
                            <td>{{ $matekexpot->article }}</td>
                            <td>{{ $matekexpot->price }}</td>
                            <td>
                                <div style="width: 50px; height: 20px; background-color: {{ $matekexpot->color }};"></div>
                            </td>
                            <td>
                                <img src="{{ asset('storage/' . $matekexpot->photo_path) }}" alt="Photo de {{ $matekexpot->reference }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
