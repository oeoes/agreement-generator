<template>
    <div class="wadah p-3" id="content">
        <div class="judul" style="font-size: 13px; font-weight: bold;">KONTRAK PERJANJIAN MAGANG</div>
        <div class="no-surat mb-5">
            (Nomor :
            <span class="section">{{ magang.no_surat }}</span> )
        </div>Perjanjian Magang ini (untuk selanjutnya disebut “Perjanjian”) dibuat dan ditandatangani pada Hari
        <span class="section">{{ magang.day[new Date(magang.tgl_surat).getDay()] }}</span>, Tanggal <span
            class="section">{{ new Date(magang.tgl_surat).getDate() }}</span> (<span class="section">{{ magang.tgl_teks }}</span>) Bulan <span
            class="section">{{ magang.month[new Date(magang.tgl_surat).getMonth()] }}</span> Tahun <span
            class="section">{{ new Date(magang.tgl_surat).getFullYear() }}</span> (<span class="section">{{ magang.tahun_teks }}</span>), oleh dan
        antara:
        <ol>
            <li>
                PT Gravita Driatama Sentosa, suatu perusahaan yang didirikan dan tunduk pada hukum Negara
                Republik Indonesia dan beralamat kantor di OFFICE 7 Floor 18-A Jl. Jend. Sudirman Kav 52-53 (SCBD),
                Jakarta, Indonesia, 12190, yang dalam hal ini diwakili oleh
                <span class="section">{{ magang.pihak_pertama }}</span> selaku
                <span class="section">{{ magang.jab_pihak_pertama }}</span>
                dari PT Gravita Driatama Sentosa, oleh dan karenanya berdasarkan anggaran dasar PT Gravita
                Driatama Sentosa sah bertindak untuk dan atas nama PT Gravita Driatama Sentosa (untuk
                selanjutnya disebut sebagai “Pihak Pertama”).
            </li>
            <li>
                <span class="section">{{ magang.pihak_kedua }}</span>, seorang warga negara Republik Indonesia dengan
                Nomor KTP
                <span class="section">{{ magang.ktp }}</span>
                dan berkedudukan di
                <span class="section">{{ magang.alamat }}</span>
                (selanjutnya disebut sebagai ”Pihak Kedua”); dan
            </li>
        </ol>Pihak Pertama dan Pihak Kedua (untuk selanjutnya secara bersama-sama disebut “Para Pihak” dan secara
        sendiri-sendiri disebut “Pihak”) dengan ketentuan sebagaimana pasal-pasal tersebut di bawah ini :
        <div class="pasal">Pasal 1</div>
        <div class="sub-pasal">Jabatan dan Penugasan</div>

        <ol>
            <li>
                Perusahaan dengan ini menunjuk dan menugaskan Pihak Kedua di PT. Gravita Driatama Sentosa
                sebagai web developer
            </li>
            <li>
                Apabila dibutuhkan, Pihak Kedua dapat ditugaskan, baik sementara maupun tetap, di bagian lain
                dalam lingkungan perusahaan
            </li>
            <li>
                Dalam melaksanakan tugas, Pihak Kedua bertanggung jawab kepada <span class="section">{{ magang.wakil_pihak_pertama }}</span> sebagai <span class="section">{{ magang.jab_wakil_pihak_pertama }}</span>.
            </li>
        </ol>

        <div class="pasal">Pasal 2</div>
        <div class="sub-pasal">Kompensasi & Sistem Pembayaran</div>

        <ol>
            <li>
                Atas penugasan yang diberikan kepada Pihak Kedua, Pihak Pertama akan memberikan kompensasi
                berupa;
                <br />upah: Rp
                <span class="section">{{ magang.nominal }}</span>,- per bulan
            </li>
            <li>
                Kompensasi Pihak Kedua sebagaimana dimaksud dalam Pasal ini akan dibayarkan pada tanggal 25
                setiap bulannya dimulai untuk pembayaran pertama pada bulan <span class="section">{{ dateReadable(magang.mulai_bayar, true) }}</span> ke rekening
                sebagai berikut:
                <br />Nama Bank:
                <span class="section">{{ magang.bank }}</span>
                <br />Atas Nama:
                <span class="section">{{ magang.nasabah }}</span>
                <br />No. Rekening:
                <span class="section">{{ magang.norek }}</span>
                <br />
            </li>
            <li>
                Kompensasi karyawan adalah bersifat pribadi dan rahasia antara Pihak Kedua dan Pihak Pertrama.
                Apabila terjadi kebocoran informasi baik sengaja/tidak sengaja yang dilakukan oleh Pihak Kedua,
                maka Pihak Pertama berhak untuk memberikan sanksi
            </li>
        </ol>

        <div class="pasal">Pasal 3</div>
        <div class="sub-pasal">Jangka Waktu Perjanjian</div>

        <ol>
            <li>
                Perjanjian ini terhitung mulai tanggal <span class="section">{{ dateReadable(magang.tgl_mulai) }}</span>
                dan berakhir demi hukum pada tanggal <span class="section">{{ dateReadable(magang.tgl_selesai) }}</span>
                tanpa ada kewajiban dari Pihak Pertama untuk mengganti kerugian dalam bentuk
                apapun.
            </li>
            <li>
                Jika Pihak Pertama masih memerlukan jasa dari Pihak Kedua & disetujui oleh Pihak Kedua, maka
                Perjanjian ini akan diperpanjang sesuai dengan kebutuhan; dan akan diatur dalam lembar
                tambahan dari Perjanjian ini yang kekuatan hukumnya sama pengan Perjanjian ini
            </li>
            <li>
                Apabila ada perpanjangan kontrak dan atau penambahan pekerjaan, perjanjian ini hanya perlu
                dilakukan adendum
            </li>
        </ol>

        <div class="pasal">Pasal 4</div>
        <div class="sub-pasal">Tugas dan Kewajiban</div>

        <ol>
            <li>Menjaga nama baik dan reputasi Pihak Pertama</li>
            <li>
                Melakukan kewajiban dan fungsinya serta menjalankan tugas yang diberikan dan dipercayakan oleh
                Perusahaan kepada Pihak Kedua secara konsisten
            </li>
            <li>
                Memberikan informasi yang dibutuhkan kepada Perusahaan dan selalu mengimplementasikan serta
                menjalankan kewajiban Perusahaan yang diterapkan oleh Perusahaan
            </li>
            <li>
                Mematuhi hüküm dan peraturan yang berlaku di Indonesia, Peraturan Perusahaan dan kebijakan
                Perusahaan yang telah diterapkan.
            </li>
        </ol>

        <div class="pasal">Pasal 5</div>
        <div class="sub-pasal">Kerahasiaan dan hak atas kekayaan intelektual</div>

        <ol>
            <li>Pihak Kedua wajib untuk tidak menyebarkan seluruh informasi internal perusahaan</li>
            <li>
                Pihak Kedua dilarang untuk menggunakan nama, logo dan lambang perusahaan untuk kepentingan
                pribadi dan atau kepentingan lain diluar perusahaan tanpa seijin tertulis perusahaan
            </li>
        </ol>

        <div class="pasal">Pasal 6</div>
        <div class="sub-pasal">Pernyataan dan Jaminan</div>Masing-masing Pihak, satu dengan yang lain maupun secara
        bersama-sama, dengan ini menyatakan dan
        menjamin bahwa:
        <ol>
            <li>
                Masing-masing Pihak telah membaca dan mengerti isi Perjanjian ini, dan masing-masing Pihak tidak
                mempunyai keberatan terhadap segala ketentuan yang diatur dalam Perjanjian ini termasuk setiap
                hak dan kewajiban masing-masing Pihak berdasarkan Perjanjian ini, serta akan melaksanakan setiap
                ketentuan yang diatur dalam Perjanjian ini dengan penuh itikad baik.
            </li>
            <li>
                Masing-masing Pihak dalam Perjanjian ini mempunyai kewenangan untuk menandatangani
                Perjanjian ini dan mengikat masing-masing Pihak dalam Perjanjian ini, karenanya tidak ada alasan
                bahwa Perjanjian ini tidak dapat dilaksanakan karena ketidakcakapan atau karena belum
                dipenuhinya suatu persyaratan tertentu untuk dapat menandatangani Perjanjian ini.
            </li>
            <li>
                Masing-masing Pihak memiliki kewenangan untuk membuat Perjanjian ini, dan kewajiban-kewajiban
                dalam Perjanjian ini mengikat Para Pihak secara hukum dan syarat-syarat dan ketentuan-ketentuan
                dari Perjanjian ini tidak akan menyebabkan pelanggaran terhadap perjanjian lain (cross default),
                kewajiban atau komitmen apapun dimana masing-masing Pihak dan/atau anak perusahaannya
                terikat.
            </li>
            <li>
                Dengan ditandatangani dan dilaksanakannya Perjanjian ini, masing-masing Pihak tidak melanggar
                atau tidak membuat masing-masing Pihak dalam suatu keadaan pelanggaran berdasarkan
                perjanjian dengan pihak lain dimana masing-masing Pihak terikat di dalamnya.
            </li>
            <li>Perjanjian ini sepenuhnya mengikat dan dapat dilaksanakan oleh Para Pihak.</li>
        </ol>

        <div class="pasal">Pasal 7</div>
        <div class="sub-pasal">Penyelesaian Perselisihan</div>

        <ol>
            <li>
                Perjanjian ini, penafsiran dan pelaksanaan serta segala akibat yang ditimbulkannya, diatur dan
                tunduk kepada ketentuan Hukum Indonesia.
            </li>
            <li>
                Para Pihak sepakat, jika terjadi Perselisihan yang timbul sehubungan dengan Perjanjian ini, termasuk
                namun tak terbatas pada hal-hal yang berkaitan dengan keberadaan, keberlakuan, dan
                pelaksanaan hak atau kewajiban Para Pihak, maka Para Pihak akan mengusahakan, dalam jangka
                waktu 5 (lima) hari kalender Indonesia sejak diterimanya pemberitahuan dari salah satu Pihak
                lainnya atas terjadinya Perselisihan tersebut, menyelesaikan terlebih dahulu dengan cara
                musyawarah diantara Para Pihak.
            </li>
            <li>
                Dalam hal perselisihan yang timbul tidak dapat diselesaikan secara musyawarah atau musyawarah
                tidak dapat dilaksanakan dalam jangka waktu 5 (lima) hari kalender Indonesia sejak diterimanya
                pemberitahuan sebagaimana dimaksud dalam ayat 2 (dua) Pasal ini, Para Pihak sepakat untuk
                menyelesaikan perselisihan tersebut melalui Pengadilan Negeri Jakarta Pusat di Jakarta.
            </li>
        </ol>

        <div class="pasal">Pasal 8</div>
        <div class="sub-pasal">Ketentuan-Ketentuan Lain</div>

        <ol>
            <li>
                Perjanjian ini dan segala hak dan kewajiban yang melekat dengan atau timbul dari Perjanjian ini
                tidak dapat dialihkan kepada pihak manapun tanpa persetujuan tertulis dari Para Pihak.
            </li>
            <li>
                Segela kekayaan intelektual yang dimiliki oleh masing-masing Pihak yang digunakan dalam rangka
                pelaksanaan Perjanjian ini akan tetap menjadi milik dari masing-masing Pihak.
            </li>
            <li>
                Hal-hal yang belum cukup atau belum diatur Perjanjian ini maupun setiap perubahan terhadap
                ketentuan yang diatur dalam Perjanjian ini termasuk lampiran Perjanjian, akan diatur dalam suatu
                adendum yang dibuat secara tersendiri dan ditandatangani oleh Para Pihak serta merupakan bagian
                yang tidak terpisahkan dari Perjanjian ini.
            </li>
            <li>
                Dalam hal terdapat satu atau lebih dari ketentuan Perjanjian ini yang menjadi tidak sah, batal atau
                tidak dapat dilaksanakan, ketentuan lainnya dalam Perjanjian ini tetap berlaku dan dalam hal
                demikian Para Pihak sepakat untuk menggantikan ketentuan yang tidak sah, batal atau tidak dapat
                dilaksanakan tersebut dengan ketentuan lain dengan suatu adendum.
            </li>
            <li>
                Perjanjian ini dapat ditandatangani dalam beberapa salinan (counterparts) oleh masing-masing
                Pihak dan apabila masing-masing salinan tersebut disatukan akan menjadi satu kesatuan dan
                instrumen yang utuh.
            </li>
        </ol>Demikian Perjanjian ini dibuat dalam rangkap dua (2), masing-masing memiliki kekuatan yang sama, di atas
        kertas bermaterai cukup dan ditandatangani oleh pejabat yang berwenang untuk mewakili Para Pihak, pada
        hari dan tanggal sebagaimana yang telah disebutkan pada awal Perjanjian.
        <div class="row mt-3">
            <div class="col-md-5">
                PT. Gravita Dritama Sentosa,
                <div class="pihak mt-4">
                    <span class="section">{{ magang.wakil_pihak_pertama }}</span>
                </div>
                <span class="section">{{ magang.jab_wakil_pihak_pertama }}</span>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                Menyetujui
                <div class="pihak mt-4">
                    <span class="section">{{ magang.pihak_kedua }}</span>
                </div>Karyawan Magang
            </div>
        </div>

        <hr />
        <div id="editor"></div>
        <div style="position: absolute; top: 15px; left: 10px" @click="download" class="btn btn-primary float-right pr-5 pl-5 rad" id="download">Download</div>
    </div>
</template>

<script>
    import jsPDF from "jspdf"
    import axios from 'axios'

    export default {
        props: ["magang"],
        methods: {
            download() {
                $('#download').html('Downloading...')
                axios({
                    method: 'post',
                    url: 'api/download',
                    responseType: 'arraybuffer',
                    data: {
                        no_surat: this.magang.no_surat,
                        pihak_pertama: this.magang.pihak_pertama,
                        jab_pihak_pertama: this.magang.jab_pihak_pertama,
                        pihak_kedua: this.magang.pihak_kedua,
                        ktp: this.magang.ktp,
                        alamat: this.magang.alamat,
                        nominal: this.magang.nominal,
                        mulai_bayar: this.dateReadable(this.magang.mulai_bayar, true),
                        bank: this.magang.bank,
                        nasabah: this.magang.nasabah,
                        norek: this.magang.norek,
                        wakil_pihak_pertama: this.magang.wakil_pihak_pertama,
                        jab_wakil_pihak_pertama: this.magang.jab_wakil_pihak_pertama,
                        tgl_mulai: this.dateReadable(this.magang.tgl_mulai),
                        tgl_selesai: this.dateReadable(this.magang.tgl_selesai),
                        hari: this.dateModular(this.magang.tgl_surat, 'h'),
                        tgl: this.dateModular(this.magang.tgl_surat, 'tl'),
                        tgl_teks: this.magang.tgl_teks,
                        tahun_teks: this.magang.tahun_teks,
                        bulan: this.dateModular(this.magang.tgl_surat, 'bl'),
                        tahun: this.dateModular(this.magang.tgl_surat),
                        header_footer: this.magang.header_footer

                    }
                }).then(response => {
                    let blob = new Blob([response.data], {
                        type: 'application/pdf'
                    })
                    let link = document.createElement('a')
                    link.href = window.URL.createObjectURL(blob)
                    link.download = 'kontrak.pdf'
                    document.body.appendChild(link)
                    link.click()
                               
                }).catch(error => {
                    alert(error.message);
                })
                .finally(response => {
                    $('#download').html('Donwload')
                })
            },
            dateReadable(tgl, removedate = false) {
                let month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ]
                let dt = new Date(tgl)
                if(removedate){
                    return month[dt.getMonth()] + " " + dt.getFullYear()
                }                    
                else{
                    return dt.getDate() + " " + month[dt.getMonth()] + " " + dt.getFullYear()
                }
                    
            },

            dateModular(tgl, type = null) {
                let day = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu']
                let month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ]

                let dt = new Date(tgl);
                if (type == 'h') {
                    return day[dt.getDay()]
                } else if (type == 'tl') {
                    return dt.getDate()
                } else if (type == 'bl') {
                    return month[dt.getMonth()]
                } else {
                    return dt.getFullYear()
                }
            }
        }
    };

</script>

<style>
    @charset "UTF-8";

    .page-break {
        page-break-after: always;
        page-break-inside: avoid;
        clear: both;
    }

    .page-break-before {
        page-break-before: always;
        page-break-inside: avoid;
        clear: both;
    }

    .wadah {
        font-size: 80%;
        text-align: justify;
        height: 500px;
        overflow-y: scroll
    }

    .pasal {
        text-align: center;
        font-weight: bold;
    }

    .sub-pasal {
        text-align: center;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .pihak {
        font-weight: bold;
        text-decoration: underline;
    }

    .judul {
        font-size: 13px;
        font-weight: bold;
        text-align: center;
    }

    .no-surat {
        font-size: 12px;
        font-weight: bold;
        text-align: center;
    }

    li {
        padding-left: 25px;
        margin-bottom: 10px;
    }

    ol {
        margin-bottom: 25px;
    }

    .section {
        background: yellow;
        padding: 0 2px;
    }

    .rad {
        border-radius: 35px;
        cursor: pointer;
    }

    input {
        border-radius: 35px !important;
    }

</style>
