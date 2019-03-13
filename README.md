User Management

I could experiment with ways to manage standard users. I used some SQL queries to communicate with MySQL database 
to edit information about users such as user password and permissions for each report.  

Charts choices for each data

1.	Basic Client Characteristics 
For each client characteristics such as resolution, browser and platform, I decided to use pie charts because 
I want to show which basic characteristics users have most or less and compare the characteristics. So, the pie 
charts enable us to see the popularities of the characteristics at a sling glance.
2.	Brower loading speed data
For the speed data, I decided to use a line chart. This is because I think that it is important to show how fast 
the leading speed are and change of the speed in time stream. So, the line chart enables us to see the numerical 
value of speed and the change of speed over time.
3.	JavaScript Error data
For error data, I decided to use a bar chart because I want to show the number of each kind of errors and compare 
the frequency of the errors by comparing the height of the bars. So, I realized that the bar chart is a good chart 
to compare different kind data.
4.	Events data
For the events, I decided to use a bar char. This is because I want to show the frequency of the events users have 
been doing so far on the website. So, I can compare events with another.



Data Sharing

	I could experiment with ways to share the reports containing charts. I decided to design this part by enabling 
  to down load the pdf files of the reports and email the pdf files to where we want to receive. I think that the 
  function of sharing the report acts an important role on the websites which show different data because we can 
  communicate with team members and other people about the reports. When implementing this part, I used jsPDF to 
  covert the webpages into PDF files, but it seems to be busy to convert webpage with only some texts, but It was 
  pretty hard for me to convert webpage with charts, so I had to spend more time to learn this way. And I used PHPmailer 
  to email the PDF files converted by jsPDF in PHP. It was very interesting for me that I was able to send email different 
  contents not by through other subsites and I could have an opportunity to understand the mechanism of emailing. 


Structure

	When admin users login, they can see the links for each report, the list of current users and there are three links for adding, deleting and editing users. In the user editing, admin users can change standard users nickname, password and their permission for each report. 
	When standard users login, they can see their profile and links for each reports. In the each reports, they can see charts corresponding data and they can email the charts by filling in a subject, a name and email address they send them to.
