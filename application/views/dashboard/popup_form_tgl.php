<form  action="<?php echo base_url('Dashboard/simpan_tanggal');?>" method="POST">

                                              <input type="hidden" name="id" value="<?php echo $id?>">
                                              <input type="hidden" name="jenis_pihak" value="<?php echo $jenis_pihak?>">
                                              
                                              <div class="form-group row">
                                                <label for="username" class="col-sm-4 col-form-label">Tanggal Permohonan</label>
                                                <div class="col-sm-8">
                                                  <input type="date" class="form-control" name="tanggal" required="">
                                              </div>
                                          </div>

                                          <input type="hidden" name="aksi" value="tanggal_permohonan">
                                          <div class="form-group row">
                                            <label for="submit" class="col-sm-4 col-form-label"> </label>
                                            <div class="col-sm-8">
                                              <button class="btn btn-primary" type="submit">Simpan</button>
                                          </div>
                                      </div>
                                  </form>