<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<form method="post" action="upload.php" enctype="multipart/form-data">
 <div>
   <label for="file">Sélectionner le fichier CSV à envoyer</label>
   <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
   <input type="file" id="file" name="fileToUpload" accept=".csv">
 </div>
 <div>
   <input type="submit" name='submit'></input>
 </div>
</form>

</body>
</html>