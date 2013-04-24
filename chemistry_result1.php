<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

// Get Chemistry results
$chem_id	= $_GET['id'];
$chemistry	= mysql_query("select user_id from chemistry_user where user_id = '".$chem_id."' ");

if(mysql_num_rows($chemistry)>0)
{
	$uname	= mysql_fetch_array(mysql_query("select user_name from user where user_id = '".$chem_id."'"));
} else {
	header("location:profile.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITE_NAME; ?></title>
<meta name="description" content="<?php echo SITE_DESCRIPTION; ?>"/>
<meta name="keywords" content="<?php echo SITE_KEYWORD; ?>"/>
<link rel="shortcut icon" type="image/x-icon" href="images/logo/<?php echo SITE_FAVICON; ?>"/>
<link href="templates/default/css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <?php include_once("header.php");?>
  <div id="maincont">
    <div id="illust">
      <div class="clr"></div>
      <div class="chemistry_hd_txt">
        <?=ucfirst($uname['user_name']);?>
        Chemistry Test Results </div>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Family Orientation</strong> <br />
          As someone who is oriented to familial matters, you value the company of family-members and domestic life. If you have children already, you enjoy spending time with them very much and work hard to be a good parent. If you don’t have children, you very much desire having children in the future. And your preference for cooking and entertaining guests at home will likely ease the transition into parenthood.<br />
          <br />
          You take pride in maintaining and cultivating a healthy family and work hard to achieve this. This natural tendency is easily illustrated by your preference for doing things around the house as opposed to going out to clubs and restaurants.<br />
          <br />
          What really sets you apart from people that are low in family orientation is that you know how to manage your frustrations and work well on your own. This means that you are well-equipped to manage a family without letting all the work that is involved wear you down. However, as someone with strong family values, all the work that is involved in maintaining a tidy home and well-stocked kitchen might occasionally make it difficult for you to finish everything that you need to do. </div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Self-Control</strong> <br />
          The self-control personality dimension captures the way in which a person regulates and directs him or herself. Being low in self-control can be both good and bad. Occasionally people may be compelled to follow their intuitions and give in to their temptations, and your degree of self-control makes this likely to happen more often than not. This can be good in circumstances where being relaxed and open are important. However, in situations where it is necessary to be focused and careful, you might find that you do or say things that may be inappropriate.<br />
          <br />
          As someone who exerts little control over your actions, you may find that you commit social blunders that might offend other people and get yourself in trouble. For example, if you’re given responsibility to work on a project that requires close attention to detail, you may be likely to overlook important details because you have difficulty staying focused. Consequently, you might feel more comfortable delegating such tasks to other people who are more detail oriented. Being able to recognize such characteristics in yourself and having more detail-oriented people do such tasks could be an effective way to manage your own stress level. <br />
          <br />
          Low self-control may diminish your effectiveness at work. Acting too relaxed can make it difficult for you to focus on projects that require organized sequences of steps or stages. Thus, your ability to accomplish may be inconsistent. Indeed, it’s possible that you might be criticized periodically for being unreliable or unable to “stay within the lines.” Nonetheless, you may still experience many short-lived pleasures and never be thought of as boring.</div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Self-Confidence</strong> <br />
          As someone with low self-confidence, you tend not to feel comfortable interacting with other people. Although, you find the company of friends pleasant, you tend to feel uneasy meeting new people and interacting with strangers. Your discomfort socializing sometimes makes it difficult for you to make new friends. Perhaps because you do not particularly like talking about yourself, others find it difficult to develop an accurate impression of who you are. <br />
          <br />
          This weak social confidence likely stems from your personal beliefs about yourself. Although you have several strengths, you tend be somewhat critical of yourself and have difficulty overcoming your perceived weaknesses. For example, you have a tendency to regret things that you’ve done or said in the past and get embarrassed somewhat easily. <br />
          <br />
          When it comes to your professional life, you tend to set low to moderate standards for yourself. These unrealistically low standards may perpetuate your tendency to think that you’re less competent than you truly are. Chances are, you find the advice and support of friends more compelling than your own advice. </div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Openness</strong> <br />
          As someone with a low score in openness, you are down to earth and prefer fact to fiction. It’s likely you don’t particularly enjoy the arts because it’s not always clear whether it has any practical use. Moreover, you probably don’t consider yourself to be a very emotional person because you tend to focus attention on concrete goals and objectives, so there’s no real reason to get too upset about anything because such worrying will not change anything. <br />
          <br />
          Rather than day-dreaming and playing with abstract concepts and ideas, you prefer thinking and talking about concrete issues where a clear answer or decision can be made. That is, you tend to think more logically and methodically about most things. Thus, it is likely that you prefer working on projects where there are clear instructions and objectives; you may find it difficult and pointless to work on projects that require too much creative thinking. <br />
          <br />
          This propensity can have advantages and disadvantages. For instance, when there are clear rules about how to solve a particular problem, your ability to follow instructions makes it easy for you to accomplish your work and excel. In contrast, you may be easily overwhelmed and frustrated when working on projects that have no clear solution. </div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Easygoingness</strong> <br />
          Based on your responses to the World Singles Personality Test (WSPT), you are moderate in terms of Easygoingness. Specifically, you score around the same place that most people do on this personality characteristic. <br />
          <br />
          Easygoingness refers to one's ability to relax. Based on your score, you appear to work and play hard. The benefits of being moderate in easygoingness are that you achieve success through hard work, but you also know when and how to relax. Your colleagues and friends likely consider you as reliable and fun to be around.<br />
          <br />
          Being moderate in easygoingness can cause you some stress, however. For example, you may sometimes find it difficult to complete tasks thoroughly and efficiently, which can cause stress for both you and the people around you. You may occasionally experience stress by working hard to reach your goals, but you value having fun and just relaxing. Knowing how to balance both work and play is a gift, and you have the key ingredients for doing this.<br />
          <br />
          You have enough mental flexibility to think creatively and enough focus to implement those ideas well. This might be epitomized by your occasional difficulty focusing on subtle details, but the ease with which you’re able to adjust to changes in your life.<br />
          <br />
          As someone who is neither rigid nor careless, you likely get along with most people well. On the one hand, you recognize the value of working hard and therefore consider such qualities in others beneficial. On the other hand, you know how to relax and thus appreciate people that know how to do this too. Chances are your friends and colleagues perceive you as someone that works hard, but also knows how to have a good time </div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>How does your personality affect your love life?</strong> <br />
          <br />
          Your social skills make it difficult for you to feel comfortable being yourself around most people. Indeed, it’s self-confidence that allows people to feel comfortable interacting with others without feeling insecure and vulnerable. Thus, in your romantic life, you might find it difficult to trust others because it may be unclear whether your relationship partners always take your wants and needs into consideration. This might prove especially difficult early in a relationship until you have a firm idea about whether a romantic interest is trustworthy or not. It might therefore take longer for you to develop a good sense of whether a person you are attracted to is the right person for you. Perhaps the one thing you should be most cautious of is whether your romantic partners are not taking advantage of you. <br />
          <br />
          Given how much you value family life, you probably get along best with people who share your values and beliefs. In fact, it’s likely that you maintain close connections with members of your immediate and distant family. For this reason, you would probably be most satisfied in a romantic relationship with someone who also values domestic life. <br />
          Being in a relationship with someone who enjoys going out to parties and staying-up late at night might be fun, at least initially; yet it’s likely that you will find this tiring over time. Thus, it might be easier and more satisfying for you to develop a long-lasting relationship with a person who enjoys both spending time at home and going out to eat. <br />
          <br />
          As someone who is more relaxed than most people, you likely get along with most people quite well. Chances are that your friends and colleagues perceive you as lively, fun to be with, and good-humored. When it comes to romance, you’ll likely be attracted to most people. However, your free-spirited nature might make being in a relationship with a person that is more rigid than you difficult because you might perceive the person as being too uptight and controlling. <br />
          <br />
          Your level of conventionality might make it difficult for you to tolerate people with beliefs different from your own. Although such people might be fun on first dates, once you begin talking about serious issues, you might find their unorthodoxy unsettling and even offensive. Therefore, you will likely be most satisfied in relationships with people that are more traditional and down to earth. </div>
      </div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
