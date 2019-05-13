<style type="text/css">
    .cover {
        background-image: url('../../../../ayomenanam/adminBSB/images/bgsertifikat.jpg');
        height: 843.28px;
        background-position: center;
        background-repeat: no-repeat;
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
$cek = $this->db->query('Select * from tbl_pengguna, tbl_adopsi where tbl_pengguna.id_pengguna=tbl_adopsi.id_pengguna AND tbl_pengguna.id_pengguna='.$id_pengguna.' GROUP BY tbl_pengguna.id_pengguna ');
echo debug($cek->result());
?>

<div class="cover" height="844px">
    
</div>


   
                                        <a href="<?php echo base_url();?>admin/adopsi" class="btn bg-orange m-t-15 waves-effect">Kembali </button></a>
                                        <button type="submit" name="printbutton" onclick="return print1('print2')" class="btn btn-primary m-t-15 waves-effect">Cetak</button>
							
