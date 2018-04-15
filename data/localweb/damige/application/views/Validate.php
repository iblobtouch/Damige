<html>
<body>

<?php
    $this->load->database();
    
    echo $this->db->query('SELECT * FROM driver');
    
    echo $result ;
?>

</body>
</html>