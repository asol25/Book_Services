<?php

/** @var mixed $params getter in the router */
$output_products = null;

for ($index = 0; $index < 4; $index++) {
    $output_products .= '<h2>' . $params[$index]->{'title'} . '<br />
    <span><a href="#">Posted by admin</a> | Filed under templates, internet </span> </h2>
<div class="bg"></div>
<p>' . $params[$index]->{'subtitle'} . '</p>
<p><a href="#">0 Comments</a></p>
<p><a href="GetBook?book='. $index.'">Read more</a></p>
<div class="bg"></div>
<img src="' . $params[$index]->{'image'} . '" alt="" width="84" height="90" />';
}

echo ' <div class="body">
        <div class="body_resize">
            <div class="left"> <img src="views/images/img_1.jpg" alt="" width="84" height="90" />
               ' . $output_products . '
            </div>
            <div class="right">
                <h3>Sidebar Menu</h3>
                <div class="bg"></div>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="Category?taskOption=0">Category</a></li>
                    <li><a href="ShoppingCart">Shopping Cart</a></li>
                    <li><a href="Contact">Contact</a></li>
                </ul>
                <p>&nbsp;</p>
                <h3>Sponsors</h3>
                <div class="bg"></div>
                <ul class="sponsors">
                    <li class="sponsors"><a href="#">Lorem ipsum dolor</a><br />
                        Donec libero. Suspendisse bibendum</li>
                    <li class="sponsors"><a href="#">Dui pede condimentum</a><br />
                        Phasellus suscipit, leo a pharetra</li>
                    <li class="sponsors"><a href="#">Condimentum lorem</a><br />
                        Tellus eleifend magna eget</li>
                    <li class="sponsors"><a href="#">Fringilla velit magna</a><br />
                        Curabitur vel urna in tristique</li>
                    <li class="sponsors"><a href="#">Suspendisse bibendum</a><br />
                        Cras id urna orbi tincidunt orci ac</li>
                    <li class="sponsors"><a href="#">Donec mattis</a><br />
                        purus nec placerat bibendum</li>
                </ul>
                <h3>Calendar</h3>
                <div class="bg"></div>
                <div class="widget_calendar">
                    <ul>
                        <li>
                            <table>
                                <caption>
                                    MARCH 2010
                                </caption>
                                <tbody>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                    <td><a href="#">1</a></td>
                                    <td><a href="#">2</a></td>
                                    <td><a href="#">3</a></td>
                                    <td><a href="#">4</a></td>
                                    <td><a href="#">5</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">6</a></td>
                                    <td><a href="#">7</a></td>
                                    <td><a href="#">8</a></td>
                                    <td><a href="#">9</a></td>
                                    <td><a href="#">10</a></td>
                                    <td><a href="#">11</a></td>
                                    <td><a href="#">12</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">13</a></td>
                                    <td><a href="#">14</a></td>
                                    <td><a href="#">15</a></td>
                                    <td><a href="#">16</a></td>
                                    <td><a href="#">17</a></td>
                                    <td><a href="#">18</a></td>
                                    <td><a href="#">19</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">20</a></td>
                                    <td><a href="#">21</a></td>
                                    <td><a href="#">22</a></td>
                                    <td><a href="#">23</a></td>
                                    <td><a href="#">24</a></td>
                                    <td><a href="#">25</a></td>
                                    <td><a href="#">26</a></td>
                                </tr>
                                <tr>
                                    <td><a href="#">27</a></td>
                                    <td><a href="#">28</a></td>
                                    <td><a href="#">29</a></td>
                                    <td><a href="#">30</a></td>
                                    <td><a href="#">31</a></td>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="FBG_resize"><img src="views/images/fbg_img.gif" alt="" width="931" height="20" /></div>
    <div class="FBG">
        <div class="FBG_resize">
            <div class="blok">
                <h2>Image Gallery</h2>
                <div class="bg"></div>
                <img src="views/images/banner_1.jpg" alt="" width="68" height="68" /><img src="views/images/banner_2.jpg" alt="" width="68" height="68" /><img src="views/images/banner_3.jpg" alt="" width="68" height="68" /><img src="views/images/banner_4.jpg" alt="" width="68" height="68" /><img src="views/images/banner_5.jpg" alt="" width="68" height="68" /><img src="views/images/banner_6.jpg" alt="" width="68" height="68" />
                <div class="clr"></div>
                <div class="bg"></div>
                <p><a href="#">view all views/images</a></p>
            </div>
            <div class="blok">
                <h2>Company News</h2>
                <div class="bg"></div>
                <img src="views/images/fbg_1.gif" alt="" width="74" height="81" class="floated" />
                <p>Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac<br />
                    more news</p>
                <p><a href="#">12. 03. 10</a></p>
                <div class="bg"></div>
                <img src="views/images/fbg_2.gif" alt="" width="74" height="81" class="floated" />
                <p>Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac<br />
                    more news</p>
                <p><a href="#">12. 03. 10</a></p>
            </div>
            <div class="blok">
                <h2>Populate</h2>
                <div class="bg"></div>
                <ul>
                    <li><a href="#">consequat molestie</a></li>
                    <li><a href="#">sem justo</a></li>
                    <li><a href="#">semper</a></li>
                    <li><a href="#">magna sed purus</a></li>
                    <li><a href="#">magna sed purus</a></li>
                    <li><a href="#">consequat molestie</a></li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>
    </div>';
