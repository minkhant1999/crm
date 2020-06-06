<div class="ui attached stackable menu">
    <div class="ui fluid container">
        <a class="item"><i class="home icon"></i>Home</a>
        <a class="item" href="deals.php"><i class="grid layout icon"></i>Deals</a>
        <a class="item" href="deals.php"><i class="grid layout icon"></i>Contact</a>
        <a class="item active" href="index.php"><i class="grid layout icon"></i>Product</a>
        <!-- Search bar Search bar search bar -->
        <div class="right item">
            <div class="ui input"><input type="text" placeholder="Search..."></div>
        </div>
        <!-- Dropdown -->
        <div class="right item">
            <div class="ui compact menu">
                <i class="user icon"></i>
                <div class="ui simple dropdown item">
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <div class="item">User Profile</div>
                        <div class="item">Setting</div>
                        <div class="item">Choice 1</div>
                        <div class="item">Choice 1</div>
                        <div class="item">Choice 2</div>
                        <div class="item">Log out</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("class");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}
</script>