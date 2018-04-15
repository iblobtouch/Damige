<html>
<body>

<?php
    $this->load->database();
    
    echo $this->db->query('SELECT * FROM delivery');
    
    echo $result ;
?>

</body>
</html>