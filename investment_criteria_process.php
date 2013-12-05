<?php

include('database.php');
session_start();
$path = $_SESSION[path];

$investment_criteria_id = uniqid('IC');
$industry_id = uniqid('I');
$language_id = uniqid('L');

//check whether already inserted or not
$q_cek= "select investor_id from investment_criteria where investor_id='$_SESSION[user_id]'";
$hq_cek= mysql_db_query($DataBase,$q_cek);		
if(mysql_num_rows($hq_cek)==0){

//insert investment criteria
$q_insert= "insert into investment_criteria values ('$investment_criteria_id','$_SESSION[user_id]','$_POST[location]','$_POST[state]','$industry_id','$_POST[stage]','$language_id','$_POST[starting_range]','$_POST[ending_range]','$_POST[keyword_of_interest]')";
$hq_insert	= mysql_db_query($DataBase,$q_insert);

//insert industry
$q_industry= "insert into industry values ('$industry_id','$_SESSION[user_id]','$_POST[real_estate]','$_POST[it]','$_POST[Tourism]','$_POST[Manufacturing]','$_POST[E_Commerce]','$_POST[Entertainment]','$_POST[Pharmacy]','$_POST[Personal_care]','$_POST[Education]','$_POST[Leisure]','$_POST[Transportation]','$_POST[Agriculture]','$_POST[Building]','$_POST[Financial]','$_POST[Security]','$_POST[Mining]','$_POST[Retail]','$_POST[Marketing]','$_POST[Fashion]','$_POST[Aviation]','$_POST[Media]','$_POST[Biotechnology]','$_POST[Telecom]','$_POST[Food]','$_POST[Others]')";
$hq_industry	= mysql_db_query($DataBase,$q_industry);


//insert language
$q_language= "insert into language values ('$language_id','$_SESSION[user_id]','$_POST[english]','$_POST[french]','$_POST[spanish]','$_POST[german]','$_POST[portugese]','$_POST[mandarin]','$_POST[cantonese]','$_POST[arabic]','$_POST[rusian]','$_POST[japanese]','$_POST[italian]')";
$hq_language= mysql_db_query($DataBase,$q_language);

}else
{
//update investment criteria
$q_update= "update investment_criteria set location='$_POST[location]', state='$_POST[state]',stage= '$_POST[stage]',starting_range='$_POST[starting_range]',ending_range='$_POST[ending_range]',interest='$_POST[keyword_of_interest]' where investor_id='$_SESSION[user_id]'";
$hq_update	= mysql_db_query($DataBase,$q_update);

//update industry
$q_industry= "update industry set real_estate='$_POST[real_estate]',it='$_POST[it]',tourism='$_POST[Tourism]',manufacturing='$_POST[Manufacturing]',E_Commerce='$_POST[E_Commerce]',Entertainment='$_POST[Entertainment]',Pharmacy='$_POST[Pharmacy]',Personal_care='$_POST[Personal_care]',Education='$_POST[Education]',Leisure='$_POST[Leisure]',Transportation='$_POST[Transportation]',Agriculture='$_POST[Agriculture]',Building='$_POST[Building]',Financial='$_POST[Financial]',Security='$_POST[Security]',Mining='$_POST[Mining]',Retail='$_POST[Retail]',Marketing='$_POST[Marketing]',Fashion='$_POST[Fashion]',Aviation='$_POST[Aviation]',Media='$_POST[Media]',Biotechnology='$_POST[Biotechnology]',Telecom='$_POST[Telecom]',Food='$_POST[Food]',Others='$_POST[Others]' where investor_id='$_SESSION[user_id]'";
$hq_industry	= mysql_db_query($DataBase,$q_industry);


//insert language
$q_language= "update language set english='$_POST[english]',french='$_POST[french]',spanish='$_POST[spanish]',german='$_POST[german]',portugese='$_POST[portugese]',mandarin='$_POST[mandarin]',cantonese='$_POST[cantonese]',arabic='$_POST[arabic]',rusian='$_POST[rusian]',japanese='$_POST[japanese]',italian='$_POST[italian]' where investor_id='$_SESSION[user_id]'";
$hq_language= mysql_db_query($DataBase,$q_language);
}


header('location:'.$path.'/investor_dashboard/');


?>