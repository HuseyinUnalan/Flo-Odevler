<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="huseyin.png">
</head>

<body>

  <div class="container">

      <br><br><br>
      <form action="urun-kontrol.php" method="POST">

        <div class="form-group">
          <label for="pwd">Ürün Ad</label>
          <input type="text" name="urunad" class="form-control">
        </div>

        <div class="form-group">
          <label for="pwd">Ürün Fiyat</label>
          <input type="number" name="urunfiyat" class="form-control">
        </div>

        <input type="hidden" name="adet" value="0" class="form-control">

        <button class="btn btn-primary">Ürünü Ekle</button>
      </form>



  
  </div>

</body>

</html>