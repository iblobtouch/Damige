SET GLOBAL event_scheduler="ON";


CREATE EVENT `ExpireDriver` 
ON SCHEDULE
         EVERY 1 HOUR
    ON COMPLETION NOT PRESERVE
    DO
	UPDATE idCard i1 JOIN driver_state d1 ON i1.State_ID = d1.State_ID
    SET d1.status = "Expired"
    WHERE i1.End_Date < NOW();