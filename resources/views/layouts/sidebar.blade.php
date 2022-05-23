<style>
    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #00539C;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: white;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #bebebe;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .openbtn {
        font-size: 20px;
        cursor: pointer;
        background-color: #00539C;
        color: white;
        padding: 10px 15px;
        border: none;
    }

    /* .openbtn:hover {
        background-color: #bebebe;
    } */

    #main {
        transition: margin-left .5s;
        padding: 4px;
        background-color: #00539C;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {padding-top: 15px;}
        .sidebar a {font-size: 18px;}
    }
</style>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
</div>

<div id="main" class="d-block">
    <button class="openbtn" onclick="openNav()">☰</button>
</div>

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "235px";
        document.getElementById("main").style.marginLeft = "235px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
</script>
