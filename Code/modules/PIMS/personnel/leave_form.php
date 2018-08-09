<?php
    session_start();
    include("../myfunc/session1.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'include/header2.php';?>

<body>

<?php include 'include/topnav.php';?>
<?php include 'include/sidenav.php';?>

<br><br><br><br>
    <div id="wrapper" style="margin-left: 60px;">

        <div class="container">  

                            <div class="col-lg-11">
                            <div class="col-lg-12" id="print" name="print">
                            <u>__________________________________________________________________________________________________________________</u>
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-2" style="float: left;"><center>
                            <img src="../img/deped_logo.jpg" style="width: 100px; height: 100px;"></center>
                            </div>

                            <div class="col-lg-8">
                            <center>
                                <p>Republic of the Philippines<br>
                                <b>DEPARTMENT OF EDUCATION</b><br>
                                Region V (Bicol)<br>
                                Divison of Legazpi City<br><br><br>
                                <p><b>PAG-ASA NATIONAL HIGH SCHOOL</b></p>
                                <p>Rawis, Legazpi City</p>
                            </center>
                            </div>


                            <div class="col-lg-2" style="float: right;">
                            <img src="../img/pnhs_logo.jpg" style="width: 100px; height: 100px;">
                            </div>
                            <u>__________________________________________________________________________________________________________________</u>
                            <div class="col-lg-12"><center><h3>APPLICATION FOR LEAVE</h3></center></div>
                            <u>__________________________________________________________________________________________________________________</u>

                            <div class="col-lg-4">OFFICE:<br><label>DepED - Pag-asa NHS</label></div>
                            <div class="col-lg-3"><i>(Last Name)</i><br>Mangampo</div>
                            <div class="col-lg-3"><i>(First Name)</i><br>Mangampo</div>
                            <div class="col-lg-2"><i>(Middle Name)</i><br>Mangampo</div>
                            <div class="col-lg-12"><br></div>
                            <u>__________________________________________________________________________________________________________________</u>
                            <div class="col-lg-12"><center><h3>DETAILS OF APPLICATION</h3></center></div>
                            <u>__________________________________________________________________________________________________________________</u>
                                    
                            <div class="col-lg-6"><label>A. TYPE OF LEAVE</label>

                            </div>
                            <div class="col-lg-6"><label>C. NUMBER OF WORKING DAYS</label>

                            </div>

                            <div class="col-lg-6"><label>B. WHERE WILL LEAVE BE SPENT</label>

                            </div>
                            <div class="col-lg-6"><label>D. COMMUTATION</label>

                            </div>

                            <div class="col-lg-12"><br></div>
                            <u>__________________________________________________________________________________________________________________</u>
                            <div class="col-lg-12"><center><h3>DETAILS OF ACTION ON APPLICATION</h3></center></div>
                            <u>__________________________________________________________________________________________________________________</u>
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-6"><label>A. CERTIFICATION OF LEAVE CREDITS</label><br>
                            <label>As of</label>

                            </div>
                            <div class="col-lg-6"><label>B. RECOMMENDATIONS</label>

                            </div>
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-1"><label></label></div>
                            <div class="col-lg-4"><label><u>HUMAN RESOURCE OIC</u></label></div>
                            <div class="col-lg-2"><label></label></div>
                            <div class="col-lg-4"><label><u>SECONDARY SCHOOL PRINCIPAL</u></label></div>
                            <div class="col-lg-1"><label></label></div>
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-12"><center><label><u>PUBLIC SCHOOLS DISTRICT SUPERVISOR</u></label></center></div>
                            <div class="col-lg-12"><br></div>
                            <u>__________________________________________________________________________________________________________________</u>

                            <div class="col-lg-6"><label>C. APPROVED FOR</label>

                            </div>
                            <div class="col-lg-6"><label>D. DISAPPROVED DUE TO:</label>

                            </div>
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-12"><center><label>Authorized Official</label></center></div>  
                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-12"><center><label>Date</label></center></div>

                            <div class="col-lg-12"><br></div>
                            <div class="col-lg-12">
                            <u>__________________________________________________________________________________________________________________</u>
                            <label>INSTRUCTIONS</label>
                            <p>1. Application for vacation/ sick leave for one full day or more shall be made in this frm and to be accomplished in triplicate.</p>
                            <p>2. Application for vacation leave shall be filled in advance or whenever possible, five (5) days  before going to such leave.</p>
                            <p>3. Application filed in advance or exceeding should be filed by the applicant. For leave incurred for more thatn five (5) days, indicate reason.</p>
                            <p>4. An employee absent without leave shall not be entitled to recieve salary corresponding to the period of his/her leave of absence</p>
                            <p>5. An application for leave of absence of thirty (30) days or more shall be accompanied by a clearance of money and property accountability.</p>
                            </div>  
                            
                            <div class="col-lg-12"><br></div>
                            
                            </div>

        </div>
        <div class="col-lg-12">
                            <button class="btn btn-outline btn-primary" onclick="printDiv('print')"><i class="fa  fa-print"></i> PRINT</button>&emsp;
                            
                            <div class="col-lg-12"><br></div>
                            </div>
        </div>

        </div>
<div id="wrapper">
    <?php include 'include/footer.php'; ?>
</div>
    
</body>
<script>
    function printDiv(print) {
     var printContents = document.getElementById(print).innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>
<style>
    @media print {
    .make-grid(print);
}
</style>


</html>