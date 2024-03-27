<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="DNS Information">
  <meta name="keywords" content="HTML, Form, Elements">
  <meta name="author" content="David Rogers, Avery Porter">
  <title>DNS - Domain Name System</title>
  <link href="styles/style.css" rel="stylesheet">
  
</head>
<body class = "bg"><!--Setting the body class as bg allows us to set an image background with css-->

<?php include 'menu.inc';?> <!-- No header.inc file as the menu was the only thing in header -->

    <h1 id="top">Domain Name System</h1>
<fieldset>
<section>
	<h2>What is DNS?</h2>
    <p><strong>DNS is also known as Domain Name System.</strong> <!-- <strong> is used to highlight terms that are acronymed-->
	The main function of DNS is a process in which a DNS Server is sent a domain name such as thisdomain.com, which is then converted into an IP address 
	that is machine readable, such as 139.186.194.1. 
	</p>
	
	<aside>This process goes both ways, which makes DNS essential in all internet browsing in modern days, as it takes long strings of IP addresses 
	and converts them into simplified domain names making it easy for users to read.</aside>
	
<figure><figcaption><strong>This diagram showcases the simplified process of the DNS Server</strong></figcaption>
<a href="images/dnsdiagram.png">  <img src="images/dnsdiagram.png" alt="DNS Diagram" title="Filesize 89kb" height="300" width="450"></a></figure>
</section>	

<section>
        <h2>How it was created</h2>
        <p>DNS was created in the 1980s by Paul Mockapetris, who was a researcher at the University of Southern California's Information Sciences Institute.
		Originally the specifications for DNS were published by the <strong>Internet Engineering Task Force (IETF)</strong> in a series of documents called RFCs or Request for Comments.
		DNS has become a critical component of the internets infrastructure and has undergone many updates to support new features of evergrowing technologies.</p>
		
            <h3>Organisations overlooking DNS</h3>
            <p>There are two main organisations that are monitoring and protecting DNS.</p>
			
These organisations include:
<ol>
  <li>The Internet Engineering Task Force (IETF)</li>
  <li>Internet Corporation for Assigned Names and Numbers (ICANN)</li>

</ol>
			These organisations take procaution in the safety of DNS 
			as the servers are vulnerable to various types of attacks such as cache poisoning and spoofing. Due to this there are several technologies and protocols
			used to protect and secure DNS servers and the DNS system as a whole.

</section>

<section>
<h3>The 3 types of Servers in DNS</h3>
<dl>
  <dt>Primary Server</dt>
  <dd>The primary server serves as the authoritive server for the primary zone. 
  The primary server performs all administrative tasks associated within this zone.</dd>
  <dt>Secondary Server</dt>
  <dd>The secondary servers are used as backup DNS servers, which recieve all the files for their zone from the primary zone.
  There can be many secondary servers for any given zone to provide necessary fault tolerance, traffic reduction and load balancing.</dd>
  <dt>Caching Servers</dt>
  <dd>Caching servers perform as a cached-query server for the DNS responses. 
  Caching servers perform queries, cache the answers and returns the results, rather than maintaining files.</dd>
</dl>
</section>

<section>
			<h3>DNS Queries</h3>
			<p>DNS is typically implemented using the <strong>User Datagram Protocol (UDP)</strong> over port 53.
			When a computer sends a DNS query it is sent through UDP to a resolver, over port 53.
			Once the resolver is done with the query the response is sent back over UDP to the computer's port 53.</p>

<h3>Domains</h3>
DNS works in a heirarchical system. Starting with the Root Server it then goes to the <strong>Top-Level Domain (TLD)</strong>.
From the TLD it then has domain names that fall under each TLD. Examples as below:<br><br>
<table>
  <tr>
    <th>TLD</th>
    <th>Domain Names</th>
  </tr>
  <tr>
    <td>.com</td>
    <td>microsoft</td>
  </tr>
  <tr>
    <td>.edu</td>
    <td>harvard</td>
  </tr>
    <tr>
    <td>.au</td>
    <td>swinburne</td>
  </tr>
</table>
<br>
</section>

<a href="#top">Back to Top</a> <!-- this is an anchor point that allows user to go back to the top of the page-->

</fieldset>

	<?php include 'footer.inc';?>
	
</body>	
</html> 