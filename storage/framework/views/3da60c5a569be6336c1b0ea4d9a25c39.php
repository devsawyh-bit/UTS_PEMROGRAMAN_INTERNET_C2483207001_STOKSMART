


<?php $__env->startSection('title', 'Analisis Persediaan'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-4">
    <h2 class="fw-bold">Analisis Persediaan</h2>
    <p class="text-muted">Ringkasan kondisi stok dan rekomendasi pengadaan barang.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-1">Stok Aman</p>
                <h3 class="fw-bold text-success"><?php echo e($jumlahAman); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-1">Stok Menipis</p>
                <h3 class="fw-bold text-warning"><?php echo e($jumlahMenipis); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <p class="text-muted mb-1">Stok Habis</p>
                <h3 class="fw-bold text-danger"><?php echo e($jumlahHabis); ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Rekomendasi Pengadaan Barang</h5>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok Akhir</th>
                        <th>Target Stok</th>
                        <th>Jumlah Pengadaan</th>
                        <th>Prioritas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $rekomendasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($item['nama']); ?></td>
                        <td><?php echo e($item['stok_akhir']); ?></td>
                        <td><?php echo e($item['target_stok']); ?></td>
                        <td class="fw-bold"><?php echo e($item['jumlah_pengadaan']); ?> unit</td>
                        <td>
                            <?php if($item['prioritas'] == 'Tinggi'): ?>
                                <span class="badge bg-danger">Tinggi</span>
                            <?php elseif($item['prioritas'] == 'Sedang'): ?>
                                <span class="badge bg-warning text-dark">Sedang</span>
                            <?php else: ?>
                                <span class="badge bg-success">Rendah</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada barang yang perlu diadakan.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\StokSmart\resources\views/analisis/index.blade.php ENDPATH**/ ?>