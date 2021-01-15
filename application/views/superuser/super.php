<div class="content p-4">
        <h2 class="mb-4">Dashboard <?= $title; ?></h2>

        <div class="card mb-4">
            <div class="card-body">
                <!--  isi Dashboard -->
                <div class="row mb-4">
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-box-open"></i>
                 
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Total Asset</p>
                    <h3 class="font-weight-bold mb-0"><?= $totalAsset; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-hand-holding-usd"></i>
                 
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Asset Values</p>
                    <h3 class="font-weight-bold mb-0"><?= "Rp ". number_format($jumlahAsset['SUM(harga)'],0, ".", ".");?></h3>
                </div>
            </div>
        </div>
       
        
                <!-- akhir isi dashboard -->
            </div>
        </div>
    </div>
</div>

