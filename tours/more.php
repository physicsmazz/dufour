<cfparam name="URL.ID" default="1">
<cfparam name="PageNum_rsToursDetails" default="1">
<cfquery name="rsToursDetails" datasource="#request.dsn#">
SELECT *
FROM tours
WHERE ID = <cfqueryparam value="#URL.ID#" cfsqltype="cf_sql_numeric"> 
</cfquery>
<cfset MaxRows_rsToursDetails=10>
<cfset StartRow_rsToursDetails=Min((PageNum_rsToursDetails-1)*MaxRows_rsToursDetails+1,Max(rsToursDetails.RecordCount,1))>
<cfset EndRow_rsToursDetails=Min(StartRow_rsToursDetails+MaxRows_rsToursDetails-1,rsToursDetails.RecordCount)>
<cfset TotalPages_rsToursDetails=Ceiling(rsToursDetails.RecordCount/MaxRows_rsToursDetails)>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tour Details</title>
<style type="text/css">
<!--
#details {
	background-color: #7ABAF2;
	padding: 10px;
	border: medium solid #000000;
	height:auto; width:auto;
}
-->
</style>
</head>

<body>
<cfoutput>
<div id="details">#rsToursDetails.tourDescription#
</div>
</cfoutput>
</body>
</html>
