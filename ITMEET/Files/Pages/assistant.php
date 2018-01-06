<style>
.menu {
  -webkit-filter: url("#goo");
          filter: url("#goo");
}

.menu-item, .menu-open-button {
  background: #e91e63;
  border-radius: 100%;
  width: 80px;
  height: 80px;
  margin-left: -40px;
  position: absolute;
  top: 20px;
  color: white;
  text-align: center;
  line-height: 80px;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
  -webkit-transition: -webkit-transform ease-out 200ms;
  transition: -webkit-transform ease-out 200ms;
  transition: transform ease-out 200ms;
  transition: transform ease-out 200ms, -webkit-transform ease-out 200ms;
}

.menu-open {
  display: none;
}

.hamburger {
  width: 25px;
  height: 3px;
  background: white;
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -12.5px;
  margin-top: -1.5px;
  -webkit-transition: -webkit-transform 200ms;
  transition: -webkit-transform 200ms;
  transition: transform 200ms;
  transition: transform 200ms, -webkit-transform 200ms;
}

.hamburger-1 {
  -webkit-transform: translate3d(0, -8px, 0);
          transform: translate3d(0, -8px, 0);
}

.hamburger-2 {
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
}

.hamburger-3 {
  -webkit-transform: translate3d(0, 8px, 0);
          transform: translate3d(0, 8px, 0);
}

.menu-open:checked + .menu-open-button .hamburger-1 {
  -webkit-transform: translate3d(0, 0, 0) rotate(45deg);
          transform: translate3d(0, 0, 0) rotate(45deg);
}
.menu-open:checked + .menu-open-button .hamburger-2 {
  -webkit-transform: translate3d(0, 0, 0) scale(0.1, 1);
          transform: translate3d(0, 0, 0) scale(0.1, 1);
}
.menu-open:checked + .menu-open-button .hamburger-3 {
  -webkit-transform: translate3d(0, 0, 0) rotate(-45deg);
          transform: translate3d(0, 0, 0) rotate(-45deg);
}

.menu {
  position: fixed;
  left: 90%;
  bottom: 10%;
  margin-left: -190px;
  padding-top: 20px;
  padding-left: 190px;
  width: 380px;
  height: 250px;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  font-size: 20px;
  text-align: left;
  z-index: 10000;
}

.menu-item:hover {
  background: white;
  color: #e91e63;
}
.menu-item:nth-child(3) {
  -webkit-transition-duration: 180ms;
          transition-duration: 180ms;
}
.menu-item:nth-child(4) {
  -webkit-transition-duration: 180ms;
          transition-duration: 180ms;
}
.menu-item:nth-child(5) {
  -webkit-transition-duration: 180ms;
          transition-duration: 180ms;
}
.menu-item:nth-child(6) {
  -webkit-transition-duration: 180ms;
          transition-duration: 180ms;
}
.menu-item:nth-child(7) {
  -webkit-transition-duration: 180ms;
          transition-duration: 180ms;
}
.menu-item:nth-child(8) {
  -webkit-transition-duration: 180ms;
          transition-duration: 180ms;
}
.menu-item:nth-child(9) {
  -webkit-transition-duration: 180ms;
          transition-duration: 180ms;
}

.menu-open-button {
  z-index: 2;
  -webkit-transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
          transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
  -webkit-transition-duration: 400ms;
          transition-duration: 400ms;
  -webkit-transform: scale(1.1, 1.1) translate3d(0, 0, 0);
          transform: scale(1.1, 1.1) translate3d(0, 0, 0);
  cursor: pointer;
}

.menu-open-button:hover {
  -webkit-transform: scale(1.2, 1.2) translate3d(0, 0, 0);
          transform: scale(1.2, 1.2) translate3d(0, 0, 0);
}

.menu-open:checked + .menu-open-button {
  -webkit-transition-timing-function: linear;
          transition-timing-function: linear;
  -webkit-transition-duration: 200ms;
          transition-duration: 200ms;
  -webkit-transform: scale(0.8, 0.8) translate3d(0, 0, 0);
          transform: scale(0.8, 0.8) translate3d(0, 0, 0);
}

.menu-open:checked ~ .menu-item {
  -webkit-transition-timing-function: cubic-bezier(0.935, 0, 0.34, 1.33);
          transition-timing-function: cubic-bezier(0.935, 0, 0.34, 1.33);
}
.menu-open:checked ~ .menu-item:nth-child(3) {
  -webkit-transition-duration: 180ms;
          transition-duration: 180ms;
  -webkit-transform: translate3d(0.08361px, -104.99997px, 0);
          transform: translate3d(0.08361px, -104.99997px, 0);
}
.menu-open:checked ~ .menu-item:nth-child(4) {
  -webkit-transition-duration: 280ms;
          transition-duration: 280ms;
  -webkit-transform: translate3d(90.9466px, -52.47586px, 0);
          transform: translate3d(90.9466px, -52.47586px, 0);
}
.menu-open:checked ~ .menu-item:nth-child(5) {
  -webkit-transition-duration: 380ms;
          transition-duration: 380ms;
  -webkit-transform: translate3d(90.9466px, 52.47586px, 0);
          transform: translate3d(90.9466px, 52.47586px, 0);
}
.menu-open:checked ~ .menu-item:nth-child(6) {
  -webkit-transition-duration: 480ms;
          transition-duration: 480ms;
  -webkit-transform: translate3d(0.08361px, 104.99997px, 0);
          transform: translate3d(0.08361px, 104.99997px, 0);
}
.menu-open:checked ~ .menu-item:nth-child(7) {
  -webkit-transition-duration: 580ms;
          transition-duration: 580ms;
  -webkit-transform: translate3d(-90.86291px, 52.62064px, 0);
          transform: translate3d(-90.86291px, 52.62064px, 0);
}
.menu-open:checked ~ .menu-item:nth-child(8) {
  -webkit-transition-duration: 680ms;
          transition-duration: 680ms;
  -webkit-transform: translate3d(-91.03006px, -52.33095px, 0);
          transform: translate3d(-91.03006px, -52.33095px, 0);
}
.menu-open:checked ~ .menu-item:nth-child(9) {
  -webkit-transition-duration: 780ms;
          transition-duration: 780ms;
  -webkit-transform: translate3d(-0.25084px, -104.9997px, 0);
          transform: translate3d(-0.25084px, -104.9997px, 0);
}
</style>

<nav class="menu" id="assistant" draggable="true">
  <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open"/>
  <label class="menu-open-button" for="menu-open">
    <!--<span class="hamburger hamburger-1"></span>
    <span class="hamburger hamburger-2"></span>
    <span class="hamburger hamburger-3"></span>-->
    <i class="glyphicon glyphicon-briefcase"></i>
  </label>
  
  <a href="#" class="menu-item" data-toggle="modal" data-target="#modalevent"> <i class="fa fa-calendar"></i> </a>
  <a href="?Pagename=PEOPLE&PageTitle=People" class="menu-item"> <i class="fa fa-plus"></i> </a>
  <a href="?Pagename=PERSONALCHAT&PageTitle=Chat" class="menu-item"> <i class="fa fa-male"></i> </a>
  <a href="#" class="menu-item" data-toggle="modal" data-target="#modalemail"> <i class="fa fa-envelope"></i> </a>
  <a href="?Pagename=HOME&PageTitle=Home" class="menu-item"> <i class="glyphicon glyphicon-console"></i> </a>
  <a href="#" class="menu-item" data-toggle="modal" data-target="#modalmemo"> <i class="glyphicon glyphicon-paperclip"></i> </a>
  
</nav>

<script>
    document.getElementById("assistant").addEventListener("dragend", function (e){
            var x = e.clientX;
            var y = e.clientY;
            console.log(x);
            console.log(y);
            document.getElementById("assistant").style.left=x+"px";
            document.getElementById("assistant").style.top=y+"px";    
    });

</script>