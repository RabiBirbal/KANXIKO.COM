<style>
    /*owl caraousel*/
.stretch-card>.card {
  width: 100%;
  min-width: 100%;
}

/* body {
  background-color: #f9f9fa
}*/

.flex {
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto
}

@media (max-width:991.98px) {
  .padding {
      padding: 1.5rem
  }
}

@media (max-width:767.98px) {
  .padding {
      padding: 1rem
  }
}
/*.padding {
  padding: 3rem
}*/
.card-title{
text-align: center;
font-size: 27px;
font-family: sans-serif;
color: #fff;
}

.owl-carousel .item {
  margin: 3px
}

.owl-carousel .item img {
  display: block;
 width: 100%;
  height: auto;
  margin-left: auto;
  margin-right: auto;
}

.owl-carousel .item {
  margin: 3px
}

.owl-carousel {
  margin-bottom: 15px
}
.flip-card {
/* background-color: transparent;*/
width: 300px;
height: 300px;
perspective: 1000px;
margin-left: auto;
margin-right: auto;
display: block;
padding: 5px;
}

.flip-card-inner {
position: relative;
width: 100%;
height: 100%;
text-align: center;
transition: transform 0.6s;
transform-style: preserve-3d;
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
position: absolute;
width: 100%;
height: 100%;
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
}

.flip-card-front {
background-color: #bbb;
color: black;
}

.flip-card-back {
background-color: #2980b9;
color: white;
transform: rotateY(180deg);
}
.flip-card-back p{
 margin-top: 70px;
}
.flip-card-front h1{
 font-size: 27px;
 margin-top: 20px;
 color: #000;
 font-family: sans-serif;
}
.flip-card-front img{
 margin-top: 20px;
}
/*owl caraousel ends*/
</style>