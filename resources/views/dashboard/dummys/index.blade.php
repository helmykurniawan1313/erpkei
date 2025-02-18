<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* styles.css */
body {
    font-family: Arial, sans-serif;
}

form {
    margin: 20px;
}

label {
    margin-right: 10px;
}

        </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown with Input</title>
</head>
<body>
    <form id="form">
        <label for="dropdown">Select or Enter an Option:</label>
        <input list="options" id="dropdown" name="dropdown" oninput="checkInput(this)">
        <datalist id="options">
            <option value="Option 1">
            <option value="Option 2">
            <option value="Option 3">
        </datalist>
        <button type="submit">Submit</button>
    </form>

    <script src="script.js"></script>
</body>

<script>
// script.js
function checkInput(input) {
    const datalist = document.getElementById('options');
    const options = Array.from(datalist.options).map(option => option.value);
    const inputValue = input.value;

    if (!options.includes(inputValue)) {
        datalist.innerHTML += `<option value="${inputValue}"></option>`;
    }
}

    </script>
</html>
