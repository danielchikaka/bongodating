<?php 
include_once("config/db_connect.php");
include_once("config/ckh_session.php");

// Fetch user Name
$uname	= mysql_fetch_array(mysql_query("select user_name from user where user_id = '".$_SESSION['userid']."'"));

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
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="text-align: justify;">The <?php echo SITE_NAME;?> Relationship Chemistry Test (AERCT) measures five broad dimensions of personality that are each essential for building a romantic relationship. It's not the case that a person must be “high” on each of the personality characteristics to be in a relationship. Instead, what is important is how your personality interacts with the personality of your romantic partner on each dimension. Or what is commonly called “chemistry.” Based on decades of empirical research in psychology, the AERCT captures the five key ingredients that can determine whether or not two people have the “right” chemistry. The dimensions are:</div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Self-Confidence,</strong> or the degree to which a person feels comfortable with him or herself. People that are high in self-confidence tend to be assertive and competent in both their private and public relationships. People that are low in self-confidence tend to be reticent and somewhat anxious.</div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong> Family Orientation, </strong>or the degree to which a person supports and values the family. People that are family oriented tend to want or already have children, are very close to their immediate relatives, and prefer cooking at home to eating at a restaurant. People that are not family oriented tend to be individualistic, unconventional, and very much enjoy attending parties and social functions.</div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong> Self-Control,</strong> or the extent to which a person exerts control over various aspects of life. People that are high in self-control tend have strong emotional reactions to things and try to regulate those feelings by micromanaging and attending to specific details. People that are low in self-control are usually relaxed, even-tempered, and lenient.</div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong> Openness,</strong> or the extent to which a person is open to and dependent upon others. People that are high in openness tend to like a wide range of things (e.g., food, music, movies, etc.), in part because they are concerned with pleasing other people. In contrast, people low in openness are very independent and opinionated; they know what they like and aren't apt to change their opinion.</div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong> Easygoingness,</strong> or a person's work ethic and degree of mental flexibility. People that are high in easygoingness are very relaxed, broadminded, and unaffected by change. In contrast, people low in easygoingness tend be hardworking, firm, and sometimes inflexible.</div>
      </div>
      <div class="clr"></div>
      <div class="chemistry_hd_txt">
        <?=ucfirst($uname['user_name']);?>
        Relationship Chemistry Test Results </div>
      <div class="chemistry_main" style="background:#f1f1f1;">
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Self-Confidence</strong> <br />
          As someone with moderate self-confidence, you generally feel comfortable interacting with other people. In particular, you find the company of friends comforting and occasionally enjoy meeting new people. You tend to be relaxed in groups, which makes people around you relaxed too. Perhaps because you feel comfortable talking about yourself, others tend to enjoy being around you and perceive you as friendly.<br />
          <br />
          Your social confidence also spills into your personal beliefs about yourself. Although you have several strengths, you tend to acknowledge and accept your weaknesses. However, you sometime regret things you’ve done or said in the past, and occasionally get embarrassed by these things.<br />
          <br />
          When it comes to your professional life, you tend to set moderate to high standards for yourself. Your work performance should provide ample evidence for this. With this and your sociability, friends and colleagues tend to see you as someone who can provide sound advice.</div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Family Orientation</strong> <br />
          As someone who respects family values, you tend to enjoy the company of family-members and are open to living a domestic life. If you have children already, you enjoy spending time with them very much and work hard to be a good parent, but may occasionally wish to “cut-loose” and let your true colors show. If you don’t have children, you probably desire having a family sometime in the distant future. Although you occasionally enjoy cooking at home, you also like going to restaurants. This has the potential to create added stress as you transition into parenthood.<br />
          <br />
          You are attracted to the idea of having a family and may be willing to work hard to achieve this, although not necessarily any time soon. This conflict is illustrated by the fact that you don’t mind doing things around the house—like cooking and entertaining guests—on the one hand. But, on the other hand, you also like going to restaurants and parties. It’s possible that in time you might prefer spending time at home more because you won’t feel like you’re missing anything when you don’t go out.<br />
          <br />
          One aspect of yourself that makes you likely to become more family oriented is that you generally know how to manage your frustrations and work well on your own. This means that you have some of the basic ingredients to enjoy family life. Maintaining a tidy home, keeping a well-stocked kitchen, and making sure the kids are safe is a tough job. So attending to these things, while also taking care of yourself, may prove somewhat difficult for you.</div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Self-Control</strong> <br />
          The self-control personality dimension captures the way in which a person regulates and directs him or herself. Being low in self-control can be both good and bad. Occasionally people may be compelled to follow their intuitions and give in to their temptations, and your degree of self-control makes this likely to happen more often than not. This can be good in circumstances where being relaxed and open are important. However, in situations where it is necessary to be focused and careful, you might find that you do or say things that may be inappropriate.<br />
          <br />
          As someone who exerts little control over your actions, you may find that you commit social blunders that might offend other people and get yourself in trouble. For example, if you’re given responsibility to work on a project that requires close attention to detail, you may be likely to overlook important details because you have difficulty staying focused. Consequently, you might feel more comfortable delegating such tasks to other people who are more detail oriented. Being able to recognize such characteristics in yourself and having more detail-oriented people do such tasks could be an effective way to manage your own stress level. <br />
          <br />
          Low self-control may diminish your effectiveness at work. Acting too relaxed can make it difficult for you to focus on projects that require organized sequences of steps or stages. Thus, your ability to accomplish may be inconsistent. Indeed, it’s possible that you might be criticized periodically for being unreliable or unable to “stay within the lines.” Nonetheless, you may still experience many short-lived pleasures and never be thought of as boring.</div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Openness</strong> <br />
          As someone with a low score in openness, you are down to earth and prefer fact to fiction. It’s likely you don’t particularly enjoy the arts because it’s not always clear whether it has any practical use. Moreover, you probably don’t consider yourself to be a very emotional person because you tend to focus attention on concrete goals and objectives, so there’s no real reason to get too upset about anything because such worrying will not change anything. <br />
          <br />
          Rather than day-dreaming and playing with abstract concepts and ideas, you prefer thinking and talking about concrete issues where a clear answer or decision can be made. That is, you tend to think more logically and methodically about most things. Thus, it is likely that you prefer working on projects where there are clear instructions and objectives; you may find it difficult and pointless to work on projects that require too much creative thinking. <br />
          <br />
          This propensity can have advantages and disadvantages. For instance, when there are clear rules about how to solve a particular problem, your ability to follow instructions makes it easy for you to accomplish your work and excel. In contrast, you may be easily overwhelmed and frustrated when working on projects that have no clear solution. </div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>Easygoingness</strong> <br />
          Easygoingness refers to one's ability to relax. Based on your score, you appear to “take things as they come” and enjoy having a good time. However, being high in easygoingness also has the potential to produce stress in a number of ways. For example, you may find it difficult to complete tasks thoroughly and efficiently. In this way, being high in easygoingness cannot only make your life difficult, but also the lives of the people around you. Another potential problem with being too high in easygoingness is that it can provide you with gratification in the short-term, but in the long-term provide undesirable consequences. <br />
          <br />
          High easygoingness, even when not seriously destructive, may also diminish your effectiveness at work, for example. You may find it aversive and difficult to put in all the effort that may sometimes be needed to effectively accomplish certain tasks. For this reason, your colleagues might view you as forgetful and unfocused. </div>
        <div class="profl_txt_1" style="text-align: justify;"> <strong>How does your personality affect your love life?</strong> <br />
          <br />
          Your social competence and charm make it easy for you to get along well with most people. Indeed, it’s self-confidence that allows people to feel comfortable interacting with others without feeling insecure and vulnerable. This should work to your advantage in your romantic life. Your social skills should help make for a pleasant first date by alleviating any nervousness that your partner might have. Over time, the realistic standards that you tend to set for yourself could work well with your partner. That is, by setting realistic goals for yourself and your relationships, your partners should feel less pressure to be someone that they are not. <br />
          <br />
          Because you respect family values but appreciate a good night out on the town, you probably get along well with people that are different from you. For this reason, you would probably be quite content in a romantic relationship with someone who shares your same values on these issues.<br />
          Being in a relationship with someone who enjoys going out to parties and staying-up late at night might be fun, at least initially; yet it’s likely that you will find this tiring over time. Thus, it might be easier and more satisfying for you to develop a long-lasting relationship with a person who enjoys both spending time at home and going out to eat. <br />
          <br />
          As someone who is more relaxed than most people, you likely get along with most people quite well. Chances are that your friends and colleagues perceive you as lively, fun to be with, and good-humored. When it comes to romance, you’ll likely be attracted to most people. However, your free-spirited nature might make being in a relationship with a person that is more rigid than you difficult because you might perceive the person as being too uptight and controlling. <br />
          <br />
          Your level of conventionality might make it difficult for you to tolerate people with beliefs different from your own. Although such people might be fun on first dates, once you begin talking about serious issues, you might find their unorthodoxy unsettling and even offensive. Therefore, you will likely be most satisfied in relationships with people that are more traditional and down to earth. </div>
      </div>
      <div class="profl_contnt2">
      </div>
    </div>
  </div>
</div>
<?php include_once("footer.php");?>
</body>
</html>
