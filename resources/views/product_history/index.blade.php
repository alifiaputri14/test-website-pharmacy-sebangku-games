<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deleted Products History</title>
</head>

<body>
    <h1>Deleted Products History</h1>

    @if ($deletedProducts->isEmpty())
        <p>No deleted products found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedProducts as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->image_url }}</td>
                        <td>
                            <form action="{{ route('product_history.restore', $product->id) }}" method="post">
                                @csrf
                                @method('POST') <!-- Add this line to override the method -->
                                <button type="submit">Restore</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>

</html>
