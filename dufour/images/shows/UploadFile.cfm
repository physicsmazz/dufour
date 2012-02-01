<!---
NAME:
CF_UploadFile

CF_UploadFile Syntax:
    <CF_UploadFile
	Destination="directory"
	NameConflict="overwrite"
	Accept="text/plain"
	MaxOfFile="5"
	FileSize="5">

DESCRIPTION:
Cold Fusion custom tag to upload multiple file to a specified directory on the Web server.

ATTRIBUTES:
Destination  - (Optional) The destination directory on the Web server where the file
                should be saved. Default is the same directory you keep a Cold Fusion
		template using CF_UploadFile tag.

NameConflict - (Optional) Determines how the file should be handled if its name conflicts
                with the name of a file that already exists in the directory. See CFFILE's 
		nameconflict values for more detail. Default is "overwrite".

Accept       - (Optional) Use to limit what types of files will be accepted. See CFFILE's
		accept values for more detail. Default is "text/plain".

MaxOfFile    - (Required) The maximum number of files you want to upload, it must be 
                equal or greater than a number of files in the input form.  

FileSize     - (Required) The maximum size of files in KB you allow to upload. 

USAGE:
To use just call the tag from within your Cold Fusion template. The MaxOfFile and FileSize attributes must be specified.

EXAMPLES: 
   See UploadFileTest.cfm  for more detail;

    <CF_UploadFile
	MaxOfFile="5"
	FileSize="5">
 
AUTHOR:
Sarawuth Naramngam (sarawuth.n@pcd.go.th) 3/29/99
--->

<!--- Check for required attributes and initialize variables --->
<cfif #IsDefined("Attributes.Destination")#>
	<cfset #Destination# = #Attributes.Destination#>
<cfelse>
	<cfset #Destination# = #ExpandPath('.')#>
</cfif>

<cfif #IsDefined("Attributes.NameConflict")#>
	<cfset #NameConflict# = #Attributes.NameConflict#>
<cfelse>
	<cfset #NameConflict# = 'overwrite'>
</cfif>

<cfif #IsDefined("Attributes.Accept")#>
	<cfset #Accept# = #Attributes.Accept#>
<cfelse>
	<cfset #Accept# = "text/plain">
</cfif>

<cfif #isDefined("Attributes.Maxoffile")#>
	<cfset #Maxoffile# = #Attributes.Maxoffile#>
<cfelse>
	<cfabort showerror = "Sorry.. you must defined a 'Maxoffile' attribute.">
</cfif>

<cfif #isDefined("Attributes.FileSize")#>
	<cfset #FileSize# = #Attributes.FileSize#>
	<cfset #FileSize# = #FileSize# * 1000>
<cfelse>
	<cfabort showerror = "Sorry.. you must defined a 'FileSize' attribute.">
</cfif>

<table border="2" width="350">
<tr><td>

<cfset #m# = 0>  
<cfloop index="n" from="1" to="#Maxoffile#">

<!--- Check that FILEFIELD is not empty --->
   <cfif #Evaluate("form.file#n#")# is not "">

<!--- upload files --->
        <CFFILE ACTION="Upload"
                FILEFIELD="file#n#"
                DESTINATION="#Destination#"
                NAMECONFLICT="#NameConflict#"
                ACCEPT="#Accept#"
                >

	<cfset #m# = #m#+1>
	<cfset #FileName# = #file.ServerFile#>

	<CFDIRECTORY ACTION="list" DIRECTORY="#Destination#" NAME="ReadFile" FILTER="#FileName#">
 	     <cfset #MaxSize# = #FileSize# / 1000>
	     <cfset #Size# = #ReadFile.size# / 1000>

<!--- delete the uploaded file if it's size is GT defined FileSize --->
   	     <cfif #Size# gt #MaxSize#>
		  <cffile action="delete" file="#Destination##FileName#">

		  <cfoutput>
		     <b>#FileName# (#size# KB)</b> was not uploaded.<br>
		  </cfoutput>

	 	  <cfset #m# = #m#-1>

	     <cfelse><!--- shown Uploaded file --->
	          Uploaded file : <b><cfoutput> #FileName# (#size# KB)</cfoutput></b><br>
	     </cfif>
   </cfif>
</cfloop>

<cfif #m# is 0>
       Uploaded file : "<b>no have file to upload</b>"
</cfif>

</td></tr>
</table>