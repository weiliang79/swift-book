<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <button id="add-cart">add cart</button>
    <button id="update-cart">update cart</button>
    <script>
        document.getElementById('add-cart').onclick = async () => {
            let ace = await axios.post('{{ route("cart.add", ["book_id" => 1]) }}')
            console.log(ace)
            axios.post('{{ route("cart.add", ["book_id" => 2]) }}')
            axios.post('{{ route("cart.add", ["book_id" => 3]) }}')
            axios.post('{{ route("cart.add", ["book_id" => 4]) }}')
            axios.post('{{ route("cart.add", ["book_id" => 5]) }}')
            axios.post('{{ route("cart.add", ["book_id" => 6]) }}')
        }

        document.getElementById('update-cart').onclick = async () => {
            axios.put('http://127.0.0.1/swift-book/public/cart/1/90')
        }
    </script>
</body>
</html>
