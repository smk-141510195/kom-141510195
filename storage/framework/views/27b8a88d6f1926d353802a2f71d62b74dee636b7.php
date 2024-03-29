<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Jabatan</div>
		<div class="panel-body">
		<center><a class="btn btn-primary" href="<?php echo e(url('pegawai/create')); ?>">Tambah Data</a></center><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr bgcolor="pink">
						<th>No</th>
						<th>NIP</th>
						<th>Email</th>
						<th>Jabatan ID</th>
						<th>Golongan ID</th>
						<th>Photo</th>
						<th colspan="3">Pilihan</th>
					</tr>
				</thead>

				<?php $no=1; ?>
				<?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawais): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tbody>
					<tr> 
						<td> <?php echo e($no++); ?> </td>
						<td> <?php echo e($pegawais->nip); ?> </td>
						<td> <?php echo e($pegawais->User->email); ?> </td>
						<td> <?php echo e($pegawais->Jabatan->kode_jabatan); ?> </td>
						<td> <?php echo e($pegawais->Golongan->kode_golongan); ?> </td>
						<td> <img src="assets/image/<?php echo e($pegawais->photo); ?>" width="50" height="50"></td>						
						<td>
							<a class="btn btn-xs btn-warning" href=" <?php echo e(route('pegawai.edit', $pegawais->id)); ?> ">Ubah</a>
						</td>
						<td>
							<form method="POST" action=" <?php echo e(route('golongan.destroy', $pegawais->id)); ?> ">
								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="_method" value="DELETE">
								<input class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
							</form>
						</td>
					</tr>
				</tbody>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>