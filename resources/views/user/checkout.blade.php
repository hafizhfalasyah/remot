<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <title>ReMot | Halaman Checkout</title>
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Poppins:wght@200;300;400;500;600;700&display=swap');
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 20px;
            background-color: #00345b;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #6CA6CD;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Penyewaan</h2>
        <form id="checkout-form">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" value="{{ $rent->name }}" required>
            </div>
            <div class="form-group">
                <label for="phone">No Hp</label>
                <input type="text" id="phone" name="phone" value="{{ $rent->phone }}" required>
            </div>
            <div class="form-group">
                <label for="merk">Merk Motor</label>
                <input type="text" id="merk" name="merk" value="{{ $merk }}" required>
            </div>
            <div class="form-group">
                <label for="year">Tahun Motor</label>
                <input type="text" id="year" name="year" value="{{ $year }}" required>
            </div>
            <div class="form-group">
                <label for="pick">Tanggal Pengambilan</label>
                <input type="date" id="pick" name="pick" value="{{ $rent->pick }}" required>
            </div>
            <div class="form-group">
                <label for="return">Tanggal Pengembalian</label>
                <input type="date" id="return" name="return" value="{{ $rent->return }}" required>
            </div>
            <div class="form-group">
                <label for="qty">Jumlah Hari</label>
                <input type="text" id="qty" name="qty" value="{{ $days }}" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Harga</label>
                <input type="text" id="total_price" name="total_price" value="{{ $rent->total_price }}" required>
            </div>
            <button id="pay-button" type="submit">Bayar Sekarang</button>
        </form>
    </div>

    <script>
        // Function to handle form submission
        function handleSubmit(event) {
            event.preventDefault();

            // Retrieve form data
            const form = document.getElementById('checkout-form');
            const name = form.elements.name.value;
            const email = form.elements.email.value;
            const address = form.elements.address.value;
            const city = form.elements.city.value;
            const country = form.elements.country.value;

            // Perform any additional logic or validation here

            // Display a success message
            alert('Order placed successfully!');

            // Optional: Redirect to a confirmation page
            // window.location.href = 'confirmation.html';
        }

        // Attach event listener to the form's submit event
        const form = document.getElementById('checkout-form');
        form.addEventListener('submit', handleSubmit);
    </script>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
            /* You may add your own implementation here */
            // alert("payment success!");
            window.location.href = '/invoice/{{ $rent->id }}'
            console.log(result);
            },
            onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
            },
            onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
            }
        })
        });
    </script>
</body>
</html>
