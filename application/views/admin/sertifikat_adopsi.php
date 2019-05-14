<style type="text/css">
    .bg-certificate {
        width: 100%;
        background-image: url('../../../../../ayomenanam/adminBSB/images/bgsertifikat.jpg') !important;
        height:800px;
    }

    .print-area {
        height:100%;
        width: 100%;
        background:red;
        border: 2px solid red;
    }

    @media print {
        @page {
            margin: 0px 0px 0px 0px !important;
            padding:0px !important;
            page-break-inside: avoid;
        }
        #main-modal {
            padding-right: 0px !important;
        }
        body{
            visibility: hidden;
            transform: scale(1.165);
        }

        .print-area, .print-area * {
            visibility: visible;
            background: red;
        }

        .bg-certificate {
            width: 100;
            background-image: url('../../../../../ayomenanam/adminBSB/images/bgsertifikat.jpg') !importantZ;
            background-size: cover !important;
            height:1800px;
        }

        /*-webkit-transform: rotate(-90deg) scale(.68,.68); 
        -moz-transform:rotate(-90deg) scale(.58,.58);*/


        /* use width if in portrait (use the smaller size to try 
           and prevent image from overflowing page... */
        /*img { height: 100%; width:100%; margin: 0; padding: 0; }*/
    }
</style>

<script type="text/javascript">

function print1(strid)
{
if(confirm("Do you want to print?")) {
    var values = document.getElementById(strid);
    var printing =
    // window.open('','','left=0,top=0,width=900,height=650,toolbar=0,scrollbars=0,sta­?tus=0');
    printing.document.write(values.innerHTML);
    printing.document.close();
    printing.focus();
    printing.print();
    printing.close();
}
}
</script>

<?php  
$cek = $this->db->query('Select * from tbl_pengguna, tbl_adopsi where tbl_pengguna.id_pengguna=tbl_adopsi.id_pengguna AND tbl_pengguna.id_pengguna='.$id_pengguna.' GROUP BY tbl_pengguna.id_pengguna ');
// echo debug($cek->row_array());
?>

<div class="print-area">
    <div class="bg-certificate"></div>
    <!-- <img class="bg-certificate" src="<?= base_url('../../../ayomenanam/adminBSB/images/bgsertifikat.jpg') ?>"> -->
    <!-- <div class="nama">
        <span>Yesika Trestiarso</span>
    </div> -->
</div>

   
<a href="<?php echo base_url();?>admin/adopsi" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
<button type="submit" name="printbutton" onclick="return print1('print2')" class="btn btn-primary m-t-15 waves-effect">Cetak</button>
							
