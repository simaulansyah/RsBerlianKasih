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
                        <i class="fa fa-3x fa-fw fa-bed"></i>
                  
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Tempat Tidur Tersedia</p>
                    <h3 class="font-weight-bold mb-0"><?= $statusKasurKosong ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-procedures"></i>
                 
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">UGD Tersedia</p>
                    <h3 class="font-weight-bold mb-0">2</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-shopping-cart"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Sales</p>
                    <h3 class="font-weight-bold mb-0">73,829</h3>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="d-flex border">
                <div class="bg-info text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-users"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Total Pasien</p>
                    <h3 class="font-weight-bold mb-0">1,683</h3>
                </div>
            </div>
        </div>
    </div>


 <!-- akhir isi dashboard -->
            </div>
        </div>
    </div>
</div>
