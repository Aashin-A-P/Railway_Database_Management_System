<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form id="transactionForm" onsubmit="submitForm(event)">
        <h2>Passenger Details</h2>
        <label for="passengerName">Passenger Name:</label>
        <input type="text" id="passengerName" name="passengerName" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="seatPreference">Seat Preference:</label>
        <select id="seatPreference" name="seatPreference">
            <option value="window">Window</option>
            <option value="aisle">Aisle</option>
        </select>

        <button type="submit">Submit</button>
    </form>

    <script>
        function submitForm(event) {
            event.preventDefault();

            // Get form data
            const form = document.getElementById('transactionForm');
            const formData = new FormData(form);

            // Send data to the server (replace with your backend endpoint)
            fetch('your_backend_endpoint', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
                console.log(data);
                alert('Transaction successful!');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Transaction failed. Please try again.');
            });
        }
    </script>
</body>

</html>
