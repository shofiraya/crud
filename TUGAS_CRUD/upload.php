<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    
    <style>
        body {
            width: 800px;
            margin: auto;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
            background-color: #060a1f;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            text-underline-position: under;
            text-decoration: underline black;
        }

        button{
            padding: 10px;
            font-weight: bold;
            color: white;
            background-color: #4caf50;
            border: none;
            font-size: 16px;
            cursor: pointer;
            display: block;
            margin-top: 20px;
            float: right;
        }

        label{
            font-weight: bold;
            display: block;
            font-size: 20px;
            margin-bottom: 10px;
        }

        input{
            border: 1px solid black;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            box-sizing: border-box;
        }

        div{
            border: 1px solid black;
            padding: 20px;
            width: 90%;
            background-color: white;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Form Upload File</h3>
        <form style="margin-left: 10px;" action="hasil_upload.php" method="POST" enctype="multipart/form-data">
            <label for="">Upload file :</label>
            <Input type="file" name="gambar">
            <button name="submit" type="submit">Upload</button>
        </form>
    </div>
<?php

?>
    
    <br/>
    <br/>
    <a style="margin-left: 10px;" href="upload.php">Upload lagi</a>
    <br/>
    <br/>
</body>
</html>