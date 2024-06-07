<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="assets/A.png" />
    <title>TickSer</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <center>
        <header>
            <nav>
                <div class="logo">
                    <img src="assets/A.png" alt="" width="75" height="auto" />
                </div>
                <a href="index.php">Home</a>
                <a href="#">Categories</a>
                <a href="log.php">Login</a>
            </nav>
        </header>
        <main>
            <div>
                <h1>"Enjoy Concerts Hassle-Free with TickSer!"</h1>
                <div class="wrapper">
                    <div class="slider">
                        <span id="slide-1"></span>
                        <span id="slide-2"></span>
                        <span id="slide-3"></span>
                        <span id="slide-4"></span>
                        <span id="slide-5"></span>
                        <span id="slide-6"></span>
                        <div class="cards-categories" id="carousel1">
                            <div class="card1">
                                <img src="assets/C.png" alt="" width="600" height="250" />
                            </div>
                            <div class="card2">
                                <img src="assets/J.jpg" alt="" width="600" height="250" />
                            </div>
                            <div class="card3">
                                <img src="assets/K.jpg" alt="" width="600" height="250" />
                            </div>
                            <div class="card4">
                                <img src="assets/L.jpg" alt="" width="600" height="250" />
                            </div>
                            <div class="card5">
                                <img src="assets/M.jpg" alt="" width="600" height="250" />
                            </div>
                            <div class="card6">
                                <img src="assets/N.jpg" alt="" width="600" height="250" />
                            </div>
                        </div>
                        <div class="navigation">
                            <a href="#slide-1">1</a>
                            <a href="#slide-2">2</a>
                            <a href="#slide-3">3</a>
                            <a href="#slide-4">4</a>
                            <a href="#slide-5">5</a>
                            <a href="#slide-6">6</a>
                        </div>
                    </div>
                </div>
                <div class="startbtn">
                    <center id="jumbotronCenter"></center><br />
                    <button type="button" class="btn_getStarted">Get Started</button>

                    <div class="cards-categories">
                        <h2>Tiket Categories</h2>
                        <div class="card-categories">
                            <?php
					include 'koneksi.php';
					$sql = "SELECT * FROM tb_categories";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
						<h3 style='text-align: center; color: black;'>Data Kosong</h3>
				";
					}
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
						<div class='card'>
							<div class='card-image'>
								<img src='img_categories/$data[photo]' alt='tidak ada gambar' />
							</div>
							<div class='card-content'>
								<h5>$data[categories]</h5>
								<p class='description'>$data[description]</p>
								<p class='price'> $data[price] </p>
								<button class='btn_belanja' type='submit' onclick='bukaModal(\"id=$data[id]\")'>Beli</button>
							</div>
					</div>
                  ";
					}
					?>
                        </div>
                    </div>
                    <!--  Modal -->
                    <div id="myModal" class="modal-container" onclick="tutupModal()">
                        <div class="modal-dialog" onclick="event.stopPropagation()">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title " style="color:  #120a0c;">Formulir Pembayaran</h1>

                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input type="hidden" name="category_id" id="category_id" value="">
                                        <input type="hidden" name="category_name" id="category_name" value="">
                                        <input type="hidden" name="price" id="price" value="">
                                        <div class="form-group">
                                            <label class="labelmodal" for="recipient-name" class="col-form-label">Nama
                                                :</label>
                                            <input class="inputdata" type="text" class="form-control"
                                                id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label class="labelmodal" for="handphone" class="col-form-label">No. Hp
                                                :</label>
                                            <input class="inputdata" type="text" class="form-control" id="handphone">
                                        </div>
                                        <div class="form-group">
                                            <label class="labelmodal" for="alamat-text"
                                                class="col-form-label">Alamat:</label>
                                            <textarea class="inputalamat" class="form-control"
                                                id="alamat-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        onclick="tutupModal()">Keluar</button>
                                    <button type="button" class="btn btn-yellow"
                                        onclick="bukaModal2()">Lanjutkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal 2 -->
                    <div id="myModal2" class="modal-container" onclick="tutupModal2()">
                        <div class="modal-dialog" onclick="event.stopPropagation()">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title" style="color:  #120a0c;">Data Transaksi</h1>

                                </div>
                                <form action="transaction/transaction-proses.php" method="post">
                                    <div class="modal-body">
                                        <h4> Kategori</h4>
                                        <div class="form-group">
                                            <label class="labelmodal" for="detail-kategori"
                                                class="col-form-label">Kategori
                                                :</label>
                                            <input class="inputdata" type="text" name="detail-kategori"
                                                class="form-control" id="detail-kategori" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="labelmodal" for="detail-harga" class="col-form-label">Harga
                                                :</label>
                                            <input class="inputdata" type="text" name="detail-harga"
                                                class="form-control" id="detail-harga" readonly>
                                        </div>
                                        <h4>Pembeli</h4>
                                        <div class="form-group">
                                            <label class="labelmodal" for="detail-nama" class="col-form-label">Nama
                                                :</label>
                                            <input class="inputdata" name="detail-nama" type="text" class="form-control"
                                                id="detail-nama" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="labelmodal" for="detail-nomorhp" class="col-form-label">No. Hp
                                                :</label>
                                            <input class="inputdata" name="detail-nomor" type="text"
                                                class="form-control" id="detail-nomorhp" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="labelmodal" for="detail-alamat"
                                                class="col-form-label">Alamat:</label>
                                            <textarea class="inputalamat" name="detail-alamat" class="form-control"
                                                id="detail-alamat" readonly></textarea>
                                        </div>
                                        <input type="hidden" name="detail-status" value="succes">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            onclick="kembaliKeModalPertama()">Kembali</button>
                                        <button name="simpan" type="submit" class="btn btn-yellow"
                                            onclick="lakukanPembayaran()">Lakukan
                                            Pembayaran</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

        </main>
        <footer>
            <h4>&copy; TickSer</h4>
        </footer>
        </div>
        <script>
        var selectedCategoryId;
        // Fungsi Modal
        function bukaModal(categoryId) {
            console.log('categoryId:', categoryId);
            selectedCategoryId = categoryId;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var categoryData = JSON.parse(xhr.responseText);

                    // Perbarui input tersembunyi
                    document.getElementById('category_id').value = categoryId;
                    document.getElementById('category_name').value = categoryData.categories;
                    document.getElementById('price').value = categoryData.price;
                    document.getElementById("myModal").style.display = "flex";
                }
            };
            xhr.open("GET", "get_kategori.php?" + categoryId, true);
            xhr.send();
        }

        function tutupModal() {
            document.getElementById("myModal").style.display = "none";
        }

        function tutupModal2() {
            document.getElementById("myModal2").style.display = "none";
        }

        function bukaModal2() {
            tutupModal(); // Tutup modal pertama
            document.getElementById("myModal2").style.display = "flex";

            var nama = document.getElementById("recipient-name").value;
            var nomorhp = document.getElementById("handphone").value;
            var alamat = document.getElementById("alamat-text").value;
            // kategori
            var kategori = document.getElementById("category_name").value;
            var harga = document.getElementById("price").value;

            document.getElementById("detail-nama").value = nama;
            document.getElementById("detail-nomorhp").value = nomorhp;
            document.getElementById("detail-alamat").value = alamat;
            document.getElementById("detail-kategori").value = kategori;
            document.getElementById("detail-harga").value = harga;

        }

        function kembaliKeModalPertama() {
            tutupModal2();
            bukaModal();
        }

        function lakukanPembayaran() {
            alert("Pembayaran berhasil!");
            tutupModal2();
            document.getElementById("recipient-name").value = "";
            document.getElementById("handphone").value = "";
            document.getElementById("alamat-text").value = "";
        }
        </script>
</body>

</html>