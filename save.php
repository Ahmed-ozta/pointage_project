<?php 
    include"database.php";
    session_start();
    $idprojet;
    if(isset($_GET['save'])){

        // update the latest update to today in database;
        $sql_updateDATE = "UPDATE projet 
                   SET last_update = '{$_SESSION['date']}'
                   WHERE pr_name = '{$_GET['name_projet']}'";

        mysqli_query($conn,$sql_updateDATE);
        $sql_getId_projet = "SELECT p.id FROM affectations a 
                     JOIN projet p ON a.id_projet = p.id  
                     WHERE pr_name = '{$_GET['name_projet']}'";

        $result_getId_projet=mysqli_query($conn,$sql_getId_projet);
        var_dump($result_getId_projet);
        $row=mysqli_fetch_assoc($result_getId_projet);
        $idprojet=$row['id'];
        echo $idprojet;

        $sql_getId_employee="SELECT id_empl from affectations where id_projet=$idprojet";
        $result_getId_employee=mysqli_query($conn,$sql_getId_employee);
        while($row=mysqli_fetch_assoc($result_getId_employee)){
            if (isset($_GET[$row['id_empl']])) {
                $sql = "INSERT INTO historique (id_projet, id_empl, présence,date_historique) 
                         VALUES ('$idprojet', '{$row['id_empl']}', 'present','{$_SESSION['date']}')";
                mysqli_query($conn,$sql);
            
        }else{
            $sql = "INSERT INTO historique (id_projet, id_empl, présence,date_historique) 
            VALUES ('$idprojet', '{$row['id_empl']}', 'absent','{$_SESSION['date']}')";
            mysqli_query($conn,$sql);
        }



    }
    header('location: dashboard.php');
}
?>