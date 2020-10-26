<style type="text/css">
@import url("http://fonts.googleapis.com/css?family=Open+Sans:300,400,700");
@import url("http://weloveiconfonts.com/api/?family=fontawesome");
:before, :after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


.nav {
  width: 100%;
  height: 53px;
  left:0px;
  margin-top: 0px;
  margin-left: 0px;
  border-radius: 2px;
  background: linear-gradient(to bottom, #fafafa 0%, #e1e1e1 100%);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  cursor: pointer;
  overflow: hidden;
}
.nav .link {
  float: left;
  display: block;
  width: 97px;
  height: 100%;
  font: 500 11px/1 'Open Sans', sans-serif;
  line-height: 62px;
  text-align: center;
  border-right: 1px solid rgba(0, 0, 0, 0.1);
}
.nav .link:first-child {
}
.nav .link:last-child {
  border: 0;
}
.nav .link:hover {
  color: #5599dd;
}
.nav .link:before {
  display: inline-block;
  margin: 0 10px 0 0;
  font-family: fontawesome;
}
.nav .link:nth-child(1):before {
  content: '\f015';
}
.nav .link:nth-child(2):before {
  content: '\f012 ';
}
.nav .link:nth-child(3):before {
  content: '\f00a';
}
.nav .link:nth-child(4):before {
  content: '\f018';
}
.nav .link:nth-child(5):before {
  content: '\f085';
}
.nav .link:nth-child(6):before {
  content: '\f085';
}
.nav .link:nth-child(7):before {
  content: '\f085';
}
.nav .link:nth-child(8):before {
  content: '\f085';
}
.nav .link:nth-child(9):before {
  content: '\f085';
}
.nav .link:nth-child(10):before {
  content: '\f085';
}
.nav:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  height: 4px;
  background-image: linear-gradient(to left, #5599dd 50%, #2673bf 50%);
  background-size: 50px 50px;
}

</style>

<div class='nav'>
  <a class='link' href="index_a.php">Dashboard</a>
  <a class='link' href="index_a.php?mo=member&do=manage_member">Member</a>
  <a class='link' href="index_a.php?mo=restaurants&do=manage_restaurants">Store</a>
  <a class='link' href="index_a.php?mo=photo&do=manage_photo">Image</a>
  <a class='link' href="index_a.php?mo=photo&do=manage_album">Album</a>
  <a class='link' href="index_a.php?mo=news&do=manage_news">News</a>
  <a class='link' href="index_a.php?mo=promotion&do=manage_promotion">Promotion</a>
  <a class='link' href="index_a.php?mo=review&do=manage_review">Review</a>
  <a class='link' href="index_a.php?mo=articles&do=manage_articles">Article</a>
  <a class='link' href="index_a.php?mo=setting&do=manage_setting">Setting</a>
</div>