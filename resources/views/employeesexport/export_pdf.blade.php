<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Employees</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;

        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th ,td{
            padding:  10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
         
    </style>
</head>
<body> 
    <h1 style="text-align: center;">Employees List</h1>
    <table>
         <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Title</th>
                <th>Email</th>
                <th>Department</th>
                <th>Country</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody >
            @foreach ($employees as $employee )
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->title_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{isset( $employee->departmen) ? $employee->department->name: 'N/A' }}</td>
                <td>{{ isset( $employee->country )? $employee->country->name: 'N/A' }}</td>
                <td>{!! $employee->notes !!}</td>
            </tr>
                
            @endforeach
            </tbody>
        </table>
</body>
</html>