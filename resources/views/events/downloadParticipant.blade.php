<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('img/titlelogo.png') }}">
    @vite('resources/css/app.css')
    <title>Download Participant</title>
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <p class="flex justify-center mt-10"><b>Data Participant</b></p>
        <table class="static mt-10" align="center" border="1" style="width: 95%; border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid #000; padding: 8px;">No. </th>
                <th style="border: 1px solid #000; padding: 8px;">Name</th>
                <th style="border: 1px solid #000; padding: 8px;">Email</th>
                <th style="border: 1px solid #000; padding: 8px;">Phone</th>
                <th style="border: 1px solid #000; padding: 8px;">Attendance</th>
                <th style="border: 1px solid #000; padding: 8px;">Feedback</th>
            </tr>
            @foreach ($dataParticipant as $index => $item)
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $item->name }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $item->email }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $item->phone }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $item->attendance }}</td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $item->feedback }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
