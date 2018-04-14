SET GLOBAL event_scheduler="ON";


CREATE EVENT `ExpireDriver` 
ON SCHEDULE
         EVERY 1 HOUR
    ON COMPLETION NOT PRESERVE
    DO
	UPDATE idCard i1 JOIN driver_state d1 ON i1.State_ID = d1.State_ID
    SET d1.status = "Expired"
    WHERE i1.End_Date < NOW();
    
CREATE EVENT `ExpireDelivery` 
ON SCHEDULE
         EVERY 1 HOUR
    ON COMPLETION NOT PRESERVE
    DO
    DELETE FROM Delivery dl1 
    JOIN Driver dr1 ON dl1.Driver_ID = dr1.Driver_ID 
    JOIN idCard i1 ON dr1.Card_ID = i1.Card_ID 
    JOIN Driver_State ds1 ON i1.State_ID = ds1.State_ID
    WHERE ds1.Status = "Expires";