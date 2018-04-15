SET GLOBAL event_scheduler="ON";


CREATE EVENT `ExpireDriver` 
ON SCHEDULE
         EVERY 1 HOUR
    ON COMPLETION NOT PRESERVE
    DO
	UPDATE idCard i1
    SET i1.status = "Expired"
    WHERE i1.End_Date < NOW();
    
CREATE EVENT `ExpireDelivery` 
ON SCHEDULE
         EVERY 1 HOUR
    ON COMPLETION NOT PRESERVE
    DO
    DELETE dl1 FROM Delivery dl1 
    JOIN Driver dr1 ON dl1.Driver_ID = dr1.Driver_ID 
    JOIN idCard i1 ON dr1.Card_ID = i1.Card_ID 
    WHERE i1.Status <> "Valid";