<?php
require "cnx.php";

if (isset($_GET['id_cnt'])) {
			// stocker le id de tableau contact !
			$id_contact=$_GET['id_cnt'];
					// la requet SQL !
						$qry=mysqli_query($success,"Delete from contact where id_contact=$id_contact");
                        if (!$qry) {
                            echo "Problem with query " . $qry . "<br/>";
                            echo mysqli_error($success);
                            exit();
                        }
    header("Location:message-user.php");
	}
?>