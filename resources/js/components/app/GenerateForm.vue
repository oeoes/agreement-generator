<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-3 border-0 shadow-sm">
                    <div class="h3 text-center">Kontrak Magang Form</div>
                    <hr />

                    <fieldset>
                        <legend>Surat <span id="surat"><img src="../images/arrow.svg"></span> </legend>
                        <div class="card border-0">
                            <div class="form-group">
                                <label>Nomor Surat</label>
                                <input v-model="magang.no_surat" type="text" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label>Tanggal</label>
                                <input v-model="magang.tgl_surat" type="date" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label>Tanggal (dalam teks)</label>
                                <input v-model="magang.tgl_teks" type="text" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label>Tahun (dalam teks)</label>
                                <input v-model="magang.tahun_teks" type="text" class="form-control" />
                            </div>
                        </div>
                    </fieldset>

                    <hr>

                    <fieldset>
                        <legend>Pihak pertama <span id="ph_1"><img src="../images/arrow.svg"></span></legend>

                        <div class="card border-0">
                          <div class="form-group">
                              <label>Nama</label>
                              <input v-model="magang.pihak_pertama" type="text" class="form-control" />
                          </div>

                          <div class="form-group">
                              <label>Jabatan</label>
                              <input v-model="magang.jab_pihak_pertama" type="text" class="form-control" />
                          </div>
                        </div>
                    </fieldset>

                    <hr>

                    <fieldset>
                        <legend>Wakil pihak pertama <span id="wph_1"><img src="../images/arrow.svg"></span>
                        </legend>

                        <div class="card border-0">
                          <div class="form-group">
                              <label>Nama</label>
                              <input v-model="magang.wakil_pihak_pertama" type="text" class="form-control" />
                          </div>

                          <div class="form-group">
                              <label>Jabatan</label>
                              <input v-model="magang.jab_wakil_pihak_pertama" type="text" class="form-control" />
                          </div>
                        </div>
                    </fieldset>

                    <hr>

                    <fieldset>
                        <legend>Pihak kedua <span id="ph_2"><img src="../images/arrow.svg"></span></legend>

                        <div class="card border-0">
                          <div class="form-group">
                              <label>Nama</label>
                              <input v-model="magang.pihak_kedua" type="text" class="form-control" />
                          </div>

                          <div class="form-group">
                              <label>No KTP</label>
                              <input v-model="magang.ktp" type="text" class="form-control" />
                          </div>

                          <div class="form-group">
                              <label>Alamat lengkap</label>
                              <input v-model="magang.alamat" type="text" class="form-control" />
                              <small style="color: gray">
                                  contoh: Kp Citangkil RT 001/001 Kel Tangkilsari Kec Cimanggu Kab
                                  Pandeglang Banten
                              </small>
                          </div>

                          <div class="form-group">
                              <label>Tanggal mulai</label>
                              <input v-model="magang.tgl_mulai" type="date" class="form-control" />
                          </div>

                          <div class="form-group">
                              <label>Tanggal selesai</label>
                              <input v-model="magang.tgl_selesai" type="date" class="form-control" />
                          </div>
                        </div>
                    </fieldset>

                    <hr>

                    <fieldset>
                        <legend>Kompensasi <span id="kompensasi"><img src="../images/arrow.svg"></span>
                        </legend>

                        <div class="card border-0">
                          <div class="form-group">
                              <label>Nominal (per bulan)</label>
                              <input v-model="magang.nominal" type="text" class="form-control" />
                          </div>

                          <div class="form-group">
                              <label>Mulai Pembayaran</label>
                              <input v-model="magang.mulai_bayar" type="date" class="form-control" />
                          </div>

                          <div class="form-group">
                              <label>Bank</label>
                              <input v-model="magang.bank" type="text" class="form-control" />
                          </div>

                          <div class="form-group">
                              <label>Atas nama</label>
                              <input v-model="magang.nasabah" type="text" class="form-control" />
                          </div>

                          <div class="form-group">
                              <label>No. Rek</label>
                              <input v-model="magang.norek" type="text" class="form-control" />
                          </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Page Configuration <span id="page"><img src="../images/arrow.svg"></span>
                        </legend>

                        <div class="card border-0">
                            <div class="form-group">
                                <input v-model="magang.header_footer" type="checkbox" /> <label>Header dan
                                    footer</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <!-- Preview -->
            <div style="position: fixed; top: 20px; right: 20px; width: 40%" class="card p-3 border-0 shadow-sm">
                <div class="h3 text-center">Preview</div>
                <hr />
                <preview :magang="magang"></preview>
            </div>
        </div>
    </div>
</template>

<script>
    import Preview from "./Preview";
    export default {
        data() {
            // let date = new Date(this.tgl_surat)
            return {
                magang: {
                    header_footer: false,
                    no_surat: "",
                    tgl_surat: "",
                    tgl_teks: "",
                    tahun_teks: "",
                    pihak_pertama: "",
                    jab_pihak_pertama: "",
                    wakil_pihak_pertama: "",
                    jab_wakil_pihak_pertama: "",
                    pihak_kedua: "",
                    ktp: "",
                    alamat: "",
                    tgl_mulai: "",
                    tgl_selesai: "",
                    nominal: "",
                    mulai_bayar: "",
                    bank: "",
                    nasabah: "",
                    norek: "",
                    day: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"],
                    month: [
                        "Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember"
                    ]
                }
            };
        },
        components: {
            preview: Preview
        }
    };

</script>

<style>
  fieldset{
    position: relative;
  }
  fieldset span{
    position: absolute;
    right: 10px;
    top: -3px;
    z-index: 100;
    cursor: pointer;
  }
  fieldset span img{
    width: 25px;
    height: 25px;
  }
  .rotate{
    transform: rotate(180deg);
    transition: .3s ease
  }
</style>
