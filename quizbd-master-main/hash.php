<?php
// $pass = "mysecreT";
$pass = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Et architecto consectetur, doloribus distinctio sit culpa dolore placeat eveniet amet, eos harum quos cupiditate! Maxime porro distinctio, pariatur assumenda fugiat odio?
Ea ducimus pariatur blanditiis repudiandae, officiis repellendus voluptatem at, rerum nostrum ab libero deleniti asperiores consectetur omnis sequi ipsum beatae quae, reprehenderit officia atque hic aspernatur aut? Sit, id tempore!
Reiciendis ratione iste expedita0 vel voluptas voluptate architecto. Quo nemo quis, quam at itaque similique pariatur exercitationem ut sequi accusantium? Accusamus, asperiores mollitia voluptatibus autem impedit voluptas quisquam facere dolorum!
Saepe explicabo doloribus reiciendis nihil exercitationem nemo autem nisi, eos inventore omnis, expedita unde eveniet, quos voluptatibus ex aliquid sapiente ut dolor esse! Asperiores, repudiandae. In assumenda debitis voluptatem esse?
Veritatis voluptates sed deleniti tempore esse unde velit sint cumque, perspiciatis voluptatem alias asperiores excepturi nulla impedit voluptas temporibus neque earum, autem et. Nobis ipsam doloremque rerum deleniti minima ea!
Ad similique exercitationem, aliquam consequuntur quod modi corporis. Expedita beatae aliquid voluptas nisi quisquam, dicta labore fugit autem vel dignissimos quos voluptatem. Facere unde eligendi laborum magni natus commodi dolorem?
Eos fugit, consequatur nemo possimus vero voluptates esse quas aspernatur non quibusdam dolorum distinctio modi quasi fugiat natus beatae exercitationem libero deserunt iure. Possimus quis dolor quo suscipit itaque hic.
Adipisci accusantium quam et quae ut magni, amet dolore temporibus aspernatur eveniet quis, eos magnam porro quia illum odio quo expedita alias mollitia dicta molestiae! Est, quis quisquam? Veritatis, obcaecati?
Nemo nihil unde cupiditate, temporibus tenetur beatae atque omnis asperiores quod laudantium id dolores soluta suscipit sint dignissimos enim nobis natus voluptates recusandae, aspernatur possimus ipsum. Quibusdam qui sunt repellendus.
Vitae praesentium repudiandae voluptate debitis odio officiis adipisci molestiae, autem suscipit voluptatem qui quas assumenda, porro molestias necessitatibus possimus minima quaerat commodi architecto alias quae facilis doloremque ab esse. Nulla?";
$hash = password_hash($pass,PASSWORD_DEFAULT);
echo $hash;
echo "<br>";
$md5 = md5($pass);
echo $md5;
echo "<br>";
$sha1 = sha1($pass);
echo $sha1;
echo "<br>";
$h = '$2y$10$M0YlphqL//1qHGI9wyEIF.jWABFZ4sxHAoezTIbW7IkQeA28B9.Se';//55555
if(password_verify('55556',$h)){
    echo "true";
} else {
    echo "false";
}
?>
