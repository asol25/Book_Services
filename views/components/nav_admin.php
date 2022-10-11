<?php 

echo '
<nav class="nav">
    <ul class="nav_list">
        <details>
            <summary>MANAGER</summary>
            <li class="nav_item"><a href="Admin?select=Manager&options=Products" class="nav_link">Products</a></li>
            <li class="nav_item"><a href="Admin?select=Manager&options=Authors" class="nav_link">Authors</a></li>
            <li class="nav_item"><a href="Admin?select=Manager&options=Publishers" class="nav_link">Publishers</a></li>
        </details>
        <details>
            <summary>ADD</summary>
            <li class="nav_item"><a href="Admin?select=Add&options=Products" class="nav_link">Products</a></li>
            <li class="nav_item"><a href="Admin?select=Add&options=Authors" class="nav_link">Authors</a></li>
            <li class="nav_item"><a href="Admin?select=Add&options=Publishers" class="nav_link">Publishers</a></li>
        </details>
        <li class="nav_item"><a href="" class="nav_link">Sales Statistics</a></li>
    </ul>
</nav>';