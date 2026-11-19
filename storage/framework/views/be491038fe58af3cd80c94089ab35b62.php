


<?php $__env->startSection('title', 'Data Barang'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Data Persediaan Barang</h2>
        <p class="text-muted mb-0">Daftar seluruh barang yang tersedia dalam persediaan.</p>
    </div>
    <span class="badge bg-primary fs-6"><?php echo e(count($barang)); ?> Barang</span>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok Awal</th>
                        <th>Barang Masuk</th>
                        <th>Barang Keluar</th>
                        <th>Stok Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td class="fw-semibold"><?php echo e($item['nama']); ?></td>
                        <td><?php echo e($item['kategori']); ?></td>
                        <td><?php echo e($item['stok_awal']); ?></td>
                        <td><?php echo e($item['barang_masuk']); ?></td>
                        <td><?php echo e($item['barang_keluar']); ?></td>
                        <td><?php echo e($item['stok_akhir']); ?></td>
                        <td>
                            
<?php if(!$item['valid']): ?>
    <span class="badge bg-dark">Data Tidak Valid</span>
<?php elseif($item['status'] == 'Aman'): ?>
    <span class="badge bg-success">Aman</span>
<?php elseif($item['status'] == 'Menipis'): ?>
    <span class="badge bg-warning text-dark">Menipis</span>
<?php else: ?>
    <span class="badge bg-danger">Habis</span>
<?php endif; ?>

                        </td>
                        <td>
                            <a href="<?php echo e(route('barang.detail', $item['id'])); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\StokSmart\resources\views/barang/index.blade.php ENDPATH**/ ?>