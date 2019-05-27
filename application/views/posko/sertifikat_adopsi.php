<style type="text/css">
    .bg-certificate {
        width: 100%;
        background-image: url('../../../../../ayomenanam/adminBSB/images/bgsertifikat.jpg') !important;
        margin:auto !important;
        text-align: center;
    }

    .print-area {
        height:100%;
        width: 100%;
        text-align: center;
    }

    .nama {
        position: absolute;
        top: 370px;
        font-size: 40px;
        color: #3a3a3a;
        width: 94.7%;
    }

    .no-sertifikat {
        position: absolute;
        text-align: right;
        top: 31px;
        right: 60px;
        font-size: 17px;
        color: #fff;
    }

    .nama-pohon {
        position: absolute;
        vertical-align: middle;
        top: 577px;
        color: #3a3a3a;
        text-align: center;
        width: 94.7%;
        font-weight: bold;
        font-size: 17px;
        left: 80px;
    }

    .nama-jenis-pohon {
        position: absolute;
        vertical-align: middle;
        top: 608px;
        color: #3a3a3a;
        text-align: center;
        width: 94.7%;
        font-weight: bold;
        font-size: 17px;
        left: 75px;
    }

    .judul-event {
        position: absolute;
        vertical-align: middle;
        top: 700px;
        color: #1e7d4e;
        text-align: center;
        width: 94.7%;
        font-weight: bold;
        font-size: 25px;
    }

    .judul-event span {
        width: 45%;
        display: inline-block;
    }

    .tanggal-event {
        font-size: 14px;
        color: #3a3a3a;
        position: relative;
        top: 10px;
    }

    .lokasi-event {
        font-size: 14px;
        color: #313131;
        position: relative;
    }

    .logo-area {
        position: absolute;
        bottom: 162px;
        left: 210px;
        color: #2d2d2d;
        font-size: 12px;
    }

    .logo-area img {
        width: 100px !important;
    }

    @media print {
        @page {
            /*margin: -50px 0px -50px 0px !important;*/
            padding:0px !important;
            page-break-inside: avoid;
        }
        #main-modal {
            padding-right: 0px !important;
        }
        body{
            visibility: hidden;
            transform: scale(1);
            height:100%;
            margin-top:-80px !important;
        }

        .print-area, .print-area * {
            visibility: visible;
            background: red;
            page-break-inside: avoid !important;
            text-align: center;
        }

        .bg-certificate {
            width: 96%;
            background-image: url('../../../../../ayomenanam/adminBSB/images/bgsertifikat.jpg') !important;
            background-size: cover;
            margin-left: auto;
            text-align: center
        }


        .nama {
            position: absolute;
            top: 430px;
            font-size: 45px;
            color: #3a3a3a;
            width: 94.7%;
        }

        .no-sertifikat {
            position: absolute;
            text-align: right;
            top: 36px;
            right: 75px;
            font-size: 17px;
            color: #fff !important;
        }

        .nama-pohon {
            position: absolute !important;
            top: 665px !important;
            color: #3a3a3a !important;
            text-align: center;
            width: 94.7%;
            font-weight: bold;
            font-size: 17px;
            left: 90px !important;
        }

        .nama-jenis-pohon {
            position: absolute !important;
            top: 705px !important;
            color: #3a3a3a !important;
            text-align: center;
            width: 94.7%;
            font-weight: bold;
            font-size: 17px;
            left: 85px;
        }

        .judul-event {
            position: absolute;
            vertical-align: middle;
            top: 800px !important;
            color: #1e7d4e !important;
            text-align: center;
            width: 94.7%;
            font-weight: bold;
            font-size: 25px;
        }

        .judul-event span {
            width: 45%;
            display: inline-block;
        }

        .tanggal-event {
            font-size: 15px;
            color: #3a3a3a;
            position: relative;
            top: 10px;
        }

        .lokasi-event {
            font-size: 14px;
            color: #313131;
            position: relative;
        }

        .logo-area {
            position: absolute;
            bottom: 162px;
            left: 210px;
            color: #2d2d2d;
            font-size: 12px;
        }

        .logo-area img {
            width: 100px !important;
        }
    }
</style>

<script type="text/javascript">

function print1(strid)
{
if(confirm("Do you want to print?")) {
    var values = document.getElementById(strid);
    var printing =
    window.open('','','left=0,top=0,width=900,height=650,toolbar=0,scrollbars=0,sta­?tus=0');
    printing.document.write(values.innerHTML);
    printing.document.close();
    printing.focus();
    printing.print();
    printing.close();
}
}
</script>

<?php 

// id_event/id_adopsi/tgl_event/id_pengguna

$sql = "
    SELECT
        e.foto,
        a.nama,
        b.nama_pohon,
        d.nama_jenis_pohon,
        c.judul_event,
        c.tanggal_event,
        c.waktu_event,
        c.tempat_event,
        CONCAT(c.id_event,'/',b.id_adopsi,'/',DATE_FORMAT(c.tanggal_event, '%d%m%Y'),'/',a.id_pengguna) as no_sertifikat
    FROM 
        tbl_pengguna a 
    JOIN 
        tbl_adopsi b ON b.id_pengguna = a.id_pengguna
    JOIN 
        tbl_event c ON c.id_event = b.id_event
    JOIN 
        jenis_pohon d On d.id_jenis_pohon = d.id_jenis_pohon
    JOIN 
        tbl_pengguna e ON e.id_pengguna = c.id_pengguna
    WHERE 
        a.id_pengguna = $id_pengguna
";

$data = $this->db->query($sql)->row_array();
?>

<div class="print-area">
    <!-- <div class="bg-certificate"></div> -->
    <img class="bg-certificate" src="<?= base_url('adminBSB/images/bgsertifikat.jpg') ?>">
    <div class="no-sertifikat">
        <?= $data['no_sertifikat'] ?>
    </div>
    <div class="nama">
        <?= $data['nama'] ?>
    </div>
    <span class="nama-pohon">
        <?= $data['nama_pohon'] ?>
    </span>
    <div class="nama-jenis-pohon">
        <?= $data['nama_jenis_pohon'] ?>
    </div>
    <div class="judul-event">
        <?= $data['judul_event'] ?>
        <p class="tanggal-event"><?= parse_time($data['tanggal_event'], 'l, d F Y') ?></p>
        <p class="lokasi-event">Berlokasi di <?= $data['tempat_event'] ?></p>
    </div>
    <figure class="logo-area">
	<?php 
	$komunitas = $this->db->query("Select * from tbl_adopsi, tbl_event, tbl_pengguna where tbl_adopsi.id_adopsi='$id_adopsi'
	AND tbl_adopsi.id_event=tbl_event.id_event AND tbl_event.id_pengguna=tbl_pengguna.id_pengguna");
    foreach ($komunitas->result() as $row ) {
	?>
        <img class="logo" src="<?= base_url('adminBSB/images/'.$row->foto) ?>" alt="Komunitas">
        <figcaption><?= $row->nama ?></figcaption>
    </figure>
	<?php } ?>
</div>

   
<a href="<?php echo base_url();?>posko/adopsi" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
<a href="<?php echo base_url();?>posko/download_sertifikat/<?php echo $id_adopsi; ?>" class="btn btn-primary m-t-15 waves-effect">Download</button></a>
							
