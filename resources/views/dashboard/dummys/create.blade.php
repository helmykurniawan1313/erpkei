<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Company</title>
</head>
<body>
  
    <form action="{{ url('/dummys') }}" method="post">
        @csrf
        <label for="company">Select or Enter a Company:</label>
        <select id="companySelect" name="companySelect" onchange="handleSelectChange()">
            <option value="" disabled selected>Select a company</option>
            @foreach ($companies as $company)
                <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
            @endforeach
            <option value="other">Other</option>
        </select>
        <input type="text" id="companyInput" name="companyInput" style="display:none;" placeholder="Enter a new company">
        <button type="submit">Submit</button>
    </form>
    
    <script>
        function handleSelectChange() {
            const select = document.getElementById('companySelect');
            const input = document.getElementById('companyInput');
            if (select.value === 'other') {
                input.style.display = 'block';
                input.required = true;
            } else {
                input.style.display = 'none';
                input.required = false;
            }
        }

        document.querySelector('form').addEventListener('submit', function (event) {
            const select = document.getElementById('companySelect');
            const input = document.getElementById('companyInput');
            if (select.value === 'other') {
                select.name = '';
                input.name = 'company_name';
            } else {
                select.name = 'company_name';
                input.name = '';
            }
        });
    </script>
</body>
</html>
