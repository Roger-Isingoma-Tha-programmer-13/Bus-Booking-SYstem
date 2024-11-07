<?

$name =$_POST['NAME'];
$email =$_POST['EMAIL'];
$title =$_POST['TITLE'];
$tel = $_POST['TEL'];
$message=$_POST['MESSAGE'];
$security=$_POST['SECURITY'];

$to = "roger.isingoma@gmail.com";
$subject = "New contact form submission";
$message = "A visitor of exampledomain.com has submitted the following requirements.\n\nName: $name\n\nEmail: $email\n\nTitle: $title\n\nTel: $tel\n\nMessage: $message\n\nPlease respond to this message within 24 hours.\n\nBest regardsn\nExampleDomain.com web Team";

if($security=="20")
{
	mail($to,$subject,$message);
	header("Location:Contact.php?s=1");
}
else
{
	header("Location:Contact.php?s=2");
}
?>