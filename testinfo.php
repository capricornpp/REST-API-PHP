<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: cursive;
            text-align: center;
        }
        thead {
            background: #333;
            color: #fff;
        }
        tr, td {
            padding: 1rem .5rem;
            border: 1px solid #CCC;
        }

        button {
            padding: 1rem .5rem;
            background: green;
            text-transform: uppercase;   
            color: white; 
            border: none;
            border-radius: 10px;
            cursor: pointer;
            outline: none;
        }
    </style>
</head>
<body>

    <table width="100%">
        <thead>
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>AGE</td>
            </tr>
        </thead>

        <tbody id="info">

        </tbody>
    </table>

    <button type="botton" onClick="loadDoc()">Change Content</button>

    <!-- ajax pureJS -->
    <script>
        function loadDoc() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    // dataServer(text) แปลงเป็น js obj => 
                    let data = JSON.parse(this.responseText);
                    console.log(data);

                    for(let i = 0; i < data.length ; i++) {
                        document.getElementById('info').innerHTML += `
                        <tr>
                        <td>${data[i].id}</td>
                        <td>${data[i].name}</td>
                        <td>${data[i].age}</td>
                        </tr>
                        `

                    }
                }
            }
            document.getElementById('info').innerHTML = '';
            xhttp.open("GET", 'index.php', true);
            xhttp.send();
        }
        
    </script>
</body>
</html>