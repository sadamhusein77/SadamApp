<div class="app-content content">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>
  <?php if ($this->session->flashdata('msg')) : ?>
    <?php $this->session->flashdata('msg');  ?>
  <?php endif; ?>
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Produk</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url().'admin/index' ?>">Home</a>
              </li>
              <li class="breadcrumb-item active"><?= $url ?>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- Zero configuration table -->
      <section>
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><?php echo $judul ?></h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                  <a class="btn btn-primary btn-sm text-white" href="<?php echo base_url().'admin/index' ?>"><i class="la la-arrow-left"> Back </i> </a>
                  <p class="card-text"></p>

                  <?php echo form_open('admin/produk_aksi'); ?>
                  <div class="form-body">
                    <h4 class="form-section">
                      <i class="la la-slack"></i> Produk Details</h4>
                      <div class="form-group">
                        <label for="input_nama">Nama Produk</label>
                        <input class="form-control border-primary" type="text" placeholder="Input Nama Produk" id="input_nama" name="nama_produk" value="<?php echo set_value('nama_produk'); ?>" required>
                        <?= form_error('nama_produk','<small class="text-danger pl-3">', '</small>'); ?>
                      </div>

                      <div class="form-group">
                        <label for="input_keterangan">Keterangan</label>
                        <textarea class="form-control border-primary"id="input_keterangan" name="keterangan" rows="8" cols="80" value="<?php echo set_value('keterangan'); ?>" placeholder="Input Keterangan" required><?php echo set_value('keterangan'); ?></textarea>
                        <?= form_error('keterangan','<small class="text-danger pl-3">', '</small>'); ?>
                      </div>

                      <div class="form-group">
                        <label for="input_harga">Harga</label>
                        <input class="form-control border-primary" type="text" placeholder="Input Harga Satuan" id="input_keterangan" name="harga" value="<?php echo set_value('harga'); ?>" required>
                        <?= form_error('harga','<small class="text-danger pl-3">', '</small>'); ?>
                      </div>

                      <div class="form-group">
                        <label for="input_jumlah">Jumlah</label>
                        <input class="form-control border-primary" type="text" placeholder="Input Jumlah Harga" id="input_keterangan" name="jumlah" value="<?php echo set_value('jumlah'); ?>" required>
                        <?= form_error('jumlah','<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>

                    <div class="form-actions right">
                      <button type="reset" class="btn btn-danger mr-1">
                        <i class="ft-x"></i> Reset
                      </button>
                      <button type="submit" name="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                      </button>
                    </div>
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ Zero configuration table -->


      </div>
    </div>
  </div>
