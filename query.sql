USE test;
// Display joined table of which employees worked which jobs, on which days, and for how many hours
SELECT e.Name AS "Employee", j.Name AS "Job", a.Day AS "Date", t.Hours FROM Employees e, Jobs j, Activities a, TimeTickets t WHERE e.eID = t.eID AND j.jID = a.jID AND a.aID = t.aID ORDER BY a.Day, j.Name, e.Name;

// Get max ID number from Employees table
SELECT eID AS maxid FROM Employees ORDER BY eID DESC LIMIT 1;

// Get ID number, name, quantity, and total hours for each activity with quantity per hour
SELECT t.aid AS "ID", a.nickname AS "Name", a.quantity AS "Qty", SUM(t.hours) AS 'Total Hours', a.quantity/SUM(t.hours) AS 'Qty/Hour' FROM timetickets t JOIN activities a ON t.aid = a.aid GROUP BY t.aid;