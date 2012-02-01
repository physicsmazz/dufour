<!-- AUTHOR : Sarawuth Naramngam (sarawuth.n@pcd.go.th) 3/29/99 -->
<html>
<head>
	<title>The example using CF_UploadFile</title>
</head>
<body bgcolor="white" text="black">
<center>

<h2>The example using CF_UploadFile</h2>
<b>Max. file size you can upload is 100 KB.</b>

<cfif #IsDefined("upload")#>
    <CF_UploadFile
	MaxOfFile="5"
	FileSize="100"
    <!---Accept="image/jpeg, image/jpg"--->>
</cfif>

<FORM action="UploadFileTest.cfm" ENCTYPE="multipart/form-data" METHOD="Post">
  <cfloop index="x" from="1" to="5">
     <cfoutput>File #x# : <INPUT NAME="file#x#" TYPE="file" size="40"><br></cfoutput>
  </cfloop>
<INPUT TYPE="submit" VALUE="Upload Files" NAME="upload">
<INPUT TYPE="Reset" VALUE="Clear">
</FORM>

</center>
</body>
</html>
