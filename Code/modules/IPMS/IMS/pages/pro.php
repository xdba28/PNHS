<?php
{

    include("../db/dbcon.php");
    include("../session.php");
  $id=$_GET['po'];
    $sql="SELECT ims_storage.stor_id,ims_storage.emp_no,ims_storage.stor_qty FROM pms_ris, pms_ris_req, pms_iar, pms_pr, pms_pr_con, pms_iar_con,pms_po_con,pms_po, pims_personnel, pms_supplier, ims_storage WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND ims_storage.emp_no=pims_personnel.emp_No AND pms_iar_con.iar_id=ims_storage.iar_id AND pms_po.po_no='$id'
  ";
      $res=mysqli_query($mysqli,$sql);
      while($row=mysqli_fetch_array($res))
      {
        $sid=$row['stor_id'];
        $names=$row['emp_no'];
        $qty=$row['stor_qty'];
        $date=date('Y-m-d');
  
  $sql="UPDATE pms_ris, pms_ris_req, pms_iar, pms_pr, pms_pr_con, pms_iar_con,pms_po_con,pms_po, pims_personnel, pms_supplier, ims_storage SET ims_storage.ins='1', ims_storage.stor_qty='0' WHERE pms_ris.ris_no=pms_ris_req.ris_no AND pms_ris_req.req_item_id=pms_pr_con.req_item_id AND pms_pr.pr_no=pms_pr_con.pr_no AND pms_supplier.company_id=pms_po.company_id AND pms_po.po_no=pms_po_con.po_no AND pms_po_con.pr_id=pms_pr_con.pr_id AND pms_iar.iar_no=pms_iar_con.iar_no AND pms_iar_con.po_id=pms_po_con.po_id AND ims_storage.emp_no=pims_personnel.emp_No AND pms_iar_con.iar_id=ims_storage.iar_id AND pms_po.po_no='$id'";

  $sql1="INSERT INTO `ims_borrow`(`borrow_id`, `emp_no`, `stor_id`, `borrow_date`, `return_date`,`borrow_qty`,`trans_date`) VALUES ('','$names','$sid','$date',NULL,'$qty',NULL)";
  $x=0;
  $r=0;
  $up=mysqli_query($mysqli,$sql);
  if($up){
    $r++;
    $in=mysqli_query($mysqli,$sql1); 
    if($in){
      $r++;
    }else{
      $x++;
    }
  }else{
    $x++;
  }
}
  
  if($x>0){
  echo '<script type="text/javascript">

alert("Erro Updating Data");


</script>';
    
}else{
  echo '<script type="text/javascript">

alert("Your Data Sucuessfully Updated");
window.location="../fpdf/issufpdf.php?pcode='.$id.'";


</script>';
}

}


?>